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
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Serializer
 */
class RequestSerializerTest extends AbstractTestCase {

    /**
     * Tests serializeRequest()
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
        $this->assertCount(3, $res);

        $this->assertEquals("domain", $res["domain"]);
        $this->assertEquals("true", $res["includeUnverified"]);
        $this->assertEquals("true", $res["truncateResponse"]);
    }

    /**
     * Tests serializeBreachesRequest()
     *
     * @return void
     */
    public function testSerializeBreachesRequest(): void {

        // Set a Breaches request mock.
        $arg = new BreachesRequest();
        $arg->setDomain("domain");

        $res = RequestSerializer::serializeBreachesRequest($arg);
        $this->assertCount(1, $res);

        $this->assertEquals("domain", $res["domain"]);
    }
}
