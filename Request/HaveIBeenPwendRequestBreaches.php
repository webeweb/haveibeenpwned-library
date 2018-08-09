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

use WBW\Library\Core\Helper\Argument\ArrayHelper;
use WBW\Library\HaveIBeenPwned\API\HaveIBeenPwnedRequestInterface;

/**
 * HaveIBeenPwend request "Breaches".
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Request
 */
class HaveIBeenPwendRequestBreaches implements HaveIBeenPwnedRequestInterface {

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
     * Set the domain.
     *
     * @param string $domain The domain.
     * @return HaveIBeenPwnedRequestBreaches Returns this HaveIBeenPwned request "Breaches".
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

        ArrayHelper::set($output, "domain", [null]);

        // Return the output.
        return $output;
    }

}
