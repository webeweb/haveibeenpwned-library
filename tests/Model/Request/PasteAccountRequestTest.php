<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Model\Request;

use WBW\Library\HaveIBeenPwned\API\SubstituteRequestInterface;
use WBW\Library\HaveIBeenPwned\Model\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Paste account request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model\Request
 */
class PasteAccountRequestTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("/pasteaccount/{account}", PasteAccountRequest::PASTE_ACCOUNT_RESOURCE_PATH);

        $obj = new PasteAccountRequest();

        $this->assertNull($obj->getAccount());
        $this->assertEquals(PasteAccountRequest::PASTE_ACCOUNT_RESOURCE_PATH, $obj->getResourcePath());

        $this->assertInstanceOf(SubstituteRequestInterface::class, $obj);
        $this->assertEquals("{account}", $obj->getSubstituteName());
        $this->assertNull($obj->getSubstituteValue());
    }

    /**
     * Tests the getSubstituteValue() method.
     *
     * @return void
     */
    public function testGetSubstituteValue() {

        $obj = new PasteAccountRequest();

        $obj->setAccount("account");
        $this->assertEquals("account", $obj->getSubstituteValue());
    }
}
