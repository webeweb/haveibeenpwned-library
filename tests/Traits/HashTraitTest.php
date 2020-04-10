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
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Traits\TestHashTrait;

/**
 * Hash trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Traits
 */
class HashTraitTest extends AbstractTestCase {

    /**
     * Tests the setHash() method.
     *
     * @return void
     */
    public function testSetHash() {

        $obj = new TestHashTrait();

        $obj->setHash("hash");
        $this->assertEquals("hash", $obj->getHash());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestHashTrait();

        $this->assertNull($obj->getHash());
    }
}
