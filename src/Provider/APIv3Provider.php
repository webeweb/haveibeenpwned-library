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
 * API v3 provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Provider
 */
class APIv3Provider extends AbstractProvider {

    /**
     * API key.
     *
     * @var string
     */
    private $apiKey;

    /**
     * Constructor.
     *
     * @param string|null $apiKey The API key.
     */
    public function __construct($apiKey = null) {
        parent::__construct();
        $this->setApiKey($apiKey);
    }

    /**
     * Breach.
     *
     * @param BreachRequest $breachRequest The breach request.
     * @return BreachesResponse Returns the breaches response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function breach(BreachRequest $breachRequest) {

        $rawResponse = $this->callAPI($breachRequest, [], null, $this->getApiKey());

        return ResponseNormalizer::denormalizeBreachesResponse($rawResponse);
    }

    /**
     * Breached account.
     *
     * @param BreachedAccountRequest $breachedAccountRequest The breached account request.
     * @return BreachesResponse Returns the breaches response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function breachedAccount(BreachedAccountRequest $breachedAccountRequest) {

        $queryData = RequestNormalizer::normalizeBreachesRequest($breachedAccountRequest);

        $rawResponse = $this->callAPI($breachedAccountRequest, $queryData, null, $this->getApiKey());

        return ResponseNormalizer::denormalizeBreachesResponse($rawResponse);
    }

    /**
     * Breaches.
     *
     * @param BreachesRequest $breachesRequest The breaches request.
     * @return BreachesResponse Returns the breaches response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function breaches(BreachesRequest $breachesRequest) {

        $queryData = RequestNormalizer::normalizeBreachesRequest($breachesRequest);

        $rawResponse = $this->callAPI($breachesRequest, $queryData, null, $this->getApiKey());

        return ResponseNormalizer::denormalizeBreachesResponse($rawResponse);
    }

    /**
     * Data classes.
     *
     * @param DataClassesRequest $dataClassesRequest The data classes request.
     * @return DataClassesResponse Returns the data classes response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function dataClasses(DataClassesRequest $dataClassesRequest) {

        $rawResponse = $this->callAPI($dataClassesRequest, [], null, $this->getApiKey());

        return ResponseNormalizer::denormalizeDataClassesResponse($rawResponse);
    }

    /**
     * Get the API key.
     *
     * @return string Returns API key.
     */
    public function getApiKey() {
        return $this->apiKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpointVersion() {
        return "/v3";
    }

    /**
     * Paste account.
     *
     * @param PasteAccountRequest $pasteAccountRequest The paste account request.
     * @return PastesResponse Returns the pastes response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function pasteAccount(PasteAccountRequest $pasteAccountRequest) {

        $rawResponse = $this->callAPI($pasteAccountRequest, [], null, $this->getApiKey());

        return ResponseNormalizer::denormalizePastesResponse($rawResponse);
    }

    /**
     * Range.
     *
     * @param RangeRequest $rangeRequest The range request.
     * @return RangesResponse Returns the ranges response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function range(RangeRequest $rangeRequest) {

        $rawResponse = $this->callAPI($rangeRequest, [], "https://api.pwnedpasswords.com", $this->getApiKey());

        return ResponseNormalizer::denormalizeRangesResponse($rawResponse);
    }

    /**
     * Set the API key.
     *
     * @param string $apiKey The API key.
     * @return APIv3Provider Returns this API v3 provider.
     */
    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
        return $this;
    }
}
