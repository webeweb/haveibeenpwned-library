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
use WBW\Library\HaveIBeenPwned\Model\HaveIBeenPwnedBreach;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\App\TestFixtures;

/**
 * HaveIBeenPwned breach test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model
 * @final
 */
final class HaveIBeenPwnedBreachTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new HaveIBeenPwnedBreach(TestFixtures::getSampleBreachResponse()[0]);

        $this->assertEquals("2013-12-04T00:00Z", $obj->getAddedDate()->format("Y-m-d\TH:i\Z"));
        $this->assertEquals("2013-10-04", $obj->getBreachDate()->format("Y-m-d"));
        $this->assertEquals("adobe.com", $obj->getDomain());
        $this->assertEquals("2013-12-04T00:00Z", $obj->getAddedDate()->format("Y-m-d\TH:i\Z"));
        $this->assertEquals("Adobe", $obj->getName());
        $this->assertEquals(152445165, $obj->getPwnCount());
        $this->assertFalse($obj->getRetired());
        $this->assertFalse($obj->getSensitive());
        $this->assertFalse($obj->getSpamList());
        $this->assertEquals("Adobe", $obj->getTitle());
        $this->assertTrue($obj->getVerified());
    }

}
