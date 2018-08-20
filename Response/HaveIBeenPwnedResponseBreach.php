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
use WBW\Library\HaveIBeenPwned\Helper\HaveIBeenPwnedHelper;
use WBW\Library\HaveIBeenPwned\Model\HaveIBeenPwnedBreach;

/**
 * HaveIBeenPwned response "Breach".
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Response
 */
class HaveIBeenPwnedResponseBreach implements HaveIBeenPwnedResponseInterface {

    /**
     * Breaches.
     *
     * @var HaveIBeenPwnedBreach[]
     */
    private $breaches;

    /**
     * Constructor.
     */
    public function __construct($rawResponse) {
        $this->setBreaches([]);
        $this->parse($rawResponse);
    }

    /**
     * Add a breach.
     *
     * @param HaveIBeenPwnedBreach $breach The breach.
     * @return HaveIBeenPwnedResponseBreach Returns this HaveIBeenPwned response "Breach".
     */
    public function addBreach(HaveIBeenPwnedBreach $breach) {
        $this->breaches[] = $breach;
        return $this;
    }

    /**
     * Get the breaches.
     *
     * @return HaveIBeenPwnedBreach[] Returns the breaches.
     */
    public function getBreaches() {
        return $this->breaches;
    }

    /**
     * {@inheritdoc}
     */
    protected function parse($rawResponse) {

        // Clean the raw response.
        $cleanedResponse = HaveIBeenPwnedHelper::cleanResponse($rawResponse);

        // Decode the raw response.
        $response = json_decode($cleanedResponse, true);

        // Handle each response item.
        foreach ($response as $current) {

            // Initialize the model.
            $model = HaveIBeenPwnedBreach::parse($current);

            // Add the model.
            $this->addBreach($model);
        }
    }

    /**
     * Set the breaches.
     *
     * @param HaveIBeenPwnedBreach[] $breaches The breaches.
     * @return HaveIBeenPwnedResponseBreach Returns this HaveIBeenPwned response "Breach".
     */
    protected function setBreaches($breaches) {
        $this->breaches = $breaches;
        return $this;
    }

}
