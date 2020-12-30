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
use WBW\Library\HaveIBeenPwned\Model\Paste;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Paste test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package  WBW\Library\HaveIBeenPwned\Tests\Model
 */
class PasteTest extends AbstractTestCase {

    /**
     * Tests the setDate() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSetDate(): void {

        $obj = new Paste();

        $arg = new DateTime("2018-08-09 18:00");

        $obj->setDate($arg);
        $this->assertSame($arg, $obj->getDate());
    }

    /**
     * Tests the setEmailCount() method.
     *
     * @return void
     */
    public function testSetEmailCount(): void {

        $obj = new Paste();

        $obj->setEmailCount(1);
        $this->assertEquals(1, $obj->getEmailCount());
    }

    /**
     * Tests the setId() method.
     *
     * @return void
     */
    public function testSetId(): void {

        $obj = new Paste();

        $obj->setId("id");
        $this->assertEquals("id", $obj->getId());
    }

    /**
     * Tests the setSource() method.
     *
     * @return void
     */
    public function testSetSource(): void {

        $obj = new Paste();

        $obj->setSource("source");
        $this->assertEquals("source", $obj->getSource());
    }

    /**
     * Tests the setTitle() method.
     *
     * @return void
     */
    public function testSetTitle(): void {

        $obj = new Paste();

        $obj->setTitle("title");
        $this->assertEquals("title", $obj->getTitle());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Paste();

        $this->assertNull($obj->getDate());
        $this->assertEquals(0, $obj->getEmailCount());
        $this->assertNull($obj->getId());
        $this->assertNull($obj->getSource());
        $this->assertNull($obj->getTitle());
    }
}
