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
use WBW\Library\Common\Provider\ProviderException;
use WBW\Library\HaveIBeenPwned\Request\AbstractRequest;
use WBW\Library\HaveIBeenPwned\Request\RangeRequest;
use WBW\Library\HaveIBeenPwned\Response\AbstractResponse;

/**
 * API v2 provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Provider
 */
class APIv2Provider extends AbstractProvider {

    /**
     * {@inheritDoc}
     */
    public function getEndpointVersion(): string {
        return "/v2";
    }

    /**
     * Send a request.
     *
     * @param AbstractRequest $request The request.
     * @return AbstractResponse Returns the response.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws ProviderException Throws a provider exception if an error occurs.
     */
    public function sendRequest(AbstractRequest $request): AbstractResponse {

        $endpointPath = $request instanceof RangeRequest ? "https://api.pwnedpasswords.com" : null;
        $queryData    = $request->serializeRequest();
        $rawResponse  = $this->callApi($request, $queryData, $endpointPath);

        return $request->deserializeResponse($rawResponse);
    }
}
