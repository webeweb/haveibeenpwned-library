<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model\Request;

use WBW\Library\HaveIBeenPwned\Model\AbstractRequest;
use WBW\Library\HaveIBeenPwned\Model\Attribute\StringDomainTrait;

/**
 * Breaches request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model\Request
 */
class BreachesRequest extends AbstractRequest {

    use StringDomainTrait;

    /**
     * Breaches resource path.
     *
     * @var string
     */
    const BREACHES_RESOURCE_PATH = "/breaches";

    /**
     * {@inheritdoc}
     */
    public function getResourcePath() {
        return self::BREACHES_RESOURCE_PATH;
    }
}
