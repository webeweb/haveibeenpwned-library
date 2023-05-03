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

use WBW\Library\HaveIBeenPwned\Request\AbstractRequest;
use WBW\Library\HaveIBeenPwned\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Breaches request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 */
class BreachesRequestTest extends AbstractTestCase {

    /**
     * Test deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        $obj = new BreachesRequest();

        $res = $obj->deserializeResponse("");
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Test serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new BreachesRequest();
        $obj->setDomain("domain");

        $res = $obj->serializeRequest();
        $this->assertIsArray($res);

        $this->assertEquals("domain", $res["domain"]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/breaches", BreachesRequest::BREACHES_RESOURCE_PATH);

        $obj = new BreachesRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);

        $this->assertNull($obj->getDomain());
        $this->assertEquals(BreachesRequest::BREACHES_RESOURCE_PATH, $obj->getResourcePath());
    }
}
