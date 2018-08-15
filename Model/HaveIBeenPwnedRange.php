<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model;

/**
 * HaveIBeenPwned range model.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class HaveIBeenPwnedRange {

    /**
     * Count.
     *
     * @var int
     */
    private $count;

    /**
     * Hash.
     *
     * @var string
     */
    private $hash;

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
     * Get the hash.
     *
     * @return string Returns the hash.
     */
    public function getHash() {
        return $this->hash;
    }

    /**
     * Parse a raw response.
     *
     * @param string $rawResponse The raw response.
     * @return HaveIBeenPwnedRange Returns a HaveIBeenPwned range.
     */
    public static function parse($rawResponse) {

        // Split the raw response.
        $response = explode(":", $rawResponse);

        // Check the response.
        if (count($response) < 2) {
            return new HaveIBeenPwnedRange();
        }

        // Initialize the model.
        $model = new HaveIBeenPwnedRange();

        $model->setHash(trim($response[0]));
        $model->setCOunt(intval($response[1]));

        // Return the model.
        return $model;
    }

    /**
     * Set the count.
     *
     * @param int $count The count.
     * @return HaveIBeenPwnedRange Returns this HaveIBeenPwned range.
     */
    public function setCount($count) {
        $this->count = $count;
        return $this;
    }

    /**
     * Set the hash.
     *
     * @param string $hash The hash.
     * @return HaveIBeenPwnedRange Returns this HaveIBeenPwned range.
     */
    public function setHash($hash) {
        $this->hash = $hash;
        return $this;
    }

}
