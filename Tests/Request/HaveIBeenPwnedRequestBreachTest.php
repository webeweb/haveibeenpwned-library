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

use PHPUnit_Framework_TestCase;
use WBW\Library\HaveIBeenPwned\Request\HaveIBeenPwnedRequestBreach;

/**
 * HaveIBeenPwned request "Breach test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 * @final
 */
final class HaveIBeenPwnedRequestBreachTest extends PHPUnit_Framework_TestCase {

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

        $res0 = [];
        $this->assertEquals($res0, $obj->toArray());


        $obj->setDomain("domain");
        $res9 = ["domain" => "domain"];
        $this->assertEquals($res9, $obj->toArray());
    }

}
