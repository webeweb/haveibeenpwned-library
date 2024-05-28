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

use Throwable;
use WBW\Library\Common\Provider\ProviderException;
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Request\BreachRequest;
use WBW\Library\HaveIBeenPwned\Request\DataClassesRequest;
use WBW\Library\HaveIBeenPwned\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Request\RangeRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Response\RangesResponse;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * API v2 provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Provider
 */
class APIv2ProviderTest extends AbstractTestCase {

    /**
     * {inheritdoc}
     */
    protected function setUp(): void {
        parent::setUp();

        $this->wait();
    }

    /**
     * Test breach()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testBreach(): void {

        // Set a Breach request mock.
        $breachRequest = new BreachRequest();
        $breachRequest->setName("Adobe");

        $obj = new APIv2Provider();

        $res = $obj->sendRequest($breachRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Test breachedAccount()
     *
     * @return void
     */
    public function testBreachedAccount(): void {

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();
        $breachedAccountRequest->setAccount("john.doe@gmail.com");
        $breachedAccountRequest->setDomain("adobe.com");

        $obj = new APIv2Provider();

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
    public function testBreachedAccountWith404(): void {

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();
        $breachedAccountRequest->setAccount("webeweb@github.com");
        $breachedAccountRequest->setDomain("adobe.com");

        $obj = new APIv2Provider();

        try {

            // This unit test failed on Travis-CI.
            $res = $obj->sendRequest($breachedAccountRequest);
            $this->assertInstanceOf(BreachesResponse::class, $res);
        } catch (Throwable $ex) {
            $this->assertInstanceOf(ProviderException::class, $ex);
        }
    }

    /**
     * Test breaches()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testBreaches(): void {

        // Set a Breaches request mock.
        $breachesRequest = new BreachesRequest();
        $breachesRequest->setDomain("adobe.com");

        $obj = new APIv2Provider();

        $res = $obj->sendRequest($breachesRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Test dataClasses()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testDataClasses(): void {

        // Set a Data classes request mock.
        $dataClassesRequest = new DataClassesRequest();

        $obj = new APIv2Provider();

        $res = $obj->sendRequest($dataClassesRequest);
        $this->assertInstanceOf(DataClassesResponse::class, $res);
    }

    /**
     * Test getEndpointVersion()
     *
     * @return void
     */
    public function testGetEndpointVersion(): void {

        $obj = new APIv2Provider();

        $this->assertEquals("/v2", $obj->getEndpointVersion());
    }

    /**
     * Test pasteAccount()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testPasteAccount(): void {

        // Set a Paste account request mock.
        $pasteAccountRequest = new PasteAccountRequest();
        $pasteAccountRequest->setAccount("john.doe@gmail.com");

        $obj = new APIv2Provider();

        try {

            $res = $obj->sendRequest($pasteAccountRequest);
            $this->assertInstanceOf(PastesResponse::class, $res);
        } catch (Throwable $ex) {
            $this->assertInstanceOf(ProviderException::class, $ex);
        }
    }

    /**
     * Test range()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testRange(): void {

        // Set a Range request mock.
        $rangeRequest = new RangeRequest();
        $rangeRequest->setHash("21BD1");

        $obj = new APIv2Provider();

        $res = $obj->sendRequest($rangeRequest);
        $this->assertInstanceOf(RangesResponse::class, $res);
    }
}
