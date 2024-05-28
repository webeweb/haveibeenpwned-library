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

namespace WBW\Library\HaveIBeenPwned\Response;

use WBW\Library\Common\Traits\Strings\StringRawResponseTrait;
use WBW\Library\HaveIBeenPwned\Api\ResponseInterface;

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
