<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Request;

use WBW\Library\HaveIBeenPwned\API\SubstituteRequestInterface;
use WBW\Library\Traits\Strings\StringHashTrait;

/**
 * Range request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Request
 */
class RangeRequest extends AbstractRequest implements SubstituteRequestInterface {

    use StringHashTrait;

    /**
     * Range resource path.
     *
     * @var string
     */
    const RANGE_RESOURCE_PATH = "/range/{hash}";

    /**
     * {@inheritdoc}
     */
    public function getResourcePath(): string {
        return self::RANGE_RESOURCE_PATH;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituteName(): string {
        return "{hash}";
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituteValue(): ?string {
        return $this->getHash();
    }
}
