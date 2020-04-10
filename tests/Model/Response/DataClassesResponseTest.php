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

use WBW\Library\HaveIBeenPwned\Model\DataClass;
use WBW\Library\HaveIBeenPwned\Model\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Data classes response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model\Response
 */
class DataClassesResponseTest extends AbstractTestCase {

    /**
     * Tests the addDataClass() method.
     *
     * @return void
     */
    public function testAddDataClass() {

        // Set a Data class mock.
        $dataClass = new DataClass();

        $obj = new DataClassesResponse();

        $this->assertCount(0, $obj->getDataClasses());

        $obj->addDataClass($dataClass);
        $this->assertSame($dataClass, $obj->getDataClasses()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new DataClassesResponse();

        $this->assertCount(0, $obj->getDataClasses());
    }
}
