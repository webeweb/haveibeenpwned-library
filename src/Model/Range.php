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

use WBW\Library\Core\Model\Attribute\StringHashTrait;

/**
 * Range.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class Range {

    use StringHashTrait;

    /**
     * Count.
     *
     * @var int|null
     */
    private $count;

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
     * Get the count.
     *
     * @return int|null Returns the count.
     */
    public function getCount(): ?int {
        return $this->count;
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
     * Set the count.
     *
     * @param int|null $count The count.
     * @return Range Returns this range.
     */
    public function setCount(?int $count): Range {
        $this->count = $count;
        return $this;
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
