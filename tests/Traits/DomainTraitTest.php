<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Traits;

use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Traits\TestDomainTrait;

/**
 * Domain trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Traits
 */
class DomainTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestDomainTrait();

        $this->assertNull($obj->getDomain());
    }

    /**
     * Tests the setDomain() method.
     *
     * @return void
     */
    public function testSetDomain() {

        $obj = new TestDomainTrait();

        $obj->setDomain("domain");
        $this->assertEquals("domain", $obj->getDomain());
    }
}
