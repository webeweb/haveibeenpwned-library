<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Fixtures\Model;

use WBW\Library\HaveIBeenPwned\Model\AbstractRequest;

/**
 * Test request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Fixtures\Model
 */
class TestRequest extends AbstractRequest {

    /**
     * {@inheritdoc}
     */
    public function getResourcePath(): string {
        return "";
    }
}
