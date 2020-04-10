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

use WBW\Library\HaveIBeenPwned\Model\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Breaches request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model\Request
 */
class BreachesRequestTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("/breaches", BreachesRequest::BREACHES_RESOURCE_PATH);

        $obj = new BreachesRequest();

        $this->assertNull($obj->getDomain());
        $this->assertEquals(BreachesRequest::BREACHES_RESOURCE_PATH, $obj->getResourcePath());
    }
}
