<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Response;

use WBW\Library\HaveIBeenPwned\API\HaveIBeenPwnedResponseInterface;
use WBW\Library\HaveIBeenPwned\Model\HaveIBeenPwnedRange;

/**
 * HaveIBeenPwned response "Range".
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Response
 */
class HaveIBeenPwnedResponseRange implements HaveIBeenPwnedResponseInterface {

    /**
     * Ranges.
     *
     * @var HaveIBeenPwnedRange[]
     */
    private $ranges;

    /**
     * Constructor.
     */
    public function __construct($rawResponse) {
        $this->setRanges([]);
        $this->parse($rawResponse);
    }

    /**
     * Add a range.
     *
     * @param HaveIBeenPwnedRange $range The range.
     * @return HaveIBeenPwnedResponseRange Returns this response "Range".
     */
    public function addRange(HaveIBeenPwnedRange $range) {
        $this->ranges[] = $range;
        return $this;
    }

    /**
     * Get the ranges.
     *
     * @return HaveIBeenPwnedRange[] Returns the ranges.
     */
    public function getRanges() {
        return $this->ranges;
    }

    /**
     * {@inheritdoc}
     */
    protected function parse($rawResponse) {

        // Decode the raw response.
        $response = explode("\n", $rawResponse);

        // Handle each response item.
        foreach ($response as $current) {

            // Initialize the model.
            $model = HaveIBeenPwnedRange::parse($current);

            // Add the model.
            $this->addRange($model);
        }
    }

    /**
     * Set the ranges.
     *
     * @param HaveIBeenPwnedRange[] $ranges The ranges.
     * @return HaveIBeenPwnedResponseRange Returns this response "Range".
     */
    protected function setRanges(array $ranges) {
        $this->ranges = $ranges;
        return $this;
    }

}
