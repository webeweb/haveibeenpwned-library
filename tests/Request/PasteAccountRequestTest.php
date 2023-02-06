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

use WBW\Library\HaveIBeenPwned\Api\ResponseInterface;
use WBW\Library\HaveIBeenPwned\Model\Paste;
use WBW\Library\HaveIBeenPwned\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Serializer\TestResponseDeserializer;
use WBW\Library\Provider\Api\SubstituableRequestInterface;

/**
 * Paste account request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 */
class PasteAccountRequestTest extends AbstractTestCase {

    /**
     * Tests deserializePastesResponse()
     *
     * @return void
     */
    public function testDeserializePastesResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/PastesRequestTest.testDeserializeResponse.json");

        $obj = new PasteAccountRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(PastesResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());

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
     * Tests getSubstituables()
     *
     * @return void
     */
    public function testGetSubstituables(): void {

        $obj = new PasteAccountRequest();

        $obj->setAccount("account");
        $this->assertEquals(["{account}" => "account"], $obj->getSubstituables());
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new PasteAccountRequest();

        $this->assertEquals([], $obj->serializeRequest());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/pasteaccount/{account}", PasteAccountRequest::PASTE_ACCOUNT_RESOURCE_PATH);

        $obj = new PasteAccountRequest();

        $this->assertNull($obj->getAccount());
        $this->assertEquals(PasteAccountRequest::PASTE_ACCOUNT_RESOURCE_PATH, $obj->getResourcePath());

        $this->assertInstanceOf(SubstituableRequestInterface::class, $obj);

        $this->assertEquals(["{account}" => null], $obj->getSubstituables());
    }
}
