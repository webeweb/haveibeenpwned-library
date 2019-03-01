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
use WBW\Library\HaveIBeenPwned\Model\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Provider\APIProviderV1;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * API provider v1 test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Provider
 */
class APIProviderV1Test extends AbstractTestCase {

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
        $breachedAccountRequest->setAccount("john.doe@gmail.com");

        $obj = new APIProviderV1();

        $res = $obj->breachedAccountRequest($breachedAccountRequest);
        $this->assertInstanceOf(BreachesResponse::class, $res);
    }

    /**
     * Tests the getEndpointVersion() method.
     *
     * @return void
     */
    public function testGetEndpointVersion() {

        $obj = new APIProviderV1();

        $this->assertEquals("", $obj->getEndpointVersion());
    }
}
