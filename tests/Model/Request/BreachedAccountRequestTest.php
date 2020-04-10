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
use WBW\Library\HaveIBeenPwned\Model\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Breached account request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model\Request
 */
class BreachedAccountRequestTest extends AbstractTestCase {

    /**
     * Tests the getSubstituteValue() method.
     *
     * @return void
     */
    public function testGetSubstituteValue() {

        $obj = new BreachedAccountRequest();

        $obj->setAccount("account");
        $this->assertEquals("account", $obj->getSubstituteValue());
    }

    /**
     * Tests the setIncludeUnverified() method.
     *
     * @return void
     */
    public function testSetIncludeUnverified() {

        $obj = new BreachedAccountRequest();

        $obj->setIncludeUnverified(true);
        $this->assertTrue($obj->getIncludeUnverified());
    }

    /**
     * Tests the setTruncateResponse() method.
     *
     * @return void
     */
    public function testSetTruncateResponse() {

        $obj = new BreachedAccountRequest();

        $obj->setTruncateResponse(true);
        $this->assertTrue($obj->getTruncateResponse());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("/breachedaccount/{account}", BreachedAccountRequest::BREACHED_ACCOUNT_RESOURCE_PATH);

        $obj = new BreachedAccountRequest();

        $this->assertNull($obj->getAccount());
        $this->assertNull($obj->getDomain());
        $this->assertNull($obj->getIncludeUnverified());
        $this->assertEquals(BreachedAccountRequest::BREACHED_ACCOUNT_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertNull($obj->getTruncateResponse());

        $this->assertInstanceOf(SubstituteRequestInterface::class, $obj);
        $this->assertEquals("{account}", $obj->getSubstituteName());
        $this->assertNull($obj->getSubstituteValue());
    }
}
