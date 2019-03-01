<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model\Request;

use WBW\Library\HaveIBeenPwned\API\SubstituteRequestInterface;
use WBW\Library\HaveIBeenPwned\Traits\AccountTrait;

/**
 * Breached account request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model\Request
 */
class BreachedAccountRequest extends BreachesRequest implements SubstituteRequestInterface {

    use AccountTrait;

    /**
     * Breached account resource path.
     *
     * @var string
     */
    const BREACHED_ACCOUNT_RESOURCE_PATH = "/breachedaccount/{account}";

    /**
     * Include unverified.
     *
     * @var bool
     */
    private $includeUnverified;

    /**
     * Truncate response.
     *
     * @var bool
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
     * @return bool Returns the include unverified.
     */
    public function getIncludeUnverified() {
        return $this->includeUnverified;
    }

    /**
     * {@inheritdoc}
     */
    public function getResourcePath() {
        return self::BREACHED_ACCOUNT_RESOURCE_PATH;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituteName() {
        return "{account}";
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituteValue() {
        return $this->getAccount();
    }

    /**
     * Get the truncate response.
     *
     * @return bool Returns the truncate response.
     */
    public function getTruncateResponse() {
        return $this->truncateResponse;
    }

    /**
     * Set the include unverified.
     *
     * @param bool $includeUnverified The include unverified.
     * @return BreachedAccountRequest Returns this breached account request.
     */
    public function setIncludeUnverified($includeUnverified) {
        $this->includeUnverified = $includeUnverified;
        return $this;
    }

    /**
     * Set the truncate response.
     *
     * @param bool $truncateResponse The truncate response.
     * @return BreachedAccountRequest Returns this breached account request.
     */
    public function setTruncateResponse($truncateResponse) {
        $this->truncateResponse = $truncateResponse;
        return $this;
    }
}
