<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\HaveIBeenPwned\Tests\Request;

use WBW\Library\Common\Provider\SubstituableRequestInterface;
use WBW\Library\HaveIBeenPwned\Request\AbstractRequest;
use WBW\Library\HaveIBeenPwned\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Paste account request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 */
class PasteAccountRequestTest extends AbstractTestCase {

    /**
     * Test deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        $obj = new PasteAccountRequest();

        $res = $obj->deserializeResponse("");
        $this->assertInstanceOf(PastesResponse::class, $res);
    }

    /**
     * Test getSubstituables()
     *
     * @return void
     */
    public function testGetSubstituables(): void {

        $obj = new PasteAccountRequest();

        $obj->setAccount("account");
        $this->assertEquals(["{account}" => "account"], $obj->getSubstituables());
    }

    /**
     * Test serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new PasteAccountRequest();

        $this->assertEquals([], $obj->serializeRequest());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/pasteaccount/{account}", PasteAccountRequest::PASTE_ACCOUNT_RESOURCE_PATH);

        $obj = new PasteAccountRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);

        $this->assertNull($obj->getAccount());
        $this->assertEquals(PasteAccountRequest::PASTE_ACCOUNT_RESOURCE_PATH, $obj->getResourcePath());

        $this->assertInstanceOf(SubstituableRequestInterface::class, $obj);

        $this->assertEquals(["{account}" => null], $obj->getSubstituables());
    }
}
