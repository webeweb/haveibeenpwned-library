<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\HaveIBeenPwned\Tests;

use PHPUnit\Framework\TestCase;
use WBW\Library\HaveIBeenPwned\Api\RequestInterface;
use WBW\Library\HaveIBeenPwned\Entity\BreachedAccountInterface;
use WBW\Library\HaveIBeenPwned\Entity\BreachesInterface;
use WBW\Library\HaveIBeenPwned\Entity\BreachInterface;
use WBW\Library\HaveIBeenPwned\Entity\PasteAccountInterface;
use WBW\Library\HaveIBeenPwned\Entity\RangeInterface;

/**
 * Abstract test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Tests
 * @abstract
 */
abstract class AbstractTestCase extends TestCase {

    /**
     * Breach.
     *
     * @var BreachInterface
     */
    protected $breach;

    /**
     * Breached account.
     *
     * @var BreachedAccountInterface
     */
    protected $breachedAccount;

    /**
     * Breaches.
     *
     * @var BreachesInterface
     */
    protected $breaches;

    /**
     * Paste.
     *
     * @var PasteAccountInterface
     */
    protected $pasteAccount;

    /**
     * Range.
     *
     * @var RangeInterface
     */
    protected $range;

    /**
     * Get a token.
     *
     * @return string Returns the token.
     */
    public static function getToken(): string {

        $path = __DIR__ . "/../.token";
        if (true === file_exists($path)) {
            return file_get_contents($path);
        }

        return "API_TOKEN_MOCK";
    }

    /**
     * {inheritdoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Breach mock.
        $this->breach = $this->getMockBuilder(BreachInterface::class)->getMock();
        $this->breach->expects($this->any())->method("getHaveIBeenPwnedName")->willReturn("Adobe");

        // Set a Breached account mock.
        $this->breachedAccount = $this->getMockBuilder(BreachedAccountInterface::class)->getMock();
        $this->breachedAccount->expects($this->any())->method("getHaveIBeenPwnedAccount")->willReturn("john.doe@gmail.com");
        $this->breachedAccount->expects($this->any())->method("getHaveIBeenPwnedDomain")->willReturn("adobe.com");
        $this->breachedAccount->expects($this->any())->method("getHaveIBeenPwnedIncludeUnverified")->willReturn(true);
        $this->breachedAccount->expects($this->any())->method("getHaveIBeenPwnedTruncateResponse")->willReturn(false);

        // Set a Breaches mock.
        $this->breaches = $this->getMockBuilder(BreachesInterface::class)->getMock();
        $this->breaches->expects($this->any())->method("getHaveIBeenPwnedDomain")->willReturn("adobe.com");

        // Set a Paste account mock.
        $this->pasteAccount = $this->getMockBuilder(PasteAccountInterface::class)->getMock();
        $this->pasteAccount->expects($this->any())->method("getHaveIBeenPwnedAccount")->willReturn("john.doe@gmail.com");

        // Set a Range mock.
        $this->range = $this->getMockBuilder(RangeInterface::class)->getMock();
        $this->range->expects($this->any())->method("getHaveIBeenPwnedHash")->willReturn("21BD1");
    }

    /**
     * Wait.
     *
     * @return void
     */
    protected function wait(): void {
        sleep(intval(RequestInterface::RATE_LIMITING * 4 / 1000));
    }
}
