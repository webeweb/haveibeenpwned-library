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

use WBW\Library\HaveIBeenPwned\Model\DataClass;
use WBW\Library\HaveIBeenPwned\Request\DataClassesRequest;
use WBW\Library\HaveIBeenPwned\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Serializer\TestResponseDeserializer;

/**
 * Data classes request.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 */
class DataClassesRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeDataClassesResponse()
     *
     * @return void
     */
    public function testDeserializeDataClassesResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/DataClassesRequestTest.testDeserializeResponse.json");

        $obj = new DataClassesRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(DataClassesResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());

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
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new DataClassesRequest();

        $this->assertEquals([], $obj->serializeRequest());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/dataclasses", DataClassesRequest::DATA_CLASSES_RESOURCE_PATH);

        $obj = new DataClassesRequest();

        $this->assertEquals(DataClassesRequest::DATA_CLASSES_RESOURCE_PATH, $obj->getResourcePath());
    }
}
