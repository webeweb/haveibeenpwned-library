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
use Psr\Log\LoggerInterface;
use WBW\Library\HaveIBeenPwned\Provider\APIv1Provider;
use WBW\Library\HaveIBeenPwned\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\Provider\Exception\ApiException;

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
    protected function setUp(): void {
        parent::setUp();

        $this->wait();
    }

    /**
     * Tests the breachedAccount() method.
     *
     * @return void
     */
    public function testBreachedAccount(): void {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();
        $breachedAccountRequest->setAccount("john.doe@gmail.com");

        $obj = new APIv1Provider($logger);

        try {

            // This unit test failed on Travis-CI.
            $res = $obj->breachedAccount($breachedAccountRequest);
            $this->assertInstanceOf(BreachesResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
        }
    }

    /**
     * Tests the breachedAccount() method.
     *
     * @return void
     */
    public function testBreachedAccountWithInvalidArgumentException(): void {

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();

        $obj = new APIv1Provider();

        try {

            $obj->breachedAccount($breachedAccountRequest);
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The substituable value "{account}" is missing', $ex->getMessage());
        }
    }

    /**
     * Tests the getEndpointVersion() method.
     *
     * @return void
     */
    public function testGetEndpointVersion(): void {

        $obj = new APIv1Provider();

        $this->assertEquals("", $obj->getEndpointVersion());
    }
}
