<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\API;

use WBW\Library\HaveIBeenPwned\API\ResponseInterface;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Response interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\API
 */
class ResponseInterfaceTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("Y-m-d\TH:i\Z", ResponseInterface::DATETIME_FORMAT_ADDED);
        $this->assertEquals("Y-m-d", ResponseInterface::DATETIME_FORMAT_BREACH);
        $this->assertEquals("Y-m-d\TH:i:s\Z", ResponseInterface::DATETIME_FORMAT_DATE);
        $this->assertEquals("Y-m-d\TH:i\Z", ResponseInterface::DATETIME_FORMAT_MODIFIED);
    }
}
