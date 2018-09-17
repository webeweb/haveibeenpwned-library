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

use DateTime;
use WBW\Library\HaveIBeenPwned\API\HaveIBeenPwnedModelInterface;
use WBW\Library\HaveIBeenPwned\Model\HaveIBeenPwnedBreach;
use WBW\Library\HaveIBeenPwned\Tests\Cases\AbstractHaveIBeenPwnedFrameworkTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\TestFixtures;

/**
 * HaveIBeenPwned breach model test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model
 * @final
 */
final class HaveIBeenPwnedBreachTest extends AbstractHaveIBeenPwnedFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new HaveIBeenPwnedBreach();

        $this->assertNull($obj->getAddedDate());
        $this->assertNull($obj->getBreachDate());
        $this->assertEquals([], $obj->getDataClasses());
        $this->assertNull($obj->getDomain());
        $this->assertNull($obj->getAddedDate());
        $this->assertNull($obj->getName());
        $this->assertEquals(0, $obj->getPwnCount());
        $this->assertFalse($obj->getRetired());
        $this->assertFalse($obj->getSensitive());
        $this->assertFalse($obj->getSpamList());
        $this->assertNull($obj->getTitle());
        $this->assertFalse($obj->getVerified());
    }

    /**
     * Tests the parse() method.
     *
     * @return void
     */
    public function testParse() {

        $dataClasses = json_decode(TestFixtures::SAMPLE_DATA_CLASS_RESPONSE);

        $obj = HaveIBeenPwnedBreach::parse(TestFixtures::getSampleBreachResponse()[0]);

        $this->assertInstanceOf(HaveIBeenPwnedBreach::class, $obj);
        $this->assertEquals("2013-12-04T00:00Z", $obj->getAddedDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2013-10-04", $obj->getBreachDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_BREACH));
        $this->assertCount(4, $obj->getDataClasses());
        $this->assertContains("In October 2013", $obj->getDescription());
        $this->assertEquals("adobe.com", $obj->getDomain());
        $this->assertEquals("2013-12-04T00:00Z", $obj->getAddedDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals("Adobe", $obj->getName());
        $this->assertEquals(152445165, $obj->getPwnCount());
        $this->assertFalse($obj->getRetired());
        $this->assertFalse($obj->getSensitive());
        $this->assertFalse($obj->getSpamList());
        $this->assertEquals("Adobe", $obj->getTitle());
        $this->assertTrue($obj->getVerified());
        for ($i = 0; $i < 4; ++$i) {
            $this->assertEquals($dataClasses[$i], $obj->getDataClasses()[$i]->getName());
        }
    }

    /**
     * Tests the setAddedDate() method.
     *
     * @return void
     */
    public function testSetAddedDate() {

        $obj = new HaveIBeenPwnedBreach();

        $arg = new DateTime("2018-08-11 09:30");

        $obj->setAddedDate($arg);
        $this->assertSame($arg, $obj->getAddedDate());
    }

    /**
     * Tests the setBreachDate() method.
     *
     * @return void
     */
    public function testSetBreachDate() {

        $obj = new HaveIBeenPwnedBreach();

        $arg = new DateTime("2018-08-11 09:30");

        $obj->setBreachDate($arg);
        $this->assertSame($arg, $obj->getBreachDate());
    }

    /**
     * Tests the setDataClasses() method.
     *
     * @return void
     */
    public function testSetDataClasses() {

        $obj = new HaveIBeenPwnedBreach();

        $obj->setDataClasses([]);
        $this->assertEquals([], $obj->getDataClasses());
    }

    /**
     * Tests the setDescription() method.
     *
     * @return void
     */
    public function testSetDescription() {

        $obj = new HaveIBeenPwnedBreach();

        $obj->setDescription("description");
        $this->assertEquals("description", $obj->getDescription());
    }

    /**
     * Tests the setDomain() method.
     *
     * @return void
     */
    public function testSetDomain() {

        $obj = new HaveIBeenPwnedBreach();

        $obj->setDomain("domain");
        $this->assertEquals("domain", $obj->getDomain());
    }

    /**
     * Tests the setFabricated() method.
     *
     * @return void
     */
    public function testSetFabricated() {

        $obj = new HaveIBeenPwnedBreach();

        $obj->setFabricated(true);
        $this->assertTrue($obj->getFabricated());
    }

    /**
     * Tests the setModifiedDate() method.
     *
     * @return void
     */
    public function testSetModifiedDate() {

        $obj = new HaveIBeenPwnedBreach();

        $arg = new DateTime("2018-08-11 09:30");

        $obj->setModifiedDate($arg);
        $this->assertSame($arg, $obj->getModifiedDate());
    }

    /**
     * Tests the setName() method.
     *
     * @return void
     */
    public function testSetName() {

        $obj = new HaveIBeenPwnedBreach();

        $obj->setName("name");
        $this->assertEquals("name", $obj->getName());
    }

    /**
     * Tests the setPwnCount() method.
     *
     * @return void
     */
    public function testSetPwnCount() {

        $obj = new HaveIBeenPwnedBreach();

        $obj->setPwnCount(1);
        $this->assertEquals(1, $obj->getPwnCount());
    }

    /**
     * Tests the setRetired() method.
     *
     * @return void
     */
    public function testSetRetired() {

        $obj = new HaveIBeenPwnedBreach();

        $obj->setRetired(true);
        $this->assertTrue($obj->getRetired());
    }

    /**
     * Tests the setSensitive() method.
     *
     * @return void
     */
    public function testSetSensitive() {

        $obj = new HaveIBeenPwnedBreach();

        $obj->setSensitive(true);
        $this->assertTrue($obj->getSensitive());
    }

    /**
     * Tests the setSpamList() method.
     *
     * @return void
     */
    public function testSetSpamList() {

        $obj = new HaveIBeenPwnedBreach();

        $obj->setSpamList(true);
        $this->assertTrue($obj->getSpamList());
    }

    /**
     * Tests the setTitle() method.
     *
     * @return void
     */
    public function testSetTitle() {

        $obj = new HaveIBeenPwnedBreach();

        $obj->setTitle("title");
        $this->assertEquals("title", $obj->getTitle());
    }

    /**
     * Tests the setVerified() method.
     *
     * @return void
     */
    public function testSetVerified() {

        $obj = new HaveIBeenPwnedBreach();

        $obj->setVerified(true);
        $this->assertTrue($obj->getVerified());
    }

}
