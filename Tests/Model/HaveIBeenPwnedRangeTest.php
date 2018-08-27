<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Model;

use PHPUnit_Framework_TestCase;
use WBW\Library\HaveIBeenPwned\Model\HaveIBeenPwnedRange;

/**
 * HaveIBeenPwned range model test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model
 * @final
 */
final class HaveIBeenPwnedRangeTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new HaveIBeenPwnedRange();

        $this->assertEquals(0, $obj->getCount());
        $this->assertNull($obj->getHash());
    }

    /**
     * Tests the parse() method.
     *
     * @return void
     */
    public function testParse() {

        // ===
        $obj0 = HaveIBeenPwnedRange::parse("0018A45C4D1DEF81644B54AB7F969B88D65");

        $this->assertEquals(0, $obj0->getCount());
        $this->assertNull($obj0->getHash());
        $this->assertNull($obj0->getPrefix());

        // ===
        $obj9 = HaveIBeenPwnedRange::parse("0018A45C4D1DEF81644B54AB7F969B88D65:1");

        $this->assertEquals(1, $obj9->getCount());
        $this->assertEquals("0018A45C4D1DEF81644B54AB7F969B88D65", $obj9->getHash());
        $this->assertNull($obj9->getPrefix());
    }

    /**
     * Tests the setCount() method.
     *
     * @return void
     */
    public function testSetCount() {

        $obj = new HaveIBeenPwnedRange();

        $obj->setCount(1);
        $this->assertEquals(1, $obj->getCount());
    }

    /**
     * Tests the setHash() method.
     *
     * @return void
     */
    public function testSetHash() {

        $obj = new HaveIBeenPwnedRange();

        $obj->setHash("hash");
        $this->assertEquals("hash", $obj->getHash());
    }

}
