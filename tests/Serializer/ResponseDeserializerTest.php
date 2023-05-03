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
use WBW\Library\HaveIBeenPwned\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Response\RangesResponse;
use WBW\Library\HaveIBeenPwned\Serializer\ResponseDeserializer;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Response Deserializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Serializer
 */
class ResponseDeserializerTest extends AbstractTestCase {

    /**
     * Test deserializeBreachesResponse()
     *
     * @return void
     */
    public function testDeserializeBreachesResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeBreachesResponse.json");

        $obj = new BreachesRequest();

        $res = ResponseDeserializer::deserializeBreachesResponse($rawResponse);
        $this->assertInstanceOf(BreachesResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());

        $this->assertCount(2, $res->getBreaches());

        $this->assertInstanceOf(Breach::class, $res->getBreaches()[0]);
        $this->assertEquals("Adobe", $res->getBreaches()[0]->getName());
        $this->assertEquals("Adobe", $res->getBreaches()[0]->getTitle());
        $this->assertEquals("adobe.com", $res->getBreaches()[0]->getDomain());
        $this->assertEquals("2013-10-04", $res->getBreaches()[0]->getBreachDate()->format(ResponseInterface::DATETIME_FORMAT_BREACH));
        $this->assertEquals("2013-12-04T00:00Z", $res->getBreaches()[0]->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2013-12-04T00:00Z", $res->getBreaches()[0]->getModifiedDate()->format(ResponseInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals(152445165, $res->getBreaches()[0]->getPwnCount());
        $this->assertStringContainsString("In October 2013", $res->getBreaches()[0]->getDescription());
        $this->assertCount(4, $res->getBreaches()[0]->getDataClasses());
        $this->assertTrue($res->getBreaches()[0]->getVerified());
        $this->assertFalse($res->getBreaches()[0]->getSensitive());
        $this->assertFalse($res->getBreaches()[0]->getRetired());
        $this->assertFalse($res->getBreaches()[0]->getSpamList());

        $this->assertInstanceOf(Breach::class, $res->getBreaches()[1]);
        $this->assertEquals("BattlefieldHeroes", $res->getBreaches()[1]->getName());
        $this->assertEquals("Battlefield Heroes", $res->getBreaches()[1]->getTitle());
        $this->assertEquals("battlefieldheroes.com", $res->getBreaches()[1]->getDomain());
        $this->assertEquals("2011-06-26", $res->getBreaches()[1]->getBreachDate()->format(ResponseInterface::DATETIME_FORMAT_BREACH));
        $this->assertEquals("2014-01-23T13:10Z", $res->getBreaches()[1]->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2014-01-23T13:10Z", $res->getBreaches()[1]->getModifiedDate()->format(ResponseInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals(530270, $res->getBreaches()[1]->getPwnCount());
        $this->assertStringContainsString("In June 2011", $res->getBreaches()[1]->getDescription());
        $this->assertCount(2, $res->getBreaches()[1]->getDataClasses());
        $this->assertTrue($res->getBreaches()[1]->getVerified());
        $this->assertFalse($res->getBreaches()[1]->getSensitive());
        $this->assertFalse($res->getBreaches()[1]->getRetired());
        $this->assertFalse($res->getBreaches()[1]->getSpamList());
    }

    /**
     * Test deserializeDataClassesResponse()
     *
     * @return void
     */
    public function testDeserializeDataClassesResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeDataClassesResponse.json");

        $res = ResponseDeserializer::deserializeDataClassesResponse($rawResponse);
        $this->assertInstanceOf(DataClassesResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());

        $this->assertCount(4, $res->getDataClasses());

        $this->assertInstanceOf(DataClass::class, $res->getDataClasses()[0]);
        $this->assertEquals("Email addresses", $res->getDataClasses()[0]->getName());

        $this->assertInstanceOf(DataClass::class, $res->getDataClasses()[1]);
        $this->assertEquals("Password hints", $res->getDataClasses()[1]->getName());

        $this->assertInstanceOf(DataClass::class, $res->getDataClasses()[2]);
        $this->assertEquals("Passwords", $res->getDataClasses()[2]->getName());

        $this->assertInstanceOf(DataClass::class, $res->getDataClasses()[3]);
        $this->assertEquals("Usernames", $res->getDataClasses()[3]->getName());
    }

    /**
     * Test deserializePastesResponse()
     *
     * @return void
     */
    public function testDeserializePastesResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializePastesResponse.json");

        $res = ResponseDeserializer::deserializePastesResponse($rawResponse);
        $this->assertInstanceOf(PastesResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());

        $this->assertCount(2, $res->getPastes());

        $this->assertInstanceOf(Paste::class, $res->getPastes()[0]);
        $this->assertEquals("Pastebin", $res->getPastes()[0]->getSource());
        $this->assertEquals("8Q0BvKD8", $res->getPastes()[0]->getId());
        $this->assertEquals("syslog", $res->getPastes()[0]->getTitle());
        $this->assertEquals("2014-03-04T19:14:54Z", $res->getPastes()[0]->getDate()->format(ResponseInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(139, $res->getPastes()[0]->getEmailCount());

        $this->assertInstanceOf(Paste::class, $res->getPastes()[1]);
        $this->assertEquals("Pastie", $res->getPastes()[1]->getSource());
        $this->assertEquals("7152479", $res->getPastes()[1]->getId());
        $this->assertNull($res->getPastes()[1]->getTitle());
        $this->assertEquals("2013-03-28T16:51:10Z", $res->getPastes()[1]->getDate()->format(ResponseInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(30, $res->getPastes()[1]->getEmailCount());
    }

    /**
     * Test deserializeRangesResponse()
     *
     * @return void
     */
    public function testDeserializeRangesResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeRangesResponse.txt");

        $res = ResponseDeserializer::deserializeRangesResponse($rawResponse);
        $this->assertInstanceOf(RangesResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());

        $this->assertCount(5, $res->getRanges());

        $this->assertInstanceOf(Range::class, $res->getRanges()[0]);
        $this->assertEquals("0018A45C4D1DEF81644B54AB7F969B88D65", $res->getRanges()[0]->getHash());
        $this->assertEquals(1, $res->getRanges()[0]->getCount());

        $this->assertInstanceOf(Range::class, $res->getRanges()[1]);
        $this->assertEquals("00D4F6E8FA6EECAD2A3AA415EEC418D38EC", $res->getRanges()[1]->getHash());
        $this->assertEquals(2, $res->getRanges()[1]->getCount());

        $this->assertInstanceOf(Range::class, $res->getRanges()[2]);
        $this->assertEquals("011053FD0102E94D6AE2F8B83D76FAF94F6", $res->getRanges()[2]->getHash());
        $this->assertEquals(1, $res->getRanges()[2]->getCount());

        $this->assertInstanceOf(Range::class, $res->getRanges()[3]);
        $this->assertEquals("012A7CA357541F0AC487871FEEC1891C49C", $res->getRanges()[3]->getHash());
        $this->assertEquals(2, $res->getRanges()[3]->getCount());

        $this->assertInstanceOf(Range::class, $res->getRanges()[4]);
        $this->assertEquals("0136E006E24E7D152139815FB0FC6A50B15", $res->getRanges()[4]->getHash());
        $this->assertEquals(2, $res->getRanges()[4]->getCount());
    }

}
