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
use WBW\Library\HaveIBeenPwned\Exception\APIException;
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
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * API v2 provider test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Provider
 */
class APIv2ProviderTest extends AbstractTestCase {

    /**
     * {inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        $this->wait();
    }

    /**
     * Tests the breach() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testBreach() {

        // Set a Breach request mock.
        $breachRequest = new BreachRequest();
        $breachRequest->setName("Adobe");

        $obj = new APIv2Provider();

        $res = $obj->breach($breachRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
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
        $breachedAccountRequest->setDomain("adobe.com");

        $obj = new APIv2Provider();

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
    public function testBreachedAccountWith404() {

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();
        $breachedAccountRequest->setAccount("webeweb@github.com");
        $breachedAccountRequest->setDomain("adobe.com");

        $obj = new APIv2Provider();

        try {

            // This unit test failed on Travis-CI.
            $res = $obj->breachedAccount($breachedAccountRequest);
            $this->assertInstanceOf(BreachesResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(APIException::class, $ex);
        }
    }

    /**
     * Tests the breaches() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testBreaches() {

        // Set a Breaches request mock.
        $breachesRequest = new BreachesRequest();
        $breachesRequest->setDomain("adobe.com");

        $obj = new APIv2Provider();

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

        // Set a Data classes request mock.
        $dataClassesRequest = new DataClassesRequest();

        $obj = new APIv2Provider();

        $res = $obj->dataClasses($dataClassesRequest);
        $this->assertInstanceOf(DataClassesResponse::class, $res);
    }

    /**
     * Tests the getEndpointVersion() method.
     *
     * @return void
     */
    public function testGetEndpointVersion() {

        $obj = new APIv2Provider();

        $this->assertEquals("/v2", $obj->getEndpointVersion());
    }

    /**
     * Tests the pasteAccount() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testPasteAccount() {

        // Set a Paste account request mock.
        $pasteAccountRequest = new PasteAccountRequest();
        $pasteAccountRequest->setAccount("john.doe@gmail.com");

        $obj = new APIv2Provider();

        try {

            $res = $obj->pasteAccount($pasteAccountRequest);
            $this->assertInstanceOf(PastesResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(APIException::class, $ex);
            $this->assertEquals(401, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the range() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testRange() {

        // Set a Range request mock.
        $rangeRequest = new RangeRequest();
        $rangeRequest->setHash("21BD1");

        $obj = new APIv2Provider();

        $res = $obj->range($rangeRequest);
        $this->assertInstanceOf(RangesResponse::class, $res);
    }
}
