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
use WBW\Library\HaveIBeenPwned\Model\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\DataClassesRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\RangeRequest;
use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;

/**
 * Request factory test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Factory
 */
class RequestFactoryTest extends AbstractTestCase {

    /**
     * Tests the newBreachRequest() method.
     *
     * @return void
     */
    public function testNewBreachRequest(): void {

        $res = RequestFactory::newBreachRequest($this->breach);
        $this->assertInstanceOf(BreachRequest::class, $res);

        $this->assertEquals("Adobe", $res->getName());
    }

    /**
     * Tests the newBreachedAccountRequest() method.
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
     * Tests the newBreachesRequest() method.
     *
     * @return void
     */
    public function testNewBreachesRequest(): void {

        $res = RequestFactory::newBreachesRequest($this->breaches);
        $this->assertInstanceOf(BreachesRequest::class, $res);

        $this->assertEquals("adobe.com", $res->getDomain());
    }

    /**
     * Tests the newDataClassesRequest() method.
     *
     * @return void
     */
    public function testNewDataClassesRequest(): void {

        $res = RequestFactory::newDataClassesRequest($this->breach);
        $this->assertInstanceOf(DataClassesRequest::class, $res);
    }

    /**
     * Tests the newPasteAccountRequest() method.
     *
     * @return void
     */
    public function testNewPasteAccountRequest(): void {

        $res = RequestFactory::newPasteAccountRequest($this->pasteAccount);
        $this->assertInstanceOf(PasteAccountRequest::class, $res);

        $this->assertEquals("john.doe@gmail.com", $res->getAccount());
    }

    /**
     * Tests the newRangeRequest() method.
     *
     * @return void
     */
    public function testNewRangeRequest(): void {

        $res = RequestFactory::newRangeRequest($this->range);
        $this->assertInstanceOf(RangeRequest::class, $res);

        $this->assertEquals("21BD1", $res->getHash());
    }
}
