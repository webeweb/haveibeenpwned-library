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

use DateTime;
use Exception;
use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Breach test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model
 */
class BreachTest extends AbstractTestCase {

    /**
     * Tests setAddedDate()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSetAddedDate(): void {

        $obj = new Breach();

        $arg = new DateTime("2018-08-11 09:30");

        $obj->setAddedDate($arg);
        $this->assertSame($arg, $obj->getAddedDate());
    }

    /**
     * Tests setBreachDate()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSetBreachDate(): void {

        $obj = new Breach();

        $arg = new DateTime("2018-08-11 09:30");

        $obj->setBreachDate($arg);
        $this->assertSame($arg, $obj->getBreachDate());
    }

    /**
     * Tests setDataClasses()
     *
     * @return void
     */
    public function testSetDataClasses(): void {

        $obj = new Breach();

        $obj->setDataClasses([]);
        $this->assertEquals([], $obj->getDataClasses());
    }

    /**
     * Tests setFabricated()
     *
     * @return void
     */
    public function testSetFabricated(): void {

        $obj = new Breach();

        $obj->setFabricated(true);
        $this->assertTrue($obj->getFabricated());
    }

    /**
     * Tests setModifiedDate()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSetModifiedDate(): void {

        $obj = new Breach();

        $arg = new DateTime("2018-08-11 09:30");

        $obj->setModifiedDate($arg);
        $this->assertSame($arg, $obj->getModifiedDate());
    }

    /**
     * Tests setPwnCount()
     *
     * @return void
     */
    public function testSetPwnCount(): void {

        $obj = new Breach();

        $obj->setPwnCount(1);
        $this->assertEquals(1, $obj->getPwnCount());
    }

    /**
     * Tests setRetired()
     *
     * @return void
     */
    public function testSetRetired(): void {

        $obj = new Breach();

        $obj->setRetired(true);
        $this->assertTrue($obj->getRetired());
    }

    /**
     * Tests setSensitive()
     *
     * @return void
     */
    public function testSetSensitive(): void {

        $obj = new Breach();

        $obj->setSensitive(true);
        $this->assertTrue($obj->getSensitive());
    }

    /**
     * Tests setSpamList()
     *
     * @return void
     */
    public function testSetSpamList(): void {

        $obj = new Breach();

        $obj->setSpamList(true);
        $this->assertTrue($obj->getSpamList());
    }

    /**
     * Tests setVerified()
     *
     * @return void
     */
    public function testSetVerified(): void {

        $obj = new Breach();

        $obj->setVerified(true);
        $this->assertTrue($obj->getVerified());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Breach();

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
}
