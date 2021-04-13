<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Response;

use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Response\TestResponse;

/**
 * Abstract response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Response
 */
class AbstractResponseTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestResponse();

        $this->assertNull($obj->getRawResponse());
    }
}
