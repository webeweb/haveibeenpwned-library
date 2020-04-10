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

use WBW\Library\HaveIBeenPwned\Model\Request\DataClassesRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Data classes request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model\Request
 */
class DataClassesRequestTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("/dataclasses", DataClassesRequest::DATA_CLASSES_RESOURCE_PATH);

        $obj = new DataClassesRequest();

        $this->assertEquals(DataClassesRequest::DATA_CLASSES_RESOURCE_PATH, $obj->getResourcePath());
    }
}
