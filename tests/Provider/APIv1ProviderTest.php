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

namespace WBW\Library\HaveIBeenPwned\Tests\Provider;

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Throwable;
use WBW\Library\Common\Provider\ProviderException;
use WBW\Library\HaveIBeenPwned\Provider\APIv1Provider;
use WBW\Library\HaveIBeenPwned\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * API v1 provider test.
 *
 * @author webeweb <https://github.com/webeweb>
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
     * Test breachedAccount()
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
            $res = $obj->sendRequest($breachedAccountRequest);
            $this->assertInstanceOf(BreachesResponse::class, $res);
        } catch (Throwable $ex) {
            $this->assertInstanceOf(ProviderException::class, $ex);
        }
    }

    /**
     * Test breachedAccount()
     *
     * @return void
     */
    public function testBreachedAccountWithInvalidArgumentException(): void {

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();

        $obj = new APIv1Provider();

        try {
            $obj->sendRequest($breachedAccountRequest);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The substituable value "{account}" is missing', $ex->getMessage());
        }
    }

    /**
     * Test getEndpointVersion()
     *
     * @return void
     */
    public function testGetEndpointVersion(): void {

        $obj = new APIv1Provider();

        $this->assertEquals("", $obj->getEndpointVersion());
    }
}
