<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Serializer;

use WBW\Library\Core\Argument\Helper\ArrayHelper;
use WBW\Library\Core\Argument\Helper\StringHelper;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachesRequest;

/**
 * Request serializer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Serializer
 */
class RequestSerializer {

    /**
     * Serialize a breached account request.
     *
     * @param BreachedAccountRequest $request The breched account request.
     * @return array Returns the parameters.
     */
    public static function serializeBreachedAccountRequest(BreachedAccountRequest $request) {

        $parameters = [];

        ArrayHelper::set($parameters, "domain", $request->getDomain(), [null]);
        ArrayHelper::set($parameters, "includeUnverified", StringHelper::parseBoolean($request->getIncludeUnverified()), ["false"]);
        ArrayHelper::set($parameters, "truncateResponse", StringHelper::parseBoolean($request->getTruncateResponse()), ["false"]);

        return $parameters;
    }

    /**
     * Serialize a breaches request.
     *
     * @param BreachesRequest $request The breaches request.
     * @return array Returns the parameters.
     */
    public static function serializeBreachesRequest(BreachesRequest $request) {

        $parameters = [];

        ArrayHelper::set($parameters, "domain", $request->getDomain(), [null]);

        return $parameters;
    }
}
