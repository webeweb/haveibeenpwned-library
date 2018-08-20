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
use PHPUnit_Framework_TestCase;
use WBW\Library\HaveIBeenPwned\API\HaveIBeenPwnedModelInterface;
use WBW\Library\HaveIBeenPwned\Model\HaveIBeenPwnedPaste;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\App\TestFixtures;

/**
 * HaveIBeenPwned paste model test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package  WBW\Library\HaveIBeenPwned\Tests\Model
 * @final
 */
final class HaveIBeenPwnedPasteTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new HaveIBeenPwnedPaste();

        $this->assertNull($obj->getDate());
        $this->assertEquals(0, $obj->getEmailCount());
        $this->assertNull($obj->getId());
        $this->assertNull($obj->getSource());
        $this->assertNull($obj->getTitle());
    }

    /**
     * Tests the parse() method.
     *
     * @return void
     */
    public function testParse() {

        $obj = HaveIBeenPwnedPaste::parse(TestFixtures::getSamplePasteResponse()[0]);

        $this->assertInstanceOf(HaveIBeenPwnedPaste::class, $obj);

        $this->assertEquals("2014-03-04T19:14:54Z", $obj->getDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(139, $obj->getEmailCount());
        $this->assertEquals("8Q0BvKD8", $obj->getId());
        $this->assertEquals("Pastebin", $obj->getSource());
        $this->assertEquals("syslog", $obj->getTitle());
    }

    /**
     * Tests the setDate() method.
     *
     * @return void
     */
    public function testSetDate() {

        $obj = new HaveIBeenPwnedPaste();

        $arg = new DateTime("2018-08-09 18:00");

        $obj->setDate($arg);
        $this->assertSame($arg, $obj->getDate());
    }

    /**
     * Tests the setEmailCount() method.
     *
     * @return void
     */
    public function testSetEmailCount() {

        $obj = new HaveIBeenPwnedPaste();

        $obj->setEmailCount(1);
        $this->assertEquals(1, $obj->getEmailCount());
    }

    /**
     * Tests the setId() method.
     *
     * @return void
     */
    public function testSetId() {

        $obj = new HaveIBeenPwnedPaste();

        $obj->setId("id");
        $this->assertEquals("id", $obj->getId());
    }

    /**
     * Tests the setSource() method.
     *
     * @return voSource
     */
    public function testSetSource() {

        $obj = new HaveIBeenPwnedPaste();

        $obj->setSource("source");
        $this->assertEquals("source", $obj->getSource());
    }

    /**
     * Tests the setTitle() method.
     *
     * @return voTitle
     */
    public function testSetTitle() {

        $obj = new HaveIBeenPwnedPaste();

        $obj->setTitle("title");
        $this->assertEquals("title", $obj->getTitle());
    }

}
