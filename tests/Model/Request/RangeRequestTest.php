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
use WBW\Library\HaveIBeenPwned\Model\Request\RangeRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Paste account request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model\Request
 */
class RangeRequestTest extends AbstractTestCase {

    /**
     * Tests the getSubstituteValue() method.
     *
     * @return void
     */
    public function testGetSubstituteValue(): void {

        $obj = new RangeRequest();

        $obj->setHash("hash");
        $this->assertEquals("hash", $obj->getSubstituteValue());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/range/{hash}", RangeRequest::RANGE_RESOURCE_PATH);

        $obj = new RangeRequest();

        $this->assertNull($obj->getHash());
        $this->assertEquals(RangeRequest::RANGE_RESOURCE_PATH, $obj->getResourcePath());

        $this->assertInstanceOf(SubstituteRequestInterface::class, $obj);
        $this->assertEquals("{hash}", $obj->getSubstituteName());
        $this->assertNull($obj->getSubstituteValue());
    }
}
