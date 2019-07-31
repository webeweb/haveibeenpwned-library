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

use Exception;
use InvalidArgumentException;
use WBW\Library\HaveIBeenPwned\Exception\APIException;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Provider\APIv1Provider;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * API v1 provider test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Provider
 */
class APIv1ProviderTest extends AbstractTestCase {

    /**
     * {inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        $this->wait();
    }

    /**
     * Tests the breachedAccount() method.
     *
     * @return void
     */
    public function testBreachedAccount() {

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();
        $breachedAccountRequest->setAccount("john.doe@gmail.com");

        $obj = new APIv1Provider();

        try {

            // This unit test failed on Travis-CI.
            $res = $obj->breachedAccount($breachedAccountRequest);
            $this->assertInstanceOf(BreachesResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(APIException::class, $ex);
        }
    }

    /**
     * Tests the breachedAccount() method.
     *
     * @return void
     */
    public function testBreachedAccountWithInvalidArgumentException() {

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();

        $obj = new APIv1Provider();

        try {

            $obj->breachedAccount($breachedAccountRequest);
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The substitute value {account} is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the getEndpointVersion() method.
     *
     * @return void
     */
    public function testGetEndpointVersion() {

        $obj = new APIv1Provider();

        $this->assertEquals("", $obj->getEndpointVersion());
    }
}
