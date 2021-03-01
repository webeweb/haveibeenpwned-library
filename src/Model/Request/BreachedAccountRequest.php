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
use WBW\Library\HaveIBeenPwned\Model\Attribute\StringAccountTrait;

/**
 * Breached account request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model\Request
 */
class BreachedAccountRequest extends BreachesRequest implements SubstituteRequestInterface {

    use StringAccountTrait;

    /**
     * Breached account resource path.
     *
     * @var string
     */
    const BREACHED_ACCOUNT_RESOURCE_PATH = "/breachedaccount/{account}";

    /**
     * Include unverified.
     *
     * @var bool|null
     */
    private $includeUnverified;

    /**
     * Truncate response.
     *
     * @var bool|null
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
     * @return bool|null Returns the include unverified.
     */
    public function getIncludeUnverified(): ?bool {
        return $this->includeUnverified;
    }

    /**
     * {@inheritdoc}
     */
    public function getResourcePath(): string {
        return self::BREACHED_ACCOUNT_RESOURCE_PATH;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituteName(): string {
        return "{account}";
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituteValue(): ?string {
        return $this->getAccount();
    }

    /**
     * Get the truncate response.
     *
     * @return bool|null Returns the truncate response.
     */
    public function getTruncateResponse(): ?bool {
        return $this->truncateResponse;
    }

    /**
     * Set the include unverified.
     *
     * @param bool|null $includeUnverified The include unverified.
     * @return BreachedAccountRequest Returns this breached account request.
     */
    public function setIncludeUnverified(?bool $includeUnverified): BreachedAccountRequest {
        $this->includeUnverified = $includeUnverified;
        return $this;
    }

    /**
     * Set the truncate response.
     *
     * @param bool|null $truncateResponse The truncate response.
     * @return BreachedAccountRequest Returns this breached account request.
     */
    public function setTruncateResponse(?bool $truncateResponse): BreachedAccountRequest {
        $this->truncateResponse = $truncateResponse;
        return $this;
    }
}
