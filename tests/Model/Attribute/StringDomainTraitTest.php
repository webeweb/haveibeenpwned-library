<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Model\Attribute;

use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Model\Attribute\TestStringDomainTrait;

/**
 * String domain trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model\Attribute
 */
class StringDomainTraitTest extends AbstractTestCase {

    /**
     * Tests the setDomain() method.
     *
     * @return void
     */
    public function testSetDomain(): void {

        $obj = new TestStringDomainTrait();

        $obj->setDomain("domain");
        $this->assertEquals("domain", $obj->getDomain());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestStringDomainTrait();

        $this->assertNull($obj->getDomain());
    }
}
