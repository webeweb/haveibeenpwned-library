<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Request;

use WBW\Library\Core\Argument\ArrayHelper;
use WBW\Library\HaveIBeenPwned\API\HaveIBeenPwnedRequestInterface;
use WBW\Library\HaveIBeenPwned\Response\HaveIBeenPwnedResponseBreach;

/**
 * HaveIBeenPwned request "Breach".
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Request
 */
class HaveIBeenPwnedRequestBreach implements HaveIBeenPwnedRequestInterface {

    /**
     * Domain.
     *
     * @var string
     */
    private $domain;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the domain.
     *
     * @return string Returns the domain.
     */
    public function getDomain() {
        return $this->domain;
    }

    /**
     * {@inheritdoc}
     */
    public function getResourcePath() {
        return "/breaches";
    }

    /**
     * {@inheritdoc}
     */
    public function parseResponse($rawResponse) {
        return new HaveIBeenPwnedResponseBreach($rawResponse);
    }

    /**
     * Set the domain.
     *
     * @param string $domain The domain.
     * @return HaveIBeenPwnedRequestBreaches Returns this request "Breach".
     */
    public function setDomain($domain) {
        $this->domain = $domain;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray() {

        // Initialize the output.
        $output = [];

        ArrayHelper::set($output, "domain", $this->domain, [null]);

        // Return the output.
        return $output;
    }

}
