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

use Throwable;
use WBW\Library\HaveIBeenPwned\Provider\APIv3Provider;
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
use WBW\Library\Provider\Exception\ApiException;

/**
 * API v3 provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Provider
 */
class APIv3ProviderTest extends AbstractTestCase {

    /**
     * API key.
     *
     * @var string
     */
    private $apiKey;

    /**
     * {inheritdoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set an API key mock.
        $this->apiKey = static::getToken();

        $this->wait();
    }

    /**
     * Tests breach()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testBreach(): void {

        // Set a Breach request mock.
        $breachRequest = new BreachRequest();
        $breachRequest->setName("Adobe");

        $obj = new APIv3Provider();

        $res = $obj->breach($breachRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Tests breachedAccount()
     *
     * @return void
     */
    public function testBreachedAccount(): void {

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();
        $breachedAccountRequest->setAccount("john.doe@gmail.com");
        $breachedAccountRequest->setDomain("adobe.com");

        $obj = new APIv3Provider($this->apiKey);

        try {

            // This unit test failed without a valid API key.
            $res = $obj->breachedAccount($breachedAccountRequest);
            $this->assertInstanceOf(BreachesResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
        }
    }

    /**
     * Tests breachedAccount()
     *
     * @return void
     */
    public function testBreachedAccountWith404(): void {

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();
        $breachedAccountRequest->setAccount("webeweb@github.com");
        $breachedAccountRequest->setDomain("adobe.com");

        $obj = new APIv3Provider($this->apiKey);

        try {

            // This unit test failed without a valid API key.
            $res = $obj->breachedAccount($breachedAccountRequest);
            $this->assertInstanceOf(BreachesResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
        }
    }

    /**
     * Tests breaches()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testBreaches(): void {

        // Set a Breaches request mock.
        $breachesRequest = new BreachesRequest();
        $breachesRequest->setDomain("adobe.com");

        $obj = new APIv3Provider();

        $res = $obj->breaches($breachesRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Tests dataClasses()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testDataClasses(): void {

        // Set a Data classes request mock.
        $dataClassesRequest = new DataClassesRequest();

        $obj = new APIv3Provider();

        $res = $obj->dataClasses($dataClassesRequest);
        $this->assertInstanceOf(DataClassesResponse::class, $res);
    }

    /**
     * Tests pasteAccount()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testPasteAccount(): void {

        // Set a Paste account request mock.
        $pasteAccountRequest = new PasteAccountRequest();
        $pasteAccountRequest->setAccount("john.doe@gmail.com");

        $obj = new APIv3Provider($this->apiKey);

        try {

            // This unit test failed without a valid API key.
            $res = $obj->pasteAccount($pasteAccountRequest);
            $this->assertInstanceOf(PastesResponse::class, $res);
        } catch (ApiException $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
        }
    }

    /**
     * Tests range()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testRange(): void {

        // Set a Range request mock.
        $rangeRequest = new RangeRequest();
        $rangeRequest->setHash("21BD1");

        $obj = new APIv3Provider();

        $res = $obj->range($rangeRequest);
        $this->assertInstanceOf(RangesResponse::class, $res);
    }

    /**
     * Tests setApiKey()
     *
     * @return void
     */
    public function testSetApiKey(): void {

        $obj = new APIv3Provider($this->apiKey);

        $this->assertEquals($this->apiKey, $obj->getApiKey());

        $obj->setApiKey("API KEY");
        $this->assertEquals("API KEY", $obj->getApiKey());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new APIv3Provider();

        $this->assertEquals("/v3", $obj->getEndpointVersion());
        $this->assertNull($obj->getApiKey());
    }
}
