<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Request;

use WBW\Library\Provider\Request\AbstractRequest as BaseRequest;

/**
 * Abstract request.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Request
 * @abstract
 */
abstract class AbstractRequest extends BaseRequest {

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }
}
