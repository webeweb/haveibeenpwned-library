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
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model
 */
class RangeTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Range();

        $this->assertEquals(0, $obj->getCount());
        $this->assertNull($obj->getHash());
    }

    /**
     * Tests the setCount() method.
     *
     * @return void
     */
    public function testSetCount() {

        $obj = new Range();

        $obj->setCount(1);
        $this->assertEquals(1, $obj->getCount());
    }

    /**
     * Tests the setPrefix() method.
     *
     * @return void
     */
    public function testSetPrefix() {

        $obj = new Range();

        $obj->setPrefix("prefix");
        $this->assertEquals("prefix", $obj->getPrefix());
    }
}
