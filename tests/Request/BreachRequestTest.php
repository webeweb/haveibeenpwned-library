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

use WBW\Library\HaveIBeenPwned\API\SubstituteRequestInterface;
use WBW\Library\HaveIBeenPwned\Request\BreachRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Breach request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Request
 */
class BreachRequestTest extends AbstractTestCase {

    /**
     * Tests the getSubstituteValue() method.
     *
     * @return void
     */
    public function testGetSubstituteValue(): void {

        $obj = new BreachRequest();

        $obj->setName("name");
        $this->assertEquals("name", $obj->getSubstituteValue());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/breach/{name}", BreachRequest::BREACH_RESOURCE_PATH);

        $obj = new BreachRequest();

        $this->assertNull($obj->getName());
        $this->assertEquals(BreachRequest::BREACH_RESOURCE_PATH, $obj->getResourcePath());

        $this->assertInstanceOf(SubstituteRequestInterface::class, $obj);
        $this->assertEquals("{name}", $obj->getSubstituteName());
        $this->assertNull($obj->getSubstituteValue());
    }
}
