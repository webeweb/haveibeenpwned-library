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

use WBW\Library\HaveIBeenPwned\Traits\HashTrait;

/**
 * Range.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class Range {

    use HashTrait;

    /**
     * Count.
     *
     * @var int
     */
    private $count;

    /**
     * Prefix
     *
     * @var string
     */
    private $prefix;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setCount(0);
    }

    /**
     * Get the count.
     *
     * @return int Returns the count.
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * Get the prefix.
     *
     * @return string Returns the prefix.
     */
    public function getPrefix() {
        return $this->prefix;
    }

    /**
     * Set the count.
     *
     * @param int $count The count.
     * @return Range Returns this range.
     */
    public function setCount($count) {
        $this->count = $count;
        return $this;
    }

    /**
     * Set the prefix.
     *
     * @param string $prefix The prefix.
     * @return Range Returns this range.
     */
    public function setPrefix($prefix) {
        $this->prefix = $prefix;
        return $this;
    }
}
