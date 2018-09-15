<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Response;

use PHPUnit_Framework_TestCase;
use WBW\Library\HaveIBeenPwned\Response\HaveIBeenPwnedResponseRange;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\App\TestFixtures;

/**
 * HaveIBeenPwned response "Range" test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Response
 * @final
 */
final class HaveIBeenPwnedResponseRangeTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new HaveIBeenPwnedResponseRange(TestFixtures::SAMPLE_RANGE_RESPONSE);

        $res = $obj->getRanges();

        $this->assertCount(5, $res);

        $this->assertEquals("0018A45C4D1DEF81644B54AB7F969B88D65", $res[0]->getHash());
        $this->assertEquals(1, $res[0]->getCount());

        $this->assertEquals("00D4F6E8FA6EECAD2A3AA415EEC418D38EC", $res[1]->getHash());
        $this->assertEquals(2, $res[1]->getCount());

        $this->assertEquals("011053FD0102E94D6AE2F8B83D76FAF94F6", $res[2]->getHash());
        $this->assertEquals(1, $res[2]->getCount());

        $this->assertEquals("012A7CA357541F0AC487871FEEC1891C49C", $res[3]->getHash());
        $this->assertEquals(2, $res[3]->getCount());

        $this->assertEquals("0136E006E24E7D152139815FB0FC6A50B15", $res[4]->getHash());
        $this->assertEquals(2, $res[4]->getCount());
    }

}
