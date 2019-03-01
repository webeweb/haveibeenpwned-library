<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Fixtures\Provider;

use WBW\Library\HaveIBeenPwned\Provider\AbstractAPIProvider;

/**
 * Test API provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Fixtures\Provider
 */
class TestAPIProvider extends AbstractAPIProvider {

    /**
     * {@inheritdoc}
     */
    public function getEndpointVersion() {
        return "";
    }
}
