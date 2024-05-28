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

namespace WBW\Library\HaveIBeenPwned\Tests\Api;

use WBW\Library\HaveIBeenPwned\Api\RequestInterface;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Request interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\API
 */
class RequestInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals(1500, RequestInterface::RATE_LIMITING);
    }
}
