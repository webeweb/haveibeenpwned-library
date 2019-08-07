<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Provider;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use WBW\Library\HaveIBeenPwned\API\SubstituteRequestInterface;
use WBW\Library\HaveIBeenPwned\Exception\APIException;
use WBW\Library\HaveIBeenPwned\Model\AbstractRequest;

/**
 * Abstract provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Provider
 * @abstract
 */
abstract class AbstractProvider {

    /**
     * Endpoint path.
     *
     * @var string
     */
    const ENDPOINT_PATH = "https://haveibeenpwned.com/api";

    /**
     * Debug.
     *
     * @var bool
     */
    private $debug;

    /**
     * Logger.
     *
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor.
     *
     * @param LoggerInterface|null $logger The logger.
     */
    public function __construct(LoggerInterface $logger = null) {
        $this->setDebug(false);
        $this->setLogger($logger);
    }

    /**
     * Build the configuration.
     *
     * @param string $host The host.
     * @param string|null $apiKey The API key.
     * @return array Returns the configuration.
     */
    private function buildConfiguration($host, $apiKey = null) {

        $config = [
            "base_uri"    => $host . "/",
            "debug"       => $this->getDebug(),
            "headers"     => [
                "Accept"     => "application/json",
                "User-Agent" => "webeweb/haveibeenpwnd-library",
            ],
            "synchronous" => true,
        ];

        if (null !== $apiKey) {
            $config["headers"]["hibp-api-key"] = $apiKey;
        }

        return $config;
    }

    /**
     * Build a resource path.
     *
     * @param AbstractRequest $request The request.
     * @return string Returns the resource path.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    private function buildResourcePath(AbstractRequest $request) {

        if (false === ($request instanceof SubstituteRequestInterface)) {
            return $request->getResourcePath();
        }

        if (null === $request->getSubstituteValue()) {
            throw new InvalidArgumentException(sprintf("The substitute value %s is missing", $request->getSubstituteName()));
        }

        return str_replace($request->getSubstituteName(), $request->getSubstituteValue(), $request->getResourcePath());
    }

    /**
     * Call the API.
     *
     * @param AbstractRequest $request The request.
     * @param array $queryData The query data.
     * @param string $endpointPath The endpoint path.
     * @param string $apiKey The API key.
     * @return string Returns the raw response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    protected function callAPI(AbstractRequest $request, array $queryData, $endpointPath = null, $apiKey = null) {

        try {

            $host = null === $endpointPath ? self::ENDPOINT_PATH . $this->getEndpointVersion() : $endpointPath;

            $config = $this->buildConfiguration($host, $apiKey);

            $client = new Client($config);

            $method  = "GET";
            $uri     = substr($this->buildResourcePath($request), 1);
            $options = [
                "query" => $queryData,
            ];

            $this->log(sprintf("Call HaveIBeenPwned API %s %s", $method, $uri), ["config" => $config, "options" => $options]);

            $response = $client->request($method, $uri, $options);

            return $response->getBody()->getContents();
        } catch (InvalidArgumentException $ex) {

            throw $ex;
        } catch (Exception $ex) {

            if (true === ($ex instanceof ClientException) && 404 === $ex->getCode()) {
                return "[]";
            }

            throw new APIException("Call HaveIBeenPwned API failed", $ex);
        }
    }

    /**
     * Get the debug.
     *
     * @return bool Returns the debug.
     */
    public function getDebug() {
        return $this->debug;
    }

    /**
     * Get the endpoint version.
     *
     * @return string Returns the endpoint version.
     */
    abstract public function getEndpointVersion();

    /**
     * Get the logger.
     *
     * @return LoggerInterface Returns the logger.
     */
    public function getLogger() {
        return $this->logger;
    }

    /**
     * Log.
     *
     * @param string $message The message.
     * @param array $context The context.
     * @return AbstractProvider Returns this provider.
     */
    protected function log($message, array $context) {
        if (null !== $this->getLogger()) {
            $this->getLogger()->info($message, $context);
        }
        return $this;
    }

    /**
     * Set the debug.
     *
     * @param bool $debug The debug.
     * @return AbstractProvider Returns this provider.
     */
    public function setDebug($debug) {
        $this->debug = $debug;
        return $this;
    }

    /**
     * Set the logger.
     *
     * @param LoggerInterface|null $logger The logger
     * @return AbstractProvider Returns this provider
     */
    protected function setLogger(LoggerInterface $logger = null) {
        $this->logger = $logger;
        return $this;
    }
}
