<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Request;

use WBW\Library\HaveIBeenPwned\Request\HaveIBeenPwnedRequestBreach;
use WBW\Library\HaveIBeenPwned\Response\HaveIBeenPwnedResponseBreach;
use WBW\Library\HaveIBeenPwned\Tests\AbstractFrameworkTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\TestFixtures;

/**
 * HaveIBeenPwned request "Breach test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 */
class HaveIBeenPwnedRequestBreachTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new HaveIBeenPwnedRequestBreach();

        $this->assertNull($obj->getDomain());
        $this->assertEquals("/breaches", $obj->getResourcePath());
    }

    /**
     * Tests the parse response.
     *
     * @return void
     */
    public function testParseResponse() {

        $obj = new HaveIBeenPwnedRequestBreach();

        $res = $obj->parseResponse(TestFixtures::SAMPLE_BREACH_RESPONSE);
        $this->assertInstanceOf(HaveIBeenPwnedResponseBreach::class, $res);
        $this->assertCount(2, $res->getBreaches());
    }

    /**
     * Tests the setDomain() method.
     *
     * @return void
     */
    public function testSetDomain() {

        $obj = new HaveIBeenPwnedRequestBreach();

        $obj->setDomain("domain");
        $this->assertEquals("domain", $obj->getDomain());
    }

    /**
     * Tests the toARray() method.
     *
     * @return void
     */
    public function testToArray() {

        $obj = new HaveIBeenPwnedRequestBreach();

        // ===
        $res0 = [];
        $this->assertEquals($res0, $obj->toArray());

        // ===
        $obj->setDomain("domain");
        $res9 = ["domain" => "domain"];
        $this->assertEquals($res9, $obj->toArray());
    }

}
