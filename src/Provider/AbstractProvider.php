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

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Throwable;
use WBW\Library\HaveIBeenPwned\Request\AbstractRequest;
use WBW\Library\Provider\AbstractProvider as BaseProvider;
use WBW\Library\Provider\Exception\ApiException;

/**
 * Abstract provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Provider
 * @abstract
 */
abstract class AbstractProvider extends BaseProvider {

    /**
     * Endpoint path.
     *
     * @var string
     */
    const ENDPOINT_PATH = "https://haveibeenpwned.com/api";

    /**
     * Constructor.
     *
     * @param LoggerInterface|null $logger The logger.
     */
    public function __construct(LoggerInterface $logger = null) {
        parent::__construct($logger);
    }

    /**
     * Build the configuration.
     *
     * @param string $host The host.
     * @param string|null $apiKey The API key.
     * @return array Returns the configuration.
     */
    private function buildConfiguration(string $host, string $apiKey = null): array {

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
     * Call the API.
     *
     * @param AbstractRequest $request The request.
     * @param array $queryData The query data.
     * @param string|null $endpointPath The endpoint path.
     * @param string|null $apiKey The API key.
     * @return string Returns the raw response.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    protected function callApi(AbstractRequest $request, array $queryData, string $endpointPath = null, string $apiKey = null): string {

        try {

            $host = null === $endpointPath ? self::ENDPOINT_PATH . $this->getEndpointVersion() : $endpointPath;

            $config = $this->buildConfiguration($host, $apiKey);
            $client = new Client($config);

            $method  = "GET";
            $uri     = substr($this->buildResourcePath($request), 1);
            $options = [
                "query" => $queryData,
            ];

            $this->logInfo(sprintf("Call HaveIBeenPwned API %s %s", $method, $uri), ["config" => $config, "options" => $options]);

            $response = $client->request($method, $uri, $options);

            return $response->getBody()->getContents();
        } catch (InvalidArgumentException $ex) {

            throw $ex;
        } catch (Throwable $ex) {

            if (true === ($ex instanceof ClientException) && 404 === $ex->getCode()) {
                return "[]";
            }

            throw new ApiException("Call HaveIBeenPwned API failed", 500, $ex);
        }
    }

    /**
     * Get the endpoint version.
     *
     * @return string Returns the endpoint version.
     */
    abstract public function getEndpointVersion(): string;
}
