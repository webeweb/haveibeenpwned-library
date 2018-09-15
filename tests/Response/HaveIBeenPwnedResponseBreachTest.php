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

use WBW\Library\HaveIBeenPwned\API\HaveIBeenPwnedModelInterface;
use WBW\Library\HaveIBeenPwned\Response\HaveIBeenPwnedResponseBreach;
use WBW\Library\HaveIBeenPwned\Tests\Cases\AbstractHaveIBeenPwnedFrameworkTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\App\TestFixtures;

/**
 * HaveIBeenPwned response "Breach" test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Response
 * @final
 */
final class HaveIBeenPwnedResponseBreachTest extends AbstractHaveIBeenPwnedFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new HaveIBeenPwnedResponseBreach(TestFixtures::SAMPLE_BREACH_RESPONSE);

        $res = $obj->getBreaches();

        $this->assertCount(2, $res);

        // Model #1
        $this->assertEquals("2013-12-04T00:00Z", $res[0]->getAddedDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2013-10-04", $res[0]->getBreachDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_BREACH));
        $this->assertCount(4, $res[0]->getDataClasses());
        $this->assertContains("In October 2013", $res[0]->getDescription());
        $this->assertEquals("adobe.com", $res[0]->getDomain());
        $this->assertEquals("2013-12-04T00:00Z", $res[0]->getAddedDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals("Adobe", $res[0]->getName());
        $this->assertEquals(152445165, $res[0]->getPwnCount());
        $this->assertFalse($res[0]->getRetired());
        $this->assertFalse($res[0]->getSensitive());
        $this->assertFalse($res[0]->getSpamList());
        $this->assertEquals("Adobe", $res[0]->getTitle());
        $this->assertTrue($res[0]->getVerified());

        // Model #2
        $this->assertEquals("2014-01-23T13:10Z", $res[1]->getAddedDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2011-06-26", $res[1]->getBreachDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_BREACH));
        $this->assertCount(2, $res[1]->getDataClasses());
        $this->assertContains("In June 2011", $res[1]->getDescription());
        $this->assertEquals("battlefieldheroes.com", $res[1]->getDomain());
        $this->assertEquals("2014-01-23T13:10Z", $res[1]->getModifiedDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals("BattlefieldHeroes", $res[1]->getName());
        $this->assertEquals(530270, $res[1]->getPwnCount());
        $this->assertFalse($res[1]->getRetired());
        $this->assertFalse($res[1]->getSensitive());
        $this->assertFalse($res[1]->getSpamList());
        $this->assertEquals("Battlefield Heroes", $res[1]->getTitle());
        $this->assertTrue($res[1]->getVerified());
    }

}
