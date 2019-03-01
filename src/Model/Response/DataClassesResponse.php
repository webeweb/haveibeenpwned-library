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
use WBW\Library\HaveIBeenPwned\Model\DataClass;

/**
 * Data classes response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model\Response
 */
class DataClassesResponse extends AbstractResponse {

    /**
     * Data classes.
     *
     * @var DataClass[]
     */
    private $dataClasses;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setDataClasses([]);
    }

    /**
     * Add a dataClass.
     *
     * @param DataClass $dataClass The data class.
     * @return DataClassesResponse Returns this data classes response.
     */
    public function addDataClass(DataClass $dataClass) {
        $this->dataClasses[] = $dataClass;
        return $this;
    }

    /**
     * Get the data classes.
     *
     * @return DataClass[] Returns the data classes.
     */
    public function getDataClasses() {
        return $this->dataClasses;
    }

    /**
     * Set the data classes.
     *
     * @param DataClass[] $dataClasses The data classes.
     * @return DataClassesResponse Returns this data classes response.
     */
    protected function setDataClasses(array $dataClasses) {
        $this->dataClasses = $dataClasses;
        return $this;
    }
}
