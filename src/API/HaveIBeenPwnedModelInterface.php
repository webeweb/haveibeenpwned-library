<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\API;

/**
 * HaveIBeenPwned model interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\API
 */
interface HaveIBeenPwnedModelInterface {

    /**
     * Date/time format "Added".
     *
     * @var string
     */
    const DATETIME_FORMAT_ADDED = "Y-m-d\TH:i\Z";

    /**
     * Date/time format "Breach".
     *
     * @var string
     */
    const DATETIME_FORMAT_BREACH = "Y-m-d";

    /**
     * Date/time format "Date".
     *
     * @var string
     */
    const DATETIME_FORMAT_DATE = "Y-m-d\TH:i:s\Z";

    /**
     * Date/time format "Modified".
     *
     * @var string
     */
    const DATETIME_FORMAT_MODIFIED = "Y-m-d\TH:i\Z";

}
