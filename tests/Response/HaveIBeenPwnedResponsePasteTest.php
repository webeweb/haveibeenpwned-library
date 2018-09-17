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

use WBW\Library\HaveIBeenPwned\API\HaveIBeenPwnedModelInterface;
use WBW\Library\HaveIBeenPwned\Response\HaveIBeenPwnedResponsePaste;
use WBW\Library\HaveIBeenPwned\Tests\Cases\AbstractHaveIBeenPwnedFrameworkTestCase;
use WBW\Library\HaveIBeenPwned\Tests\Fixtures\TestFixtures;

/**
 * HaveIBeenPwned response "Paste" test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Response
 * @final
 */
final class HaveIBeenPwnedResponsePasteTest extends AbstractHaveIBeenPwnedFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new HaveIBeenPwnedResponsePaste(TestFixtures::SAMPLE_PASTE_RESPONSE);

        $res = $obj->getPastes();

        $this->assertCount(2, $res);

        // Model #1
        $this->assertEquals("2014-03-04T19:14:54Z", $res[0]->getDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(139, $res[0]->getEmailCount());
        $this->assertEquals("8Q0BvKD8", $res[0]->getId());
        $this->assertEquals("Pastebin", $res[0]->getSource());
        $this->assertEquals("syslog", $res[0]->getTitle());

        // Model #2
        $this->assertEquals("2013-03-28T16:51:10Z", $res[1]->getDate()->format(HaveIBeenPwnedModelInterface::DATETIME_FORMAT_DATE));
        $this->assertEquals(30, $res[1]->getEmailCount());
        $this->assertEquals("7152479", $res[1]->getId());
        $this->assertEquals("Pastie", $res[1]->getSource());
        $this->assertNull($res[1]->getTitle());
    }

}
