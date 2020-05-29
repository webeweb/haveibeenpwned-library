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

use InvalidArgumentException;
use WBW\Library\Core\Exception\ApiException;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\DataClassesRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\RangeRequest;
use WBW\Library\HaveIBeenPwned\Model\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\RangesResponse;
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
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function breach(BreachRequest $request) {

        $rawResponse = $this->callApi($request, []);

        return ResponseDeserializer::deserializeBreachesResponse($rawResponse);
    }

    /**
     * Breached account.
     *
     * @param BreachedAccountRequest $request The breached account request.
     * @return BreachesResponse Returns the breaches response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function breachedAccount(BreachedAccountRequest $request) {

        $queryData = RequestSerializer::serializeBreachesRequest($request);

        $rawResponse = $this->callApi($request, $queryData);

        return ResponseDeserializer::deserializeBreachesResponse($rawResponse);
    }

    /**
     * Breaches.
     *
     * @param BreachesRequest $request The breaches request.
     * @return BreachesResponse Returns the breaches response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function breaches(BreachesRequest $request) {

        $queryData = RequestSerializer::serializeBreachesRequest($request);

        $rawResponse = $this->callApi($request, $queryData);

        return ResponseDeserializer::deserializeBreachesResponse($rawResponse);
    }

    /**
     * Data classes.
     *
     * @param DataClassesRequest $request The data classes request.
     * @return DataClassesResponse Returns the data classes response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function dataClasses(DataClassesRequest $request) {

        $rawResponse = $this->callApi($request, []);

        return ResponseDeserializer::deserializeDataClassesResponse($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpointVersion() {
        return "/v2";
    }

    /**
     * Paste account.
     *
     * @param PasteAccountRequest $request The paste account request.
     * @return PastesResponse Returns the pastes response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @deprecated since 2.1.2 use "WBW\Library\HaveIBeenPwned\Provider\APIv3Provider" instead.
     */
    public function pasteAccount(PasteAccountRequest $request) {

        $rawResponse = $this->callApi($request, []);

        return ResponseDeserializer::deserializePastesResponse($rawResponse);
    }

    /**
     * Range.
     *
     * @param RangeRequest $request The range request.
     * @return RangesResponse Returns the ranges response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function range(RangeRequest $request) {

        $rawResponse = $this->callApi($request, [], "https://api.pwnedpasswords.com");

        return ResponseDeserializer::deserializeRangesResponse($rawResponse);
    }
}
