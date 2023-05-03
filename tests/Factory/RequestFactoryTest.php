<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Factory;

use WBW\Library\HaveIBeenPwned\Factory\RequestFactory;
use WBW\Library\HaveIBeenPwned\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Request\BreachRequest;
use WBW\Library\HaveIBeenPwned\Request\DataClassesRequest;
use WBW\Library\HaveIBeenPwned\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Request\RangeRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Request factory test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests\Factory
 */
class RequestFactoryTest extends AbstractTestCase {

    /**
     * Test newBreachRequest()
     *
     * @return void
     */
    public function testNewBreachRequest(): void {

        $res = RequestFactory::newBreachRequest($this->breach);
        $this->assertInstanceOf(BreachRequest::class, $res);

        $this->assertEquals("Adobe", $res->getName());
    }

    /**
     * Test newBreachedAccountRequest()
     *
     * @return void
     */
    public function testNewBreachedAccountRequest(): void {

        $res = RequestFactory::newBreachedAccountRequest($this->breachedAccount);
        $this->assertInstanceOf(BreachedAccountRequest::class, $res);

        $this->assertEquals("john.doe@gmail.com", $res->getAccount());
        $this->assertEquals("adobe.com", $res->getDomain());
        $this->assertTrue($res->getIncludeUnverified());
        $this->assertFalse($res->getTruncateResponse());
    }

    /**
     * Test newBreachesRequest()
     *
     * @return void
     */
    public function testNewBreachesRequest(): void {

        $res = RequestFactory::newBreachesRequest($this->breaches);
        $this->assertInstanceOf(BreachesRequest::class, $res);

        $this->assertEquals("adobe.com", $res->getDomain());
    }

    /**
     * Test newDataClassesRequest()
     *
     * @return void
     */
    public function testNewDataClassesRequest(): void {

        $res = RequestFactory::newDataClassesRequest($this->breach);
        $this->assertInstanceOf(DataClassesRequest::class, $res);
    }

    /**
     * Test newPasteAccountRequest()
     *
     * @return void
     */
    public function testNewPasteAccountRequest(): void {

        $res = RequestFactory::newPasteAccountRequest($this->pasteAccount);
        $this->assertInstanceOf(PasteAccountRequest::class, $res);

        $this->assertEquals("john.doe@gmail.com", $res->getAccount());
    }

    /**
     * Test newRangeRequest()
     *
     * @return void
     */
    public function testNewRangeRequest(): void {

        $res = RequestFactory::newRangeRequest($this->range);
        $this->assertInstanceOf(RangeRequest::class, $res);

        $this->assertEquals("21BD1", $res->getHash());
    }
}
