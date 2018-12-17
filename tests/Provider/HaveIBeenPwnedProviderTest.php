<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Provider;

use WBW\Library\HaveIBeenPwned\Provider\HaveIBeenPwnedProvider;
use WBW\Library\HaveIBeenPwned\Request\HaveIBeenPwnedRequestBreach;
use WBW\Library\HaveIBeenPwned\Tests\AbstractFrameworkTestCase;

/**
 * HaveIBeenPwned provider test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Provider
 */
class HaveIBeenPwnedProviderTest extends AbstractFrameworkTestCase {

    /**
     * Request.
     *
     * @var HaveIBeenPwendRequestInterface
     */
    private $request;

    /**
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a Request mock.
        $this->request = new HaveIBeenPwnedRequestBreach();
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConctruct() {

        $obj = new HaveIBeenPwnedProvider($this->request);

        $this->assertEquals(false, $obj->getDebug());
        $this->assertSame($this->request, $obj->getRequest());
    }

}
