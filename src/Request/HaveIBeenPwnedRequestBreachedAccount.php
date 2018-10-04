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

/**
 * HaveIBeenPwned request "Breached account".
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Request
 */
class HaveIBeenPwnedRequestBreachedAccount extends HaveIBeenPwnedRequestBreach {

    /**
     * Include unverified.
     *
     * @var boolean
     */
    private $includeUnverified;

    /**
     * Truncate response.
     *
     * @var boolean
     */
    private $truncateResponse;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Get the include unverified.
     *
     * @return boolean Returns the include unverified.
     */
    public function getIncludeUnverified() {
        return $this->includeUnverified;
    }

    /**
     * Get the truncate response.
     *
     * @return boolean Returns the truncate response.
     */
    public function getTruncateResponse() {
        return $this->truncateResponse;
    }

    /**
     * Set the include unverified.
     *
     * @param boolean $includeUnverified The include unverified.
     * @return HaveIBeenPwnedRequestBreaches Returns this request "Breached account".
     */
    public function setIncludeUnverified($includeUnverified) {
        $this->includeUnverified = $includeUnverified;
        return $this;
    }

    /**
     * Set the truncate response.
     *
     * @param boolean $truncateResponse The truncate response.
     * @return HaveIBeenPwnedRequestBreaches Returns this request "Breached account".
     */
    public function setTruncateResponse($truncateResponse) {
        $this->truncateResponse = $truncateResponse;
        return $this;
    }

}
