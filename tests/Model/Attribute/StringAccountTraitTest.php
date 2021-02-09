<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Model\Attribute;

use WBW\Library\HaveIBeenPwned\Tests\AbstractTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\Model\Attribute\TestStringAccountTrait;

/**
 * String account trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model\Attribute
 */
class StringAccountTraitTest extends AbstractTestCase {

    /**
     * Tests the setAccount() method.
     *
     * @return void
     */
    public function testSetAccount(): void {

        $obj = new TestStringAccountTrait();

        $obj->setAccount("account");
        $this->assertEquals("account", $obj->getAccount());
    }
}
