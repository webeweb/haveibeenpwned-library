<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model\Request;

use WBW\Library\HaveIBeenPwned\Model\AbstractRequest;

/**
 * Data classes request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model\Request
 */
class DataClassesRequest extends AbstractRequest {

    /**
     * Data classes resource path.
     *
     * @var string
     */
    const DATA_CLASSES_RESOURCE_PATH = "/dataclasses";

    /**
     * {@inheritdoc}
     */
    public function getResourcePath() {
        return self::DATA_CLASSES_RESOURCE_PATH;
    }
}
