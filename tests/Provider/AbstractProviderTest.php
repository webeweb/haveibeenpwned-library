<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Provider;

use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Provider\TestProvider;

/**
 * Abstract provider test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Provider
 */
class AbstractProviderTest extends AbstractTestCase {

    /**
     * Tests the setDebug() method.
     *
     * @return void
     */
    public function testSetDebug(): void {

        $obj = new TestProvider();

        $obj->setDebug(true);
        $this->assertTrue($obj->getDebug());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("https://haveibeenpwned.com/api", TestProvider::ENDPOINT_PATH);

        $obj = new TestProvider();

        $this->assertFalse($obj->getDebug());
    }
}
