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
use WBW\Library\Core\Exception\ApiException;
use WBW\Library\HaveIBeenPwned\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Request\BreachRequest;
use WBW\Library\HaveIBeenPwned\Request\DataClassesRequest;
use WBW\Library\HaveIBeenPwned\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Request\RangeRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Response\RangesResponse;
use WBW\Library\HaveIBeenPwned\Serializer\RequestSerializer;
use WBW\Library\HaveIBeenPwned\Serializer\ResponseDeserializer;

/**
 * API v2 provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Provider
 */
class APIv2Provider extends AbstractProvider {

    /**
     * Breach.
     *
     * @param BreachRequest $request The breach request.
     * @return BreachesResponse Returns the breaches response.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a GUzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function breach(BreachRequest $request): BreachesResponse {

        $rawResponse = $this->callApi($request, []);

        return ResponseDeserializer::deserializeBreachesResponse($rawResponse);
    }

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
     * Breaches.
     *
     * @param BreachesRequest $request The breaches request.
     * @return BreachesResponse Returns the breaches response.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a GUzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function breaches(BreachesRequest $request): BreachesResponse {

        $queryData = RequestSerializer::serializeBreachesRequest($request);

        $rawResponse = $this->callApi($request, $queryData);

        return ResponseDeserializer::deserializeBreachesResponse($rawResponse);
    }

    /**
     * Data classes.
     *
     * @param DataClassesRequest $request The data classes request.
     * @return DataClassesResponse Returns the data classes response.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a GUzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function dataClasses(DataClassesRequest $request): DataClassesResponse {

        $rawResponse = $this->callApi($request, []);

        return ResponseDeserializer::deserializeDataClassesResponse($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpointVersion(): string {
        return "/v2";
    }

    /**
     * Paste account.
     *
     * @param PasteAccountRequest $request The paste account request.
     * @return PastesResponse Returns the pastes response.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a GUzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     * @deprecated since 2.1.2 use "WBW\Library\HaveIBeenPwned\Provider\APIv3Provider" instead.
     */
    public function pasteAccount(PasteAccountRequest $request): PastesResponse {

        $rawResponse = $this->callApi($request, []);

        return ResponseDeserializer::deserializePastesResponse($rawResponse);
    }

    /**
     * Range.
     *
     * @param RangeRequest $request The range request.
     * @return RangesResponse Returns the ranges response.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a GUzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function range(RangeRequest $request): RangesResponse {

        $rawResponse = $this->callApi($request, [], "https://api.pwnedpasswords.com");

        return ResponseDeserializer::deserializeRangesResponse($rawResponse);
    }
}
