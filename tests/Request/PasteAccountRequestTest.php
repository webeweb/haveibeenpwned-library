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

use WBW\Library\HaveIBeenPwned\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\Provider\API\SubstituableRequestInterface;

/**
 * Paste account request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 */
class PasteAccountRequestTest extends AbstractTestCase {

    /**
     * Tests the getSubstituables() method.
     *
     * @return void
     */
    public function testGetSubstituables(): void {

        $obj = new PasteAccountRequest();

        $obj->setAccount("account");
        $this->assertEquals(["{account}" => "account"], $obj->getSubstituables());
    }

    /**
     * Tests the __construct() method.
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
