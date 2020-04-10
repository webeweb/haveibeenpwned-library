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
use WBW\Library\HaveIBeenPwned\Model\Request\BreachRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Breach request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model\Request
 */
class BreachRequestTest extends AbstractTestCase {

    /**
     * Tests the getSubstituteValue() method.
     *
     * @return void
     */
    public function testGetSubstituteValue() {

        $obj = new BreachRequest();

        $obj->setName("name");
        $this->assertEquals("name", $obj->getSubstituteValue());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("/breach/{name}", BreachRequest::BREACH_RESOURCE_PATH);

        $obj = new BreachRequest();

        $this->assertNull($obj->getName());
        $this->assertEquals(BreachRequest::BREACH_RESOURCE_PATH, $obj->getResourcePath());

        $this->assertInstanceOf(SubstituteRequestInterface::class, $obj);
        $this->assertEquals("{name}", $obj->getSubstituteName());
        $this->assertNull($obj->getSubstituteValue());
    }
}
