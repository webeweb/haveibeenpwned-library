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

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use WBW\Library\HaveIBeenPwned\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Serializer\RequestSerializer;
use WBW\Library\HaveIBeenPwned\Serializer\ResponseDeserializer;
use WBW\Library\Provider\Exception\ApiException;

/**
 * API v1 provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Provider
 */
class APIv1Provider extends AbstractProvider {

    /**
     * Breached account.
     *
     * @param BreachedAccountRequest $request The breached account request.
     * @return BreachesResponse Returns the breaches response.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a GUzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function breachedAccount(BreachedAccountRequest $request): BreachesResponse {

        $queryData = RequestSerializer::serializeBreachesRequest($request);

        $rawResponse = $this->callApi($request, $queryData);

        return ResponseDeserializer::deserializeBreachesResponse($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpointVersion(): string {
        return "";
    }
}
