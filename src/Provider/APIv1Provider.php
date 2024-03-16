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
use WBW\Library\HaveIBeenPwned\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\Provider\Exception\ApiException;

/**
 * API v1 provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Provider
 */
class APIv1Provider extends AbstractProvider {

    /**
     * {@inheritDoc}
     */
    public function getEndpointVersion(): string {
        return "";
    }

    /**
     * Send a request.
     *
     * @param BreachedAccountRequest $request The request.
     * @return BreachesResponse Returns the response.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function sendRequest(BreachedAccountRequest $request): BreachesResponse {

        $queryData   = $request->serializeRequest();
        $rawResponse = $this->callApi($request, $queryData);

        /** @var BreachesResponse */
        return $request->deserializeResponse($rawResponse);
    }
}
