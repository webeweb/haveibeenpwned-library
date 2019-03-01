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

use WBW\Library\HaveIBeenPwned\Exception\APIException;
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
use WBW\Library\HaveIBeenPwned\Normalizer\RequestNormalizer;
use WBW\Library\HaveIBeenPwned\Normalizer\ResponseNormalizer;

/**
 * API provider v2.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Provider
 */
class APIProviderV2 extends AbstractAPIProvider {

    /**
     * Breach request.
     *
     * @param BreachRequest $breachRequest The breach request.
     * @return BreachesResponse Returns the breaches response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    public function breachRequest(BreachRequest $breachRequest) {

        $rawResponse = $this->callAPI($breachRequest, []);

        return ResponseNormalizer::denormalizeBreachesResponse($rawResponse);
    }

    /**
     * Breached account request.
     *
     * @param BreachedAccountRequest $breachedAccountRequest The breached account request.
     * @return BreachesResponse Returns the breaches response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    public function breachedAccountRequest(BreachedAccountRequest $breachedAccountRequest) {

        $queryData = RequestNormalizer::normalizeBreachesRequest($breachedAccountRequest);

        $rawResponse = $this->callAPI($breachedAccountRequest, $queryData);

        return ResponseNormalizer::denormalizeBreachesResponse($rawResponse);
    }

    /**
     * Breaches request.
     *
     * @param BreachesRequest $breachesRequest The breaches request.
     * @return BreachesResponse Returns the breaches response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    public function breachesRequest(BreachesRequest $breachesRequest) {

        $queryData = RequestNormalizer::normalizeBreachesRequest($breachesRequest);

        $rawResponse = $this->callAPI($breachesRequest, $queryData);

        return ResponseNormalizer::denormalizeBreachesResponse($rawResponse);
    }

    /**
     * Data classes request.
     *
     * @param DataClassesRequest $dataClassesRequest The data classes request.
     * @return DataClassesResponse Returns the data classes response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    public function dataClassesRequest(DataClassesRequest $dataClassesRequest) {

        $rawResponse = $this->callAPI($dataClassesRequest, []);

        return ResponseNormalizer::denormalizeDataClassesResponse($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpointVersion() {
        return "/v2";
    }

    /**
     * Paste account request.
     *
     * @param PasteAccountRequest $pasteAccountRequest The paste account request.
     * @return PastesResponse Returns the pastes response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    public function pasteAccountRequest(PasteAccountRequest $pasteAccountRequest) {

        $rawResponse = $this->callAPI($pasteAccountRequest, []);

        return ResponseNormalizer::denormalizePastesResponse($rawResponse);
    }

    /**
     * Range request.
     *
     * @param RangeRequest $rangeRequest The range request.
     * @return RangesResponse Returns the ranges response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    public function rangeRequest(RangeRequest $rangeRequest) {

        $rawResponse = $this->callAPI($rangeRequest, [], "https://api.pwnedpasswords.com");

        return ResponseNormalizer::denormalizeRangesResponse($rawResponse);
    }
}