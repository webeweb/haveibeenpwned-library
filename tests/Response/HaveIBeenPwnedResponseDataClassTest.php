<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Response;

use WBW\Library\HaveIBeenPwned\Response\HaveIBeenPwnedResponseDataClass;
use WBW\Library\HaveIBeenPwned\Tests\Cases\AbstractHaveIBeenPwnedFrameworkTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\App\TestFixtures;

/**
 * HaveIBeenPwned response "Data class" test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Response
 * @final
 */
final class HaveIBeenPwnedResponseDataClassTest extends AbstractHaveIBeenPwnedFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new HaveIBeenPwnedResponseDataClass(TestFixtures::SAMPLE_DATA_CLASS_RESPONSE);

        $res = $obj->getDataClasses();

        $this->assertCount(4, $res);

        $this->assertEquals("Email addresses", $res[0]->getName());
        $this->assertEquals("Password hints", $res[1]->getName());
        $this->assertEquals("Passwords", $res[2]->getName());
        $this->assertEquals("Usernames", $res[3]->getName());
    }

}
