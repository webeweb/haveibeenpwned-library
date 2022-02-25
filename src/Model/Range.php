<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model;

use WBW\Library\Traits\Integers\IntegerCountTrait;
use WBW\Library\Traits\Strings\StringHashTrait;

/**
 * Range.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class Range {

    use IntegerCountTrait;
    use StringHashTrait;

    /**
     * Prefix
     *
     * @var string|null
     */
    private $prefix;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setCount(0);
    }

    /**
     * Get the prefix.
     *
     * @return string|null Returns the prefix.
     */
    public function getPrefix(): ?string {
        return $this->prefix;
    }

    /**
     * Set the prefix.
     *
     * @param string|null $prefix The prefix.
     * @return Range Returns this range.
     */
    public function setPrefix(?string $prefix): Range {
        $this->prefix = $prefix;
        return $this;
    }
}
