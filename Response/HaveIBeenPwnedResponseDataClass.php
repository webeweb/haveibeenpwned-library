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
use WBW\Library\HaveIBeenPwned\Model\HaveIBeenPwnedDataClass;

/**
 * HaveIBeenPwned response "Data class".
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Response
 */
class HaveIBeenPwnedResponseDataClass implements HaveIBeenPwnedResponseInterface {

    /**
     * DataClasses.
     *
     * @var HaveIBeenPwnedDataClass[]
     */
    private $dataClasses;

    /**
     * Constructor.
     */
    public function __construct($rawResponse) {
        $this->setDataClasses([]);
        $this->parse($rawResponse);
    }

    /**
     * Add a dataClass.
     *
     * @param HaveIBeenPwnedDataClass $dataClass The data class.
     * @return HaveIBeenPwnedResponseDataClass Returns this HaveIBeenPwned response "Data class".
     */
    public function addDataClass(HaveIBeenPwnedDataClass $dataClass) {
        $this->dataClasses[] = $dataClass;
        return $this;
    }

    /**
     * Get the dataClasses.
     *
     * @return HaveIBeenPwnedDataClass[] Returns the dataClasses.
     */
    public function getDataClasses() {
        return $this->dataClasses;
    }

    /**
     * {@inheritdoc}
     */
    protected function parse($rawResponse) {

        // Decode the raw response.
        $response = json_decode($rawResponse, true);

        // Handle each response item.
        foreach ($response as $current) {

            // Initialize the model.
            $model = HaveIBeenPwnedDataClass::parse($current);

            // Add the model.
            $this->addDataClass($model);
        }
    }

    /**
     * Set the dataClasses.
     *
     * @param HaveIBeenPwnedDataClass[] $dataClasses The dataClasses.
     * @return HaveIBeenPwnedResponseDataClass Returns this HaveIBeenPwned response "DataClass".
     */
    protected function setDataClasses($dataClasses) {
        $this->dataClasses = $dataClasses;
        return $this;
    }

}
