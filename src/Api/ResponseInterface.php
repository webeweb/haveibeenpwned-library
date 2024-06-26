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

namespace WBW\Library\HaveIBeenPwned\Api;

/**
 * Response interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Api
 */
interface ResponseInterface {

    /**
     * Date/time format "added".
     *
     * @var string
     */
    public const DATETIME_FORMAT_ADDED = "Y-m-d\TH:i\Z";

    /**
     * Date/time format "breach".
     *
     * @var string
     */
    public const DATETIME_FORMAT_BREACH = "Y-m-d";

    /**
     * Date/time format "date".
     *
     * @var string
     */
    public const DATETIME_FORMAT_DATE = "Y-m-d\TH:i:s\Z";

    /**
     * Date/time format "modified".
     *
     * @var string
     */
    public const DATETIME_FORMAT_MODIFIED = "Y-m-d\TH:i\Z";
}
