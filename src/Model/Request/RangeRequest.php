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

use WBW\Library\HaveIBeenPwned\API\SubstituteRequestInterface;
use WBW\Library\HaveIBeenPwned\Model\AbstractRequest;
use WBW\Library\HaveIBeenPwned\Traits\HashTrait;

/**
 * Range request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model\Request
 */
class RangeRequest extends AbstractRequest implements SubstituteRequestInterface {

    use HashTrait;

    /**
     * Range resource path.
     *
     * @var string
     */
    const RANGE_RESOURCE_PATH = "/range/{hash}";

    /**
     * {@inheritdoc}
     */
    public function getResourcePath() {
        return self::RANGE_RESOURCE_PATH;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituteName() {
        return "{hash}";
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituteValue() {
        return $this->getHash();
    }
}
