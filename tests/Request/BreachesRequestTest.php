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
use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Serializer\TestResponseDeserializer;

/**
 * Breaches request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 */
class BreachesRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeBreachesResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/BreachesRequestTest.testDeserializeResponse.json");

        $obj = new BreachesRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(BreachesResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());

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
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new BreachesRequest();
        $obj->setDomain("domain");

        $res = $obj->serializeRequest();
        $this->assertCount(1, $res);

        $this->assertEquals("domain", $res["domain"]);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/breaches", BreachesRequest::BREACHES_RESOURCE_PATH);

        $obj = new BreachesRequest();

        $this->assertNull($obj->getDomain());
        $this->assertEquals(BreachesRequest::BREACHES_RESOURCE_PATH, $obj->getResourcePath());
    }
}
