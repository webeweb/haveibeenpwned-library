<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Normalizer;

use WBW\Library\HaveIBeenPwned\Model\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Normalizer\RequestNormalizer;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Request normalizer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Normalizer
 */
class RequestNormalizerTest extends AbstractTestCase {

    /**
     * Tests the normalizeBreachedAccountRequest() method.
     *
     * @return void
     */
    public function testNormalizeBreachedAccountRequest() {

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
        $this->assertEquals($res, RequestNormalizer::normalizeBreachedAccountRequest($arg));
    }

    /**
     * Tests the normalizeBreachedAccountRequest() method.
     *
     * @return void
     */
    public function testNormalizeBreachedAccountRequestWithoutArguments() {

        // Set a Breached account request mock.
        $arg = new BreachedAccountRequest();

        $res = [];
        $this->assertEquals($res, RequestNormalizer::normalizeBreachedAccountRequest($arg));
    }

    /**
     * Tests the normalizeBreachesRequest() method.
     *
     * @return void
     */
    public function testNormalizeBreachesRequest() {

        // Set a Breach request mock.
        $arg = new BreachesRequest();
        $arg->setDomain("domain");

        $res = ["domain" => "domain"];
        $this->assertEquals($res, RequestNormalizer::normalizeBreachesRequest($arg));
    }

    /**
     * Tests the normalizeBreachesRequest() method.
     *
     * @return void
     */
    public function testNormalizeBreachesRequestWithoutArguments() {

        // Set a Breach request mock.
        $arg = new BreachesRequest();

        $res = [];
        $this->assertEquals($res, RequestNormalizer::normalizeBreachesRequest($arg));
    }
}
