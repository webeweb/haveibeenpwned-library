<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\HaveIBeenPwned\Tests\Model;

use WBW\Library\HaveIBeenPwned\Model\Paste;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Paste test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package  WBW\Library\HaveIBeenPwned\Tests\Model
 */
class PasteTest extends AbstractTestCase {

    /**
     * Test setEmailCount()
     *
     * @return void
     */
    public function testSetEmailCount(): void {

        $obj = new Paste();

        $obj->setEmailCount(1);
        $this->assertEquals(1, $obj->getEmailCount());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Paste();

        $this->assertNull($obj->getDate());
        $this->assertEquals(0, $obj->getEmailCount());
        $this->assertNull($obj->getId());
        $this->assertNull($obj->getSource());
        $this->assertNull($obj->getTitle());
    }
}
