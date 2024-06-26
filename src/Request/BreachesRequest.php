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

use WBW\Library\Common\Traits\Strings\StringDomainTrait;
use WBW\Library\HaveIBeenPwned\Response\AbstractResponse;
use WBW\Library\HaveIBeenPwned\Serializer\RequestSerializer;
use WBW\Library\HaveIBeenPwned\Serializer\ResponseDeserializer;

/**
 * Breaches request.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Request
 */
class BreachesRequest extends AbstractRequest {

    use StringDomainTrait;

    /**
     * Breaches resource path.
     *
     * @var string
     */
    public const BREACHES_RESOURCE_PATH = "/breaches";

    /**
     * {@inheritDoc}
     */
    public function deserializeResponse(string $rawResponse): AbstractResponse {
        return ResponseDeserializer::deserializeBreachesResponse($rawResponse);
    }

    /**
     * {@inheritDoc}
     */
    public function getResourcePath(): string {
        return self::BREACHES_RESOURCE_PATH;
    }

    /**
     * {@inheritDoc}
     */
    public function serializeRequest(): array {
        return RequestSerializer::serializeBreachesRequest($this);
    }
}
