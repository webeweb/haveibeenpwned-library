<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Provider;

use WBW\Library\CURL\Configuration\CURLConfiguration;
use WBW\Library\CURL\Request\CURLGetRequest;
use WBW\Library\HaveIBeenPwned\API\HaveIBeenPwnedRequestInterface;

/**
 * HaveIBeenPwned provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Provider
 */
class HaveIBeenPwnedProvider {

    /**
     * Debug.
     *
     * @var boolean
     */
    private $debug;

    /**
     * Request.
     *
     * @var HaveIBeenPwnedRequestInterface
     */
    private $request;

    /**
     * Constructor.
     */
    public function __construct(HaveIBeenPwnedRequestInterface $request) {
        $this->setDebug(false);
        $this->setRequest($request);
    }

    /**
     * Call the API.
     *
     */
    public function callAPI() {

        // Prepare the CURL request.
        $cURLRequest = new CURLGetRequest(new CURLConfiguration(), $this->request->getResourcePath());
        $cURLRequest->getConfiguration()->setDebug($this->debug);
        $cURLRequest->getConfiguration()->setHost(HaveIBeenPwnedRequestInterface::ENDPOINT);
        $cURLRequest->getConfiguration()->setUserAgent("webeweb/haveibeenpwned-library");

        // Add each query data.
        foreach ($this->request->toArray() as $key => $value) {
            $cURLRequest->addQueryData($key, $value);
        }

        // Call the request.
        $cURLResponse = $cURLRequest->call();

        // Return the parsed response.
        return $cURLResponse;
    }

    /**
     * Get the debug.
     *
     * @return boolean Returns the debug.
     */
    public function getDebug() {
        return $this->debug;
    }

    /**
     * Get the request.
     *
     * @return HaveIBeenPwnedRequestInterface Returns the request.
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * Set the debug.
     *
     * @param boolean $debug The debug.
     * @return SMSModeProvider Returns this sMsmode provider.
     */
    public function setDebug($debug) {
        $this->debug = $debug;
        return $this;
    }

    /**
     * Set the request.
     *
     * @param HaveIBeenPwnedRequestInterface $request The request.
     * @return HaveIBeenPwnedProvider Returns this provider.
     */
    protected function setRequest(HaveIBeenPwnedRequestInterface $request) {
        $this->request = $request;
        return $this;
    }

}
