<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\HaveIBeenPwned\Serializer;

use WBW\Library\Common\Helper\ArrayHelper;
use WBW\Library\Common\Helper\StringHelper;
use WBW\Library\HaveIBeenPwned\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Request\BreachesRequest;

/**
 * Request serializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Serializer
 */
class RequestSerializer {

    /**
     * Serialize a breached account request.
     *
     * @param BreachedAccountRequest $request The breached account request.
     * @return array<string,mixed> Returns the serialized breached account request.
     */
    public static function serializeBreachedAccountRequest(BreachedAccountRequest $request): array {

        $result = [];

        ArrayHelper::set($result, "domain", $request->getDomain(), [null]);
        ArrayHelper::set($result, "includeUnverified", StringHelper::parseBoolean($request->getIncludeUnverified()), ["false"]);
        ArrayHelper::set($result, "truncateResponse", StringHelper::parseBoolean($request->getTruncateResponse()), ["false"]);

        return $result;
    }

    /**
     * Serialize a breaches request.
     *
     * @param BreachesRequest $request The breaches request.
     * @return array<string,mixed> Returns the serialized breaches request.
     */
    public static function serializeBreachesRequest(BreachesRequest $request): array {

        $result = [];

        ArrayHelper::set($result, "domain", $request->getDomain(), [null]);

        return $result;
    }
}
