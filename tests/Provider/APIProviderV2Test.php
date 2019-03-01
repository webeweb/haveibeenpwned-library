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
     * Tests the breachRequest() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testBreachRequest() {

        // Rate limiting.
        sleep(intval(RequestInterface::RATE_LIMITING * 4 / 1000));

        // Set a Breach request mock.
        $breachRequest = new BreachRequest();

        $obj = new APIProviderV2();

        $res = $obj->breachRequest($breachRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Tests the breachedAccountRequest() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testBreachedAccountRequest() {

        // Rate limiting.
        sleep(intval(RequestInterface::RATE_LIMITING * 4 / 1000));

        // Set a Breached account request mock.
        $breachedAccountRequest = new BreachedAccountRequest();
        $breachedAccountRequest->setAccount("webeweb@gtihub.com");
        $breachedAccountRequest->setDomain("github.com");

        $obj = new APIProviderV2();

        $res = $obj->breachedAccountRequest($breachedAccountRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Tests the breachesRequest() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testBreachesRequest() {

        // Rate limiting.
        sleep(intval(RequestInterface::RATE_LIMITING * 4 / 1000));

        // Set a Breaches request mock.
        $breachesRequest = new BreachesRequest();

        $obj = new APIProviderV2();

        $res = $obj->breachesRequest($breachesRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Tests the dataClassesRequest() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testDataClassesRequest() {

        // Rate limiting.
        sleep(intval(RequestInterface::RATE_LIMITING * 4 / 1000));

        // Set a Data classes request mock.
        $dataClassesRequest = new DataClassesRequest();

        $obj = new APIProviderV2();

        $res = $obj->dataClassesRequest($dataClassesRequest);
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
     * Tests the pasteAccountRequest() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testPasteAccountRequest() {

        // Rate limiting.
        sleep(intval(RequestInterface::RATE_LIMITING * 4 / 1000));

        // Set a Paste account request mock.
        $pasteAccountRequest = new PasteAccountRequest();
        $pasteAccountRequest->setAccount("webeweb@gtihub.com");

        $obj = new APIProviderV2();

        $res = $obj->pasteAccountRequest($pasteAccountRequest);
        $this->assertInstanceOf(PastesResponse::class, $res);
    }

    /**
     * Tests the rangeRequest() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testRangeRequest() {

        // Rate limiting.
        sleep(intval(RequestInterface::RATE_LIMITING * 4 / 1000));

        // Set a Range request mock.
        $rangeRequest = new RangeRequest();

        $obj = new APIProviderV2();

        $res = $obj->rangeRequest($rangeRequest);
        $this->assertInstanceOf(RangesResponse::class, $res);
    }
}
