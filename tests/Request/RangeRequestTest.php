<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Request;

use WBW\Library\HaveIBeenPwned\Model\Range;
use WBW\Library\HaveIBeenPwned\Request\RangeRequest;
use WBW\Library\HaveIBeenPwned\Response\RangesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Serializer\TestResponseDeserializer;
use WBW\Library\Provider\Api\SubstituableRequestInterface;

/**
 * Paste account request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 */
class RangeRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeRangesResponse()
     *
     * @return void
     */
    public function testDeserializeRangeResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/RangeRequestTest.testDeserializeResponse.txt");

        $obj = new RangeRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(RangesResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());

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
     * Tests getSubstituables()
     *
     * @return void
     */
    public function testGetSubstituables(): void {

        $obj = new RangeRequest();

        $obj->setHash("hash");
        $this->assertEquals(["{hash}" => "hash"], $obj->getSubstituables());
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new RangeRequest();

        $this->assertEquals([], $obj->serializeRequest());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/range/{hash}", RangeRequest::RANGE_RESOURCE_PATH);

        $obj = new RangeRequest();

        $this->assertNull($obj->getHash());
        $this->assertEquals(RangeRequest::RANGE_RESOURCE_PATH, $obj->getResourcePath());

        $this->assertInstanceOf(SubstituableRequestInterface::class, $obj);

        $this->assertEquals(["{hash}" => null], $obj->getSubstituables());
    }
}
