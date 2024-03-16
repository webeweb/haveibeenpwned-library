<?php

declare(strict_types = 1);

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Provider;

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use WBW\Library\HaveIBeenPwned\Request\AbstractRequest;
use WBW\Library\HaveIBeenPwned\Request\RangeRequest;
use WBW\Library\HaveIBeenPwned\Response\AbstractResponse;
use WBW\Library\Provider\Exception\ApiException;

/**
 * API v3 provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Provider
 */
class APIv3Provider extends AbstractProvider {

    /**
     * API key.
     *
     * @var string|null
     */
    private $apiKey;

    /**
     * Constructor.
     *
     * @param string|null $apiKey The API key.
     * @param LoggerInterface|null $logger The logger.
     */
    public function __construct(string $apiKey = null, LoggerInterface $logger = null) {
        parent::__construct($logger);

        $this->setApiKey($apiKey);
    }

    /**
     * Get the API key.
     *
     * @return string|null Returns API key.
     */
    public function getApiKey(): ?string {
        return $this->apiKey;
    }

    /**
     * {@inheritDoc}
     */
    public function getEndpointVersion(): string {
        return "/v3";
    }

    /**
     * Send a request.
     *
     * @param AbstractRequest $request The request.
     * @return AbstractResponse Returns the response.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function sendRequest(AbstractRequest $request): AbstractResponse {

        $endpointPath = $request instanceof RangeRequest ? "https://api.pwnedpasswords.com" : null;
        $queryData    = $request->serializeRequest();
        $rawResponse  = $this->callApi($request, $queryData, $endpointPath, $this->getApiKey());

        return $request->deserializeResponse($rawResponse);
    }

    /**
     * Set the API key.
     *
     * @param string|null $apiKey The API key.
     * @return APIv3Provider Returns this API v3 provider.
     */
    public function setApiKey(?string $apiKey): APIv3Provider {
        $this->apiKey = $apiKey;
        return $this;
    }
}
