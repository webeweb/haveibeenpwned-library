<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Exception;

use Exception;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Exception\TestException;

/**
 * Abstract exception test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Exception
 */
class AbstractExceptionTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        // Set an Exception mock.
        $throwable = new Exception("throwable");

        $obj = new TestException("exception", $throwable);

        $this->assertEquals("exception", $obj->getMessage());
        $this->assertSame($throwable, $obj->getPrevious());
    }
}
