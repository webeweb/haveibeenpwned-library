<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Model\Response;

use WBW\Library\HaveIBeenPwned\Model\Range;
use WBW\Library\HaveIBeenPwned\Model\Response\RangesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Ranges response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model\Response
 */
class RangesResponseTest extends AbstractTestCase {

    /**
     * Tests the addRange() method.
     *
     * @return void
     */
    public function testAddRange() {

        // Set a Range mock.
        $range = new Range();

        $obj = new RangesResponse();

        $this->assertCount(0, $obj->getRanges());

        $obj->addRange($range);
        $this->assertSame($range, $obj->getRanges()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new RangesResponse();

        $this->assertCount(0, $obj->getRanges());
    }
}
