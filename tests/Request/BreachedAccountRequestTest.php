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

use WBW\Library\HaveIBeenPwned\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\Provider\API\SubstituableRequestInterface;

/**
 * Breached account request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 */
class BreachedAccountRequestTest extends AbstractTestCase {

    /**
     * Tests the getSubstituables() method.
     *
     * @return void
     */
    public function testGetSubstituables(): void {

        $obj = new BreachedAccountRequest();

        $obj->setAccount("account");
        $this->assertEquals(["{account}" => "account"], $obj->getSubstituables());
    }

    /**
     * Tests the setIncludeUnverified() method.
     *
     * @return void
     */
    public function testSetIncludeUnverified(): void {

        $obj = new BreachedAccountRequest();

        $obj->setIncludeUnverified(true);
        $this->assertTrue($obj->getIncludeUnverified());
    }

    /**
     * Tests the setTruncateResponse() method.
     *
     * @return void
     */
    public function testSetTruncateResponse(): void {

        $obj = new BreachedAccountRequest();

        $obj->setTruncateResponse(true);
        $this->assertTrue($obj->getTruncateResponse());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/breachedaccount/{account}", BreachedAccountRequest::BREACHED_ACCOUNT_RESOURCE_PATH);

        $obj = new BreachedAccountRequest();

        $this->assertNull($obj->getAccount());
        $this->assertNull($obj->getDomain());
        $this->assertNull($obj->getIncludeUnverified());
        $this->assertEquals(BreachedAccountRequest::BREACHED_ACCOUNT_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertNull($obj->getTruncateResponse());

        $this->assertInstanceOf(SubstituableRequestInterface::class, $obj);

        $this->assertEquals(["{account}" => null], $obj->getSubstituables());
    }
}
