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
 * HaveIBeenPwned data class model.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class HaveIBeenPwnedDataClass {

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Parse the raw response.
     *
     * @param string $rawResponse The raw response.
     * @return HaveIBeenPwnedBreach Returns a data class.
     */
    public static function parse($rawResponse) {

        // Initialize the model.
        $model = new HaveIBeenPwnedDataClass();

        $model->setName($rawResponse);

        // Return the model.
        return $model;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return HaveIBeenPwnedDataClass Returns this data class.
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

}
