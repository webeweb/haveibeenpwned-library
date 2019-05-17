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
use WBW\Library\HaveIBeenPwned\API\RequestInterface;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\DataClassesRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\RangeRequest;
use WBW\Library\HaveIBeenPwned\Model\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\RangesResponse;
use WBW\Library\HaveIBeenPwned\Provider\APIProviderV2;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * API provider v2 test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Provider
 */
class APIProviderV2Test extends AbstractTestCase {

    /**
     * Pause...
     *
     * @return void
     */
    protected function pause() {
        sleep(intval(RequestInterface::RATE_LIMITING * 4 / 1000));
    }

    /**
     * Tests the breach() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testBreach() {

        // Rate limiting.
        $this->pause();

        // Set a Breach request mock.
        $breachRequest = new BreachRequest();
        $breachRequest->setName("Adobe");

        $obj = new APIProviderV2();

        $res = $obj->breach($breachRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Tests the breachedAccount() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testBreachedAccount() {

        // Rate limiting.
        $this->pause();

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();
        $breachedAccountRequest->setAccount("john.doe@gmail.com");
        $breachedAccountRequest->setDomain("adobe.com");

        $obj = new APIProviderV2();

        $res = $obj->breachedAccount($breachedAccountRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Tests the breachedAccount() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testBreachedAccountWith404() {

        // Rate limiting.
        $this->pause();

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();
        $breachedAccountRequest->setAccount("webeweb@github.com");
        $breachedAccountRequest->setDomain("adobe.com");

        $obj = new APIProviderV2();

        $res = $obj->breachedAccount($breachedAccountRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Tests the breaches() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testBreaches() {

        // Rate limiting.
        $this->pause();

        // Set a Breaches request mock.
        $breachesRequest = new BreachesRequest();
        $breachesRequest->setDomain("adobe.com");

        $obj = new APIProviderV2();

        $res = $obj->breaches($breachesRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Tests the dataClasses() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testDataClasses() {

        // Rate limiting.
        $this->pause();

        // Set a Data classes request mock.
        $dataClassesRequest = new DataClassesRequest();

        $obj = new APIProviderV2();

        $res = $obj->dataClasses($dataClassesRequest);
        $this->assertInstanceOf(DataClassesResponse::class, $res);
    }

    /**
     * Tests the getEndpointVersion() method.
     *
     * @return void
     */
    public function testGetEndpointVersion() {

        $obj = new APIProviderV2();

        $this->assertEquals("/v2", $obj->getEndpointVersion());
    }

    /**
     * Tests the pasteAccount() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testPasteAccount() {

        // Rate limiting.
        $this->pause();

        // Set a Paste account request mock.
        $pasteAccountRequest = new PasteAccountRequest();
        $pasteAccountRequest->setAccount("john.doe@gmail.com");

        $obj = new APIProviderV2();

        $res = $obj->pasteAccount($pasteAccountRequest);
        $this->assertInstanceOf(PastesResponse::class, $res);
    }

    /**
     * Tests the range() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testRange() {

        // Rate limiting.
        $this->pause();

        // Set a Range request mock.
        $rangeRequest = new RangeRequest();
        $rangeRequest->setHash("21BD1");

        $obj = new APIProviderV2();

        $res = $obj->range($rangeRequest);
        $this->assertInstanceOf(RangesResponse::class, $res);
    }
}
