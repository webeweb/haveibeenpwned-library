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

use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Breaches response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Response
 */
class BreachesResponseTest extends AbstractTestCase {

    /**
     * Tests addBreach()
     *
     * @return void
     */
    public function testAddBreach(): void {

        // Set a Breach mock.
        $breach = new Breach();

        $obj = new BreachesResponse();

        $this->assertCount(0, $obj->getBreaches());

        $obj->addBreach($breach);
        $this->assertSame($breach, $obj->getBreaches()[0]);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new BreachesResponse();

        $this->assertCount(0, $obj->getBreaches());
    }
}
