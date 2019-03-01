<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Normalizer;

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
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Normalizer\TestResponseNormalizer;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\TestFixtures;

/**
 * Response normalizer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Normalizer
 */
class ResponseNormalizerTest extends AbstractTestCase {

    /**
     * Tests the cleanResponse() method.
     *
     * @return void
     */
    public function testCleanResponse() {

        $arg = TestFixtures::SAMPLE_BREACH_RESPONSE;

        $this->assertContains("True", $arg);
        $this->assertContains("False", $arg);

        $res = TestResponseNormalizer::cleanResponse($arg);

        $this->assertNotContains("True", $res);
        $this->assertNotContains("False", $res);
    }

    /**
     * Tests the denormalizeBreach() method.
     *
     * @return void
     */
    public function testDenormalizeBreach() {

        $dataClasses = json_decode(TestFixtures::SAMPLE_DATA_CLASS_RESPONSE);

        $obj = TestResponseNormalizer::denormalizeBreach(TestFixtures::getSampleBreachResponse()[0]);

        $this->assertInstanceOf(Breach::class, $obj);

        $this->assertEquals("2013-12-04T00:00Z", $obj->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2013-10-04", $obj->getBreachDate()->format(ResponseInterface::DATETIME_FORMAT_BREACH));
        $this->assertCount(4, $obj->getDataClasses());
        $this->assertContains("In October 2013", $obj->getDescription());
        $this->assertEquals("adobe.com", $obj->getDomain());
        $this->assertEquals("2013-12-04T00:00Z", $obj->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_MODIFIED));
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
     * Tests the denormalizeBreachesResponse() method.
     *
     * @return void
     */
    public function testDenormalizeBreachesResponse() {

        $obj = TestResponseNormalizer::denormalizeBreachesResponse(TestFixtures::SAMPLE_BREACH_RESPONSE);

        $this->assertInstanceOf(BreachesResponse::class, $obj);

        $res = $obj->getBreaches();
        $this->assertCount(2, $res);

        $this->assertInstanceOf(Breach::class, $res[0]);
        $this->assertEquals("2013-12-04T00:00Z", $res[0]->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2013-10-04", $res[0]->getBreachDate()->format(ResponseInterface::DATETIME_FORMAT_BREACH));
        $this->assertCount(4, $res[0]->getDataClasses());
        $this->assertContains("In October 2013", $res[0]->getDescription());
        $this->assertEquals("adobe.com", $res[0]->getDomain());
        $this->assertEquals("2013-12-04T00:00Z", $res[0]->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals("Adobe", $res[0]->getName());
        $this->assertEquals(152445165, $res[0]->getPwnCount());
        $this->assertFalse($res[0]->getRetired());
        $this->assertFalse($res[0]->getSensitive());
        $this->assertFalse($res[0]->getSpamList());
        $this->assertEquals("Adobe", $res[0]->getTitle());
        $this->assertTrue($res[0]->getVerified());

        $this->assertInstanceOf(Breach::class, $res[1]);
        $this->assertEquals("2014-01-23T13:10Z", $res[1]->getAddedDate()->format(ResponseInterface::DATETIME_FORMAT_ADDED));
        $this->assertEquals("2011-06-26", $res[1]->getBreachDate()->format(ResponseInterface::DATETIME_FORMAT_BREACH));
        $this->assertCount(2, $res[1]->getDataClasses());
        $this->assertContains("In June 2011", $res[1]->getDescription());
        $this->assertEquals("battlefieldheroes.com", $res[1]->getDomain());
        $this->assertEquals("2014-01-23T13:10Z", $res[1]->getModifiedDate()->format(ResponseInterface::DATETIME_FORMAT_MODIFIED));
        $this->assertEquals("BattlefieldHeroes", $res[1]->getName());
        $this->assertEquals(530270, $res[1]->getPwnCount());
        $this->assertFalse($res[1]->getRetired());
        $this->assertFalse($res[1]->getSensitive());
        $this->assertFalse($res[1]->getSpamList());
        $this->assertEquals("Battlefield Heroes", $res[1]->getTitle());
        $this->assertTrue($res[1]->getVerified());
    }

    /**
     * Tests the denormalizeDataClass() method.
     *
     * @return void
     */
    public function testDenormalizeDataClass() {

        $dataClasses = json_decode(TestFixtures::SAMPLE_DATA_CLASS_RESPONSE);

        $obj = TestResponseNormalizer::denormalizeDataClass($dataClasses[0]);

        $this->assertInstanceOf(DataClass::class, $obj);

        $this->assertEquals("Email addresses", $obj->getName());
    }

    /**
     * Tests the denormalizeDataClassesResponse() method.
     *
     * @return void
     */
    public function testDenormalizeDataClassesResponse() {

        $obj = TestResponseNormalizer::denormalizeDataClassesResponse(TestFixtures::SAMPLE_DATA_CLASS_RESPONSE);

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
     * Tests the denormalizePaste() method.
     *
     * @return void
     */
    public function testDenormalizePaste() {

        $obj = TestResponseNormalizer::denormalizePaste(TestFixtures::getSamplePasteResponse()[0]);

        $this->assertInstanceOf(Paste::class, $obj);

        $this->assertEquals("2014-03-04T19:14:54Z", $obj->getDate()->format(ResponseInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(139, $obj->getEmailCount());
        $this->assertEquals("8Q0BvKD8", $obj->getId());
        $this->assertEquals("Pastebin", $obj->getSource());
        $this->assertEquals("syslog", $obj->getTitle());
    }

    /**
     * Tests the denormalizePastesResponse() method.
     *
     * @return void
     */
    public function testDenormalizePastesResponse() {

        $obj = TestResponseNormalizer::denormalizePastesResponse(TestFixtures::SAMPLE_PASTE_RESPONSE);

        $this->assertInstanceOf(PastesResponse::class, $obj);

        $res = $obj->getPastes();
        $this->assertCount(2, $res);

        $this->assertInstanceOf(Paste::class, $res[0]);
        $this->assertEquals("2014-03-04T19:14:54Z", $res[0]->getDate()->format(ResponseInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(139, $res[0]->getEmailCount());
        $this->assertEquals("8Q0BvKD8", $res[0]->getId());
        $this->assertEquals("Pastebin", $res[0]->getSource());
        $this->assertEquals("syslog", $res[0]->getTitle());

        $this->assertInstanceOf(Paste::class, $res[1]);
        $this->assertEquals("2013-03-28T16:51:10Z", $res[1]->getDate()->format(ResponseInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(30, $res[1]->getEmailCount());
        $this->assertEquals("7152479", $res[1]->getId());
        $this->assertEquals("Pastie", $res[1]->getSource());
        $this->assertNull($res[1]->getTitle());
    }

    /**
     * Tests the denormalizeRange() method.
     *
     * @return void
     */
    public function testDenormalizeRange() {

        $obj = TestResponseNormalizer::denormalizeRange("0018A45C4D1DEF81644B54AB7F969B88D65:1");

        $this->assertInstanceOf(Range::class, $obj);

        $this->assertEquals(1, $obj->getCount());
        $this->assertEquals("0018A45C4D1DEF81644B54AB7F969B88D65", $obj->getHash());
        $this->assertNull($obj->getPrefix());
    }

    /**
     * Tests the denormalizeRangesResponse() method.
     *
     * @return void
     */
    public function testDenormalizeRangeResponse() {

        $obj = TestResponseNormalizer::denormalizeRangesResponse(TestFixtures::SAMPLE_RANGE_RESPONSE);

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
     * Tests the denormalizeRange() method.
     *
     * @return void
     */
    public function testDenormalizeRangeWithBadRawResponse() {

        $obj = TestResponseNormalizer::denormalizeRange("0018A45C4D1DEF81644B54AB7F969B88D65");

        $this->assertInstanceOf(Range::class, $obj);

        $this->assertEquals(0, $obj->getCount());
        $this->assertNull($obj->getHash());
        $this->assertNull($obj->getPrefix());
    }
}
