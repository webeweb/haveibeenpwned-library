<?php

declare(strict_types = 1);

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Response;

use WBW\Library\HaveIBeenPwned\Api\ResponseInterface;
use WBW\Library\Traits\Strings\StringRawResponseTrait;

/**
 * Abstract response.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Response
 * @abstract
 */
abstract class AbstractResponse implements ResponseInterface {

    use StringRawResponseTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }
}
