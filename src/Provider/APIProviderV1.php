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
use WBW\Library\HaveIBeenPwned\Model\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Normalizer\RequestNormalizer;
use WBW\Library\HaveIBeenPwned\Normalizer\ResponseNormalizer;

/**
 * API provider v1.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Provider
 */
class APIProviderV1 extends AbstractProvider {

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
     * {@inheritdoc}
     */
    public function getEndpointVersion() {
        return "";
    }
}
