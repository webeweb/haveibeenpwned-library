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

use WBW\Library\HaveIBeenPwned\Api\ResponseInterface;
use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Model\DataClass;
use WBW\Library\HaveIBeenPwned\Model\Paste;
use WBW\Library\HaveIBeenPwned\Model\Range;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Response\RangesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Serializer\TestResponseDeserializer;

/**
 * Response Deserializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Serializer
 */
class ResponseDeserializerTest extends AbstractTestCase {

    /**
     * Tests cleanResponse()
     *
     * @return void
     */
    public function testCleanResponse(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/../Fixtures/Response/BreachesResponse.json");

        $this->assertStringContainsString("True", $json);
        $this->assertStringContainsString("False", $json);

        $res = TestResponseDeserializer::cleanResponse($json);

        $this->assertStringNotContainsString("True", $res);
        $this->assertStringNotContainsString("False", $res);
    }

    /**
     * Tests deserializeBreach()
     *
     * @return void
     */
    public function testDeserializeBreach(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/../Fixtures/Response/BreachesResponse.json");
        $data = json_decode(TestResponseDeserializer::cleanResponse($json), true);

        $res = TestResponseDeserializer::deserializeBreach($data[0]);
        $this->assertInstanceOf(Breach::class, $res);

        $this->assertEquals("Adobe", $res->getName());
        $this->assertEquals("Adobe", $res->getTitle());
        $this->assertEquals("adobe.com", $res->getDomain());
        $this->assertEquals("2013-12-04T00:00Z", $res->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2013-10-04", $res->getBreachDate()->format(ResponseInterface::DATETIME_FORMAT_BREACH));
        $this->assertCount(4, $res->getDataClasses());
        $this->assertStringContainsString("In October 2013", $res->getDescription());
        $this->assertEquals("2013-12-04T00:00Z", $res->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals(152445165, $res->getPwnCount());
        $this->assertFalse($res->getRetired());
        $this->assertFalse($res->getSensitive());
        $this->assertFalse($res->getSpamList());
        $this->assertTrue($res->getVerified());

        $exp = json_decode(file_get_contents(__DIR__ . "/../Fixtures/Response/DataClassesResponse.json"), true);

        for ($i = 0; $i < 4; ++$i) {
            $this->assertEquals($exp[$i], $res->getDataClasses()[$i]->getName());
        }
    }

    /**
     * Tests deserializeBreachesResponse()
     *
     * @return void
     */
    public function testDeserializeBreachesResponse(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/../Fixtures/Response/BreachesResponse.json");

        $res = TestResponseDeserializer::deserializeBreachesResponse($json);
        $this->assertInstanceOf(BreachesResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());

        $obj = $res->getBreaches();
        $this->assertCount(2, $obj);

        $this->assertInstanceOf(Breach::class, $obj[0]);
        $this->assertEquals("Adobe", $obj[0]->getName());
        $this->assertEquals("Adobe", $obj[0]->getTitle());
        $this->assertEquals("adobe.com", $obj[0]->getDomain());
        $this->assertEquals("2013-10-04", $obj[0]->getBreachDate()->format(ResponseInterface::DATETIME_FORMAT_BREACH));
        $this->assertEquals("2013-12-04T00:00Z", $obj[0]->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2013-12-04T00:00Z", $obj[0]->getModifiedDate()->format(ResponseInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals(152445165, $obj[0]->getPwnCount());
        $this->assertStringContainsString("In October 2013", $obj[0]->getDescription());
        $this->assertCount(4, $obj[0]->getDataClasses());
        $this->assertTrue($obj[0]->getVerified());
        $this->assertFalse($obj[0]->getSensitive());
        $this->assertFalse($obj[0]->getRetired());
        $this->assertFalse($obj[0]->getSpamList());

        $this->assertInstanceOf(Breach::class, $obj[1]);
        $this->assertEquals("BattlefieldHeroes", $obj[1]->getName());
        $this->assertEquals("Battlefield Heroes", $obj[1]->getTitle());
        $this->assertEquals("battlefieldheroes.com", $obj[1]->getDomain());
        $this->assertEquals("2011-06-26", $obj[1]->getBreachDate()->format(ResponseInterface::DATETIME_FORMAT_BREACH));
        $this->assertEquals("2014-01-23T13:10Z", $obj[1]->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2014-01-23T13:10Z", $obj[1]->getModifiedDate()->format(ResponseInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals(530270, $obj[1]->getPwnCount());
        $this->assertStringContainsString("In June 2011", $obj[1]->getDescription());
        $this->assertCount(2, $obj[1]->getDataClasses());
        $this->assertTrue($obj[1]->getVerified());
        $this->assertFalse($obj[1]->getSensitive());
        $this->assertFalse($obj[1]->getRetired());
        $this->assertFalse($obj[1]->getSpamList());
    }

    /**
     * Tests deserializeDataClass()
     *
     * @return void
     */
    public function testDeserializeDataClass(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/../Fixtures/Response/DataClassesResponse.json");
        $data = json_decode($json, true);

        $res = TestResponseDeserializer::deserializeDataClass($data[0]);
        $this->assertInstanceOf(DataClass::class, $res);

        $this->assertEquals("Email addresses", $res->getName());
    }

    /**
     * Tests deserializeDataClassesResponse()
     *
     * @return void
     */
    public function testDeserializeDataClassesResponse(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/../Fixtures/Response/DataClassesResponse.json");

        $res = TestResponseDeserializer::deserializeDataClassesResponse($json);
        $this->assertInstanceOf(DataClassesResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());

        $obj = $res->getDataClasses();
        $this->assertCount(4, $obj);

        $this->assertInstanceOf(DataClass::class, $obj[0]);
        $this->assertEquals("Email addresses", $obj[0]->getName());

        $this->assertInstanceOf(DataClass::class, $obj[1]);
        $this->assertEquals("Password hints", $obj[1]->getName());

        $this->assertInstanceOf(DataClass::class, $obj[2]);
        $this->assertEquals("Passwords", $obj[2]->getName());

        $this->assertInstanceOf(DataClass::class, $obj[3]);
        $this->assertEquals("Usernames", $obj[3]->getName());
    }

    /**
     * Tests deserializePaste()
     *
     * @return void
     */
    public function testDeserializePaste(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/../Fixtures/Response/PastesResponse.json");
        $data = json_decode($json, true);

        $res = TestResponseDeserializer::deserializePaste($data[0]);
        $this->assertInstanceOf(Paste::class, $res);

        $this->assertEquals("Pastebin", $res->getSource());
        $this->assertEquals("8Q0BvKD8", $res->getId());
        $this->assertEquals("syslog", $res->getTitle());
        $this->assertEquals("2014-03-04T19:14:54Z", $res->getDate()->format(ResponseInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(139, $res->getEmailCount());
    }

    /**
     * Tests deserializePastesResponse()
     *
     * @return void
     */
    public function testDeserializePastesResponse(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/../Fixtures/Response/PastesResponse.json");

        $res = TestResponseDeserializer::deserializePastesResponse($json);
        $this->assertInstanceOf(PastesResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());

        $obj = $res->getPastes();
        $this->assertCount(2, $obj);

        $this->assertInstanceOf(Paste::class, $obj[0]);
        $this->assertEquals("Pastebin", $obj[0]->getSource());
        $this->assertEquals("8Q0BvKD8", $obj[0]->getId());
        $this->assertEquals("syslog", $obj[0]->getTitle());
        $this->assertEquals("2014-03-04T19:14:54Z", $obj[0]->getDate()->format(ResponseInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(139, $obj[0]->getEmailCount());

        $this->assertInstanceOf(Paste::class, $obj[1]);
        $this->assertEquals("Pastie", $obj[1]->getSource());
        $this->assertEquals("7152479", $obj[1]->getId());
        $this->assertNull($obj[1]->getTitle());
        $this->assertEquals("2013-03-28T16:51:10Z", $obj[1]->getDate()->format(ResponseInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(30, $obj[1]->getEmailCount());
    }

    /**
     * Tests deserializeRange()
     *
     * @return void
     */
    public function testDeserializeRange(): void {

        $res = TestResponseDeserializer::deserializeRange("0018A45C4D1DEF81644B54AB7F969B88D65:1");
        $this->assertInstanceOf(Range::class, $res);

        $this->assertEquals("0018A45C4D1DEF81644B54AB7F969B88D65", $res->getHash());
        $this->assertEquals(1, $res->getCount());
        $this->assertNull($res->getPrefix());
    }

    /**
     * Tests deserializeRangesResponse()
     *
     * @return void
     */
    public function testDeserializeRangeResponse(): void {

        // Set a text mock.
        $txt = file_get_contents(__DIR__ . "/../Fixtures/Response/RangesResponse.txt");

        $res = TestResponseDeserializer::deserializeRangesResponse($txt);
        $this->assertInstanceOf(RangesResponse::class, $res);

        $this->assertEquals($txt, $res->getRawResponse());

        $obj = $res->getRanges();
        $this->assertCount(5, $obj);

        $this->assertInstanceOf(Range::class, $obj[0]);
        $this->assertEquals("0018A45C4D1DEF81644B54AB7F969B88D65", $obj[0]->getHash());
        $this->assertEquals(1, $obj[0]->getCount());

        $this->assertInstanceOf(Range::class, $obj[1]);
        $this->assertEquals("00D4F6E8FA6EECAD2A3AA415EEC418D38EC", $obj[1]->getHash());
        $this->assertEquals(2, $obj[1]->getCount());

        $this->assertInstanceOf(Range::class, $obj[2]);
        $this->assertEquals("011053FD0102E94D6AE2F8B83D76FAF94F6", $obj[2]->getHash());
        $this->assertEquals(1, $obj[2]->getCount());

        $this->assertInstanceOf(Range::class, $obj[3]);
        $this->assertEquals("012A7CA357541F0AC487871FEEC1891C49C", $obj[3]->getHash());
        $this->assertEquals(2, $obj[3]->getCount());

        $this->assertInstanceOf(Range::class, $obj[4]);
        $this->assertEquals("0136E006E24E7D152139815FB0FC6A50B15", $obj[4]->getHash());
        $this->assertEquals(2, $obj[4]->getCount());
    }

    /**
     * Tests deserializeRange()
     *
     * @return void
     */
    public function testDeserializeRangeWithBadRawResponse(): void {

        $res = TestResponseDeserializer::deserializeRange("0018A45C4D1DEF81644B54AB7F969B88D65");

        $this->assertInstanceOf(Range::class, $res);

        $this->assertEquals(0, $res->getCount());
        $this->assertNull($res->getHash());
        $this->assertNull($res->getPrefix());
    }
}
