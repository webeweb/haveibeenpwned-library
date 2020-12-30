<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Serializer;

use WBW\Library\HaveIBeenPwned\API\ResponseInterface;
use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Model\DataClass;
use WBW\Library\HaveIBeenPwned\Model\Paste;
use WBW\Library\HaveIBeenPwned\Model\Range;
use WBW\Library\HaveIBeenPwned\Model\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\RangesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Serializer\TestResponseDeserializer;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\TestFixtures;

/**
 * Response Deserializer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Serializer
 */
class ResponseDeserializerTest extends AbstractTestCase {

    /**
     * Tests the cleanResponse() method.
     *
     * @return void
     */
    public function testCleanResponse(): void {

        $arg = TestFixtures::SAMPLE_BREACH_RESPONSE;

        $this->assertContains("True", $arg);
        $this->assertContains("False", $arg);

        $res = TestResponseDeserializer::cleanResponse($arg);

        $this->assertNotContains("True", $res);
        $this->assertNotContains("False", $res);
    }

    /**
     * Tests the deserializeBreach() method.
     *
     * @return void
     */
    public function testDeserializeBreach(): void {

        $dataClasses = json_decode(TestFixtures::SAMPLE_DATA_CLASS_RESPONSE);

        $obj = TestResponseDeserializer::deserializeBreach(TestFixtures::getSampleBreachResponse()[0]);

        $this->assertInstanceOf(Breach::class, $obj);

        $this->assertEquals("Adobe", $obj->getName());
        $this->assertEquals("Adobe", $obj->getTitle());
        $this->assertEquals("adobe.com", $obj->getDomain());
        $this->assertEquals("2013-12-04T00:00Z", $obj->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2013-10-04", $obj->getBreachDate()->format(ResponseInterface::DATETIME_FORMAT_BREACH));
        $this->assertCount(4, $obj->getDataClasses());
        $this->assertContains("In October 2013", $obj->getDescription());
        $this->assertEquals("2013-12-04T00:00Z", $obj->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals(152445165, $obj->getPwnCount());
        $this->assertFalse($obj->getRetired());
        $this->assertFalse($obj->getSensitive());
        $this->assertFalse($obj->getSpamList());
        $this->assertTrue($obj->getVerified());

        for ($i = 0; $i < 4; ++$i) {
            $this->assertEquals($dataClasses[$i], $obj->getDataClasses()[$i]->getName());
        }
    }

    /**
     * Tests the deserializeBreachesResponse() method.
     *
     * @return void
     */
    public function testDeserializeBreachesResponse(): void {

        $obj = TestResponseDeserializer::deserializeBreachesResponse(TestFixtures::SAMPLE_BREACH_RESPONSE);

        $this->assertInstanceOf(BreachesResponse::class, $obj);

        $res = $obj->getBreaches();
        $this->assertCount(2, $res);

        $this->assertInstanceOf(Breach::class, $res[0]);
        $this->assertEquals("Adobe", $res[0]->getName());
        $this->assertEquals("Adobe", $res[0]->getTitle());
        $this->assertEquals("adobe.com", $res[0]->getDomain());
        $this->assertEquals("2013-10-04", $res[0]->getBreachDate()->format(ResponseInterface::DATETIME_FORMAT_BREACH));
        $this->assertEquals("2013-12-04T00:00Z", $res[0]->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2013-12-04T00:00Z", $res[0]->getModifiedDate()->format(ResponseInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals(152445165, $res[0]->getPwnCount());
        $this->assertContains("In October 2013", $res[0]->getDescription());
        $this->assertCount(4, $res[0]->getDataClasses());
        $this->assertTrue($res[0]->getVerified());
        $this->assertFalse($res[0]->getSensitive());
        $this->assertFalse($res[0]->getRetired());
        $this->assertFalse($res[0]->getSpamList());

        $this->assertInstanceOf(Breach::class, $res[1]);
        $this->assertEquals("BattlefieldHeroes", $res[1]->getName());
        $this->assertEquals("Battlefield Heroes", $res[1]->getTitle());
        $this->assertEquals("battlefieldheroes.com", $res[1]->getDomain());
        $this->assertEquals("2011-06-26", $res[1]->getBreachDate()->format(ResponseInterface::DATETIME_FORMAT_BREACH));
        $this->assertEquals("2014-01-23T13:10Z", $res[1]->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2014-01-23T13:10Z", $res[1]->getModifiedDate()->format(ResponseInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals(530270, $res[1]->getPwnCount());
        $this->assertContains("In June 2011", $res[1]->getDescription());
        $this->assertCount(2, $res[1]->getDataClasses());
        $this->assertTrue($res[1]->getVerified());
        $this->assertFalse($res[1]->getSensitive());
        $this->assertFalse($res[1]->getRetired());
        $this->assertFalse($res[1]->getSpamList());
    }

    /**
     * Tests the deserializeDataClass() method.
     *
     * @return void
     */
    public function testDeserializeDataClass(): void {

        $dataClasses = json_decode(TestFixtures::SAMPLE_DATA_CLASS_RESPONSE);

        $obj = TestResponseDeserializer::deserializeDataClass($dataClasses[0]);

        $this->assertInstanceOf(DataClass::class, $obj);

        $this->assertEquals("Email addresses", $obj->getName());
    }

    /**
     * Tests the deserializeDataClassesResponse() method.
     *
     * @return void
     */
    public function testDeserializeDataClassesResponse(): void {

        $obj = TestResponseDeserializer::deserializeDataClassesResponse(TestFixtures::SAMPLE_DATA_CLASS_RESPONSE);

        $this->assertInstanceOf(DataClassesResponse::class, $obj);

        $res = $obj->getDataClasses();
        $this->assertCount(4, $res);

        $this->assertInstanceOf(DataClass::class, $res[0]);
        $this->assertEquals("Email addresses", $res[0]->getName());

        $this->assertInstanceOf(DataClass::class, $res[1]);
        $this->assertEquals("Password hints", $res[1]->getName());

        $this->assertInstanceOf(DataClass::class, $res[2]);
        $this->assertEquals("Passwords", $res[2]->getName());

        $this->assertInstanceOf(DataClass::class, $res[3]);
        $this->assertEquals("Usernames", $res[3]->getName());
    }

    /**
     * Tests the deserializePaste() method.
     *
     * @return void
     */
    public function testDeserializePaste(): void {

        $obj = TestResponseDeserializer::deserializePaste(TestFixtures::getSamplePasteResponse()[0]);

        $this->assertInstanceOf(Paste::class, $obj);

        $this->assertEquals("Pastebin", $obj->getSource());
        $this->assertEquals("8Q0BvKD8", $obj->getId());
        $this->assertEquals("syslog", $obj->getTitle());
        $this->assertEquals("2014-03-04T19:14:54Z", $obj->getDate()->format(ResponseInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(139, $obj->getEmailCount());
    }

    /**
     * Tests the deserializePastesResponse() method.
     *
     * @return void
     */
    public function testDeserializePastesResponse(): void {

        $obj = TestResponseDeserializer::deserializePastesResponse(TestFixtures::SAMPLE_PASTE_RESPONSE);

        $this->assertInstanceOf(PastesResponse::class, $obj);

        $res = $obj->getPastes();
        $this->assertCount(2, $res);

        $this->assertInstanceOf(Paste::class, $res[0]);
        $this->assertEquals("Pastebin", $res[0]->getSource());
        $this->assertEquals("8Q0BvKD8", $res[0]->getId());
        $this->assertEquals("syslog", $res[0]->getTitle());
        $this->assertEquals("2014-03-04T19:14:54Z", $res[0]->getDate()->format(ResponseInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(139, $res[0]->getEmailCount());

        $this->assertInstanceOf(Paste::class, $res[1]);
        $this->assertEquals("Pastie", $res[1]->getSource());
        $this->assertEquals("7152479", $res[1]->getId());
        $this->assertNull($res[1]->getTitle());
        $this->assertEquals("2013-03-28T16:51:10Z", $res[1]->getDate()->format(ResponseInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(30, $res[1]->getEmailCount());
    }

    /**
     * Tests the deserializeRange() method.
     *
     * @return void
     */
    public function testDeserializeRange(): void {

        $obj = TestResponseDeserializer::deserializeRange("0018A45C4D1DEF81644B54AB7F969B88D65:1");

        $this->assertInstanceOf(Range::class, $obj);

        $this->assertEquals("0018A45C4D1DEF81644B54AB7F969B88D65", $obj->getHash());
        $this->assertEquals(1, $obj->getCount());
        $this->assertNull($obj->getPrefix());
    }

    /**
     * Tests the deserializeRangesResponse() method.
     *
     * @return void
     */
    public function testDeserializeRangeResponse(): void {

        $obj = TestResponseDeserializer::deserializeRangesResponse(TestFixtures::SAMPLE_RANGE_RESPONSE);

        $this->assertInstanceOf(RangesResponse::class, $obj);

        $res = $obj->getRanges();
        $this->assertCount(5, $res);

        $this->assertInstanceOf(Range::class, $res[0]);
        $this->assertEquals("0018A45C4D1DEF81644B54AB7F969B88D65", $res[0]->getHash());
        $this->assertEquals(1, $res[0]->getCount());

        $this->assertInstanceOf(Range::class, $res[1]);
        $this->assertEquals("00D4F6E8FA6EECAD2A3AA415EEC418D38EC", $res[1]->getHash());
        $this->assertEquals(2, $res[1]->getCount());

        $this->assertInstanceOf(Range::class, $res[2]);
        $this->assertEquals("011053FD0102E94D6AE2F8B83D76FAF94F6", $res[2]->getHash());
        $this->assertEquals(1, $res[2]->getCount());

        $this->assertInstanceOf(Range::class, $res[3]);
        $this->assertEquals("012A7CA357541F0AC487871FEEC1891C49C", $res[3]->getHash());
        $this->assertEquals(2, $res[3]->getCount());

        $this->assertInstanceOf(Range::class, $res[4]);
        $this->assertEquals("0136E006E24E7D152139815FB0FC6A50B15", $res[4]->getHash());
        $this->assertEquals(2, $res[4]->getCount());
    }

    /**
     * Tests the deserializeRange() method.
     *
     * @return void
     */
    public function testDeserializeRangeWithBadRawResponse(): void {

        $obj = TestResponseDeserializer::deserializeRange("0018A45C4D1DEF81644B54AB7F969B88D65");

        $this->assertInstanceOf(Range::class, $obj);

        $this->assertEquals(0, $obj->getCount());
        $this->assertNull($obj->getHash());
        $this->assertNull($obj->getPrefix());
    }
}
