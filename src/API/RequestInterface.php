<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\API;

/**
 * Request interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\API
 */
interface RequestInterface {

    /**
     * Rate limiting in milliseconds.
     *
     * @var int
     */
    const RATE_LIMITING = 1500;
}
