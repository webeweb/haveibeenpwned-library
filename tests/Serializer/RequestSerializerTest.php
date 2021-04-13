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

use WBW\Library\HaveIBeenPwned\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Request\BreachesRequest;
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
     * Tests the serializeBreachedAccountRequest() method.
     *
     * @return void
     */
    public function testSerializeBreachedAccountRequest(): void {

        // Set a Breached account request mock.
        $arg = new BreachedAccountRequest();
        $arg->setDomain("domain");
        $arg->setIncludeUnverified(true);
        $arg->setTruncateResponse(true);

        $res = RequestSerializer::serializeBreachedAccountRequest($arg);
        $this->assertEquals("domain", $res["domain"]);
        $this->assertEquals("true", $res["includeUnverified"]);
        $this->assertEquals("true", $res["truncateResponse"]);
    }

    /**
     * Tests the serializeBreachedAccountRequest() method.
     *
     * @return void
     */
    public function testSerializeBreachedAccountRequestWithoutArguments(): void {

        // Set a Breached account request mock.
        $arg = new BreachedAccountRequest();

        $res = RequestSerializer::serializeBreachedAccountRequest($arg);
        $this->assertEquals([], $res);
    }

    /**
     * Tests the serializeBreachesRequest() method.
     *
     * @return void
     */
    public function testSerializeBreachesRequest(): void {

        // Set a Breach request mock.
        $arg = new BreachesRequest();
        $arg->setDomain("domain");

        $res = RequestSerializer::serializeBreachesRequest($arg);
        $this->assertEquals("domain", $res["domain"]);
    }

    /**
     * Tests the serializeBreachesRequest() method.
     *
     * @return void
     */
    public function testSerializeBreachesRequestWithoutArguments(): void {

        // Set a Breach request mock.
        $arg = new BreachesRequest();

        $res = RequestSerializer::serializeBreachesRequest($arg);
        $this->assertEquals([], $res);
    }
}
