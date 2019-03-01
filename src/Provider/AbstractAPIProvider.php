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
use WBW\Library\Core\Exception\Network\CURLRequestCallException;
use WBW\Library\Core\Network\CURL\Factory\CURLFactory;
use WBW\Library\Core\Network\HTTP\HTTPInterface;
use WBW\Library\HaveIBeenPwned\API\SubstituteRequestInterface;
use WBW\Library\HaveIBeenPwned\Exception\APIException;
use WBW\Library\HaveIBeenPwned\Model\AbstractRequest;

/**
 * Abstract API provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Provider
 * @abstract
 */
abstract class AbstractAPIProvider {

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
     * Constructor.
     */
    public function __construct() {
        $this->setDebug(false);
    }

    /**
     * Build a resource path.
     *
     * @param AbstractRequest $request The request.
     * @return string Returns the resource path.
     */
    private function buildResourcePath(AbstractRequest $request) {
        if (false === ($request instanceof SubstituteRequestInterface)) {
            return $request->getResourcePath();
        }
        return str_replace($request->getSubstituteName(), $request->getSubstituteValue(), $request->getResourcePath());
    }

    /**
     * Call the API.
     *
     * @param AbstractRequest $request The request.
     * @param array $queryData The query data.
     * @param string $endpointPath The endpoint path.
     * @return string Returns the raw response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    protected function callAPI(AbstractRequest $request, array $queryData, $endpointPath = null) {

        try {

            $host = null === $endpointPath ? self::ENDPOINT_PATH . $this->getEndpointVersion() : $endpointPath;

            $cURLRequest = CURLFactory::getInstance(HTTPInterface::HTTP_METHOD_GET);
            $cURLRequest->getConfiguration()->addHeader("Accept", "application/json");
            $cURLRequest->getConfiguration()->setDebug($this->getDebug());
            $cURLRequest->getConfiguration()->setHost($host);
            $cURLRequest->getConfiguration()->setUserAgent("webeweb/haveibeenpwnd-library");
            $cURLRequest->setResourcePath($this->buildResourcePath($request));

            // Handle each query data.
            foreach ($queryData as $name => $value) {
                $cURLRequest->addQueryData($name, $value);
            }

            $cURLResponse = $cURLRequest->call();

            return $cURLResponse->getResponseBody();
        } catch (CURLRequestCallException $ex) {

            if (404 === $ex->getCode()) {
                return "[]";
            }

            throw new APIException("Failed to call HaveIBeenPwned API", $ex);
        } catch (Exception $ex) {

            throw new APIException("Failed to call HaveIBeenPwned API", $ex);
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
     * Set the debug.
     *
     * @param bool $debug The debug.
     * @return AbstractAPIProvider Returns this API provider.
     */
    public function setDebug($debug) {
        $this->debug = $debug;
        return $this;
    }
}
