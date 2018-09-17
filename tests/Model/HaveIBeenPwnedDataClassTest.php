<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Model;

use WBW\Library\HaveIBeenPwned\Model\HaveIBeenPwnedDataClass;
use WBW\Library\HaveIBeenPwned\Tests\AbstractHaveIBeenPwnedFrameworkTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\TestFixtures;

/**
 * HaveIBeenPwned data class model test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Model
 * @final
 */
final class HaveIBeenPwnedDataClassTest extends AbstractHaveIBeenPwnedFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new HaveIBeenPwnedDataClass();

        $this->assertNull($obj->getName());
    }

    /**
     * Tests the parse() method.
     *
     * @return void
     */
    public function testParse() {

        $dataClasses = json_decode(TestFixtures::SAMPLE_DATA_CLASS_RESPONSE);

        $obj = HaveIBeenPwnedDataClass::parse($dataClasses[0]);

        $this->assertInstanceOf(HaveIBeenPwnedDataClass::class, $obj);
        $this->assertEquals("Email addresses", $obj->getName());
    }

    /**
     * Tests the setName() method.
     *
     * @return void
     */
    public function testSetName() {

        $obj = new HaveIBeenPwnedDataClass();

        $obj->setName("name");
        $this->assertEquals("name", $obj->getName());
    }

}
