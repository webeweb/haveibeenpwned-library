<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Model;

use WBW\Library\HaveIBeenPwned\Model\Range;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Range test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model
 */
class RangeTest extends AbstractTestCase {

    /**
     * Test setPrefix()
     *
     * @return void
     */
    public function testSetPrefix(): void {

        $obj = new Range();

        $obj->setPrefix("prefix");
        $this->assertEquals("prefix", $obj->getPrefix());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Range();

        $this->assertEquals(0, $obj->getCount());
        $this->assertNull($obj->getHash());
    }
}
