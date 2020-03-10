<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Serializer;

use WBW\Library\HaveIBeenPwned\Model\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Serializer\RequestSerializer;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Request serializer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Serializer
 */
class RequestSerializerTest extends AbstractTestCase {

    /**
     * Tests the SerializeBreachedAccountRequest() method.
     *
     * @return void
     */
    public function testSerializeBreachedAccountRequest() {

        // Set a Breached account request mock.
        $arg = new BreachedAccountRequest();
        $arg->setDomain("domain");
        $arg->setIncludeUnverified(true);
        $arg->setTruncateResponse(true);

        $res = [
            "domain"            => "domain",
            "includeUnverified" => "true",
            "truncateResponse"  => "true",
        ];
        $this->assertEquals($res, RequestSerializer::SerializeBreachedAccountRequest($arg));
    }

    /**
     * Tests the SerializeBreachedAccountRequest() method.
     *
     * @return void
     */
    public function testSerializeBreachedAccountRequestWithoutArguments() {

        // Set a Breached account request mock.
        $arg = new BreachedAccountRequest();

        $res = [];
        $this->assertEquals($res, RequestSerializer::SerializeBreachedAccountRequest($arg));
    }

    /**
     * Tests the SerializeBreachesRequest() method.
     *
     * @return void
     */
    public function testSerializeBreachesRequest() {

        // Set a Breach request mock.
        $arg = new BreachesRequest();
        $arg->setDomain("domain");

        $res = ["domain" => "domain"];
        $this->assertEquals($res, RequestSerializer::SerializeBreachesRequest($arg));
    }

    /**
     * Tests the SerializeBreachesRequest() method.
     *
     * @return void
     */
    public function testSerializeBreachesRequestWithoutArguments() {

        // Set a Breach request mock.
        $arg = new BreachesRequest();

        $res = [];
        $this->assertEquals($res, RequestSerializer::SerializeBreachesRequest($arg));
    }
}
