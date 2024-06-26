<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\HaveIBeenPwned\Request;

use WBW\Library\Common\Provider\SubstituableRequestInterface;
use WBW\Library\Common\Traits\Strings\StringAccountTrait;
use WBW\Library\HaveIBeenPwned\Response\AbstractResponse;
use WBW\Library\HaveIBeenPwned\Serializer\RequestSerializer;
use WBW\Library\HaveIBeenPwned\Serializer\ResponseDeserializer;

/**
 * Breached account request.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Request
 */
class BreachedAccountRequest extends BreachesRequest implements SubstituableRequestInterface {

    use StringAccountTrait;

    /**
     * Breached account resource path.
     *
     * @var string
     */
    public const BREACHED_ACCOUNT_RESOURCE_PATH = "/breachedaccount/{account}";

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
     * {@inheritDoc}
     */
    public function deserializeResponse(string $rawResponse): AbstractResponse {
        return ResponseDeserializer::deserializeBreachesResponse($rawResponse);
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
     * {@inheritDoc}
     */
    public function getResourcePath(): string {
        return self::BREACHED_ACCOUNT_RESOURCE_PATH;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubstituables(): array {

        return [
            "{account}" => $this->getAccount(),
        ];
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
     * {@inheritDoc}
     */
    public function serializeRequest(): array {
        return RequestSerializer::serializeBreachedAccountRequest($this);
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
