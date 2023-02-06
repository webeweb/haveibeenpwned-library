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

use WBW\Library\HaveIBeenPwned\Request\BreachRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\Provider\Api\SubstituableRequestInterface;

/**
 * Breach request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 */
class BreachRequestTest extends AbstractTestCase {

    /**
     * Tests getSubstituables()
     *
     * @return void
     */
    public function testGetSubstituables(): void {

        $obj = new BreachRequest();

        $obj->setName("name");
        $this->assertEquals(["{name}" => "name"], $obj->getSubstituables());
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new BreachRequest();

        $this->assertEquals([], $obj->serializeRequest());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/breach/{name}", BreachRequest::BREACH_RESOURCE_PATH);

        $obj = new BreachRequest();

        $this->assertNull($obj->getName());
        $this->assertEquals(BreachRequest::BREACH_RESOURCE_PATH, $obj->getResourcePath());

        $this->assertInstanceOf(SubstituableRequestInterface::class, $obj);

        $this->assertEquals(["{name}" => null], $obj->getSubstituables());
    }
}
