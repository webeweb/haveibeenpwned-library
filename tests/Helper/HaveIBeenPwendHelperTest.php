<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Helper;

use WBW\Library\HaveIBeenPwned\Helper\HaveIBeenPwnedHelper;
use WBW\Library\HaveIBeenPwned\Tests\AbstractFrameworkTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\TestFixtures;

/**
 * HaveIBeenPwend helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Helper
 * @final
 */
final class HaveIBeenPwendHelperTest extends AbstractFrameworkTestCase {

    /**
     * Tests the cleanResponse() method.
     *
     * @return void
     */
    public function testCleanResponse() {

        $arg = TestFixtures::SAMPLE_BREACH_RESPONSE;

        $res = HaveIBeenPwnedHelper::cleanResponse($arg);

        $this->assertContains("True", $arg);
        $this->assertContains("False", $arg);

        $this->assertNotContains("True", $res);
        $this->assertNotContains("False", $res);
    }

}
