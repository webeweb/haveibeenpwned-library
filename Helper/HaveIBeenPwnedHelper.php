<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Helper;

use WBW\Library\Core\Helper\Argument\StringHelper;

/**
 * HaveIBeenPwned helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Helper
 */
class HaveIBeenPwnedHelper {

    /**
     * Clean a raw response.
     *
     * @param string $rawResponse The raw response.
     * @return string Returns the cleaned raw response.
     */
    public static function cleanResponse($rawResponse) {

        //
        $searches = [":True", ":False"];
        $replaces = [":true", ":false"];

        // Return the cleaned raw response.
        return StringHelper::replace($rawResponse, $searches, $replaces);
    }

}
