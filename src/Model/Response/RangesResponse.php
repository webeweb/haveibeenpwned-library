<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model\Response;

use WBW\Library\HaveIBeenPwned\Model\AbstractResponse;
use WBW\Library\HaveIBeenPwned\Model\Range;

/**
 * Ranges response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model\Response
 */
class RangesResponse extends AbstractResponse {

    /**
     * Ranges.
     *
     * @var Range[]
     */
    private $ranges;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->setRanges([]);
    }

    /**
     * Add a range.
     *
     * @param Range $range The range.
     * @return RangesResponse Returns this ranges response.
     */
    public function addRange(Range $range) {
        $this->ranges[] = $range;
        return $this;
    }

    /**
     * Get the ranges.
     *
     * @return Range[] Returns the ranges.
     */
    public function getRanges() {
        return $this->ranges;
    }

    /**
     * Set the ranges.
     *
     * @param Range[] $ranges The ranges.
     * @return RangesResponse Returns this ranges response.
     */
    protected function setRanges(array $ranges) {
        $this->ranges = $ranges;
        return $this;
    }
}
