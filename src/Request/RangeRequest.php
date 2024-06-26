<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\HaveIBeenPwned\Request;

use WBW\Library\Common\Provider\SubstituableRequestInterface;
use WBW\Library\Common\Traits\Strings\StringHashTrait;
use WBW\Library\HaveIBeenPwned\Response\AbstractResponse;
use WBW\Library\HaveIBeenPwned\Serializer\ResponseDeserializer;

/**
 * Range request.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Request
 */
class RangeRequest extends AbstractRequest implements SubstituableRequestInterface {

    use StringHashTrait;

    /**
     * Range resource path.
     *
     * @var string
     */
    public const RANGE_RESOURCE_PATH = "/range/{hash}";

    /**
     * {@inheritDoc}
     */
    public function deserializeResponse(string $rawResponse): AbstractResponse {
        return ResponseDeserializer::deserializeRangesResponse($rawResponse);
    }

    /**
     * {@inheritDoc}
     */
    public function getResourcePath(): string {
        return self::RANGE_RESOURCE_PATH;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubstituables(): array {

        return [
            "{hash}" => $this->getHash(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function serializeRequest(): array {
        return [];
    }
}
