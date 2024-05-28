<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\HaveIBeenPwned\Tests\Response;

use WBW\Library\HaveIBeenPwned\Model\DataClass;
use WBW\Library\HaveIBeenPwned\Response\AbstractResponse;
use WBW\Library\HaveIBeenPwned\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Data classes response test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Response
 */
class DataClassesResponseTest extends AbstractTestCase {

    /**
     * Test addDataClass()
     *
     * @return void
     */
    public function testAddDataClass(): void {

        // Set a Data class mock.
        $dataClass = new DataClass();

        $obj = new DataClassesResponse();

        $this->assertCount(0, $obj->getDataClasses());

        $obj->addDataClass($dataClass);
        $this->assertSame($dataClass, $obj->getDataClasses()[0]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DataClassesResponse();

        $this->assertInstanceOf(AbstractResponse::class, $obj);

        $this->assertCount(0, $obj->getDataClasses());
    }
}
