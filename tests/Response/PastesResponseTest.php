<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Response;

use WBW\Library\HaveIBeenPwned\Model\Paste;
use WBW\Library\HaveIBeenPwned\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Pastes response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Response
 */
class PastesResponseTest extends AbstractTestCase {

    /**
     * Tests the addPaste() method.
     *
     * @return void
     */
    public function testAddPaste(): void {

        // Set a Paste mock.
        $paste = new Paste();

        $obj = new PastesResponse();

        $this->assertCount(0, $obj->getPastes());

        $obj->addPaste($paste);
        $this->assertSame($paste, $obj->getPastes()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new PastesResponse();

        $this->assertCount(0, $obj->getPastes());
    }
}
