<?php

declare(strict_types = 1);

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Request;

use WBW\Library\Common\Provider\SubstituableRequestInterface;
use WBW\Library\Common\Traits\Strings\StringNameTrait;
use WBW\Library\HaveIBeenPwned\Response\AbstractResponse;
use WBW\Library\HaveIBeenPwned\Serializer\ResponseDeserializer;

/**
 * Breach request.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Request
 */
class BreachRequest extends AbstractRequest implements SubstituableRequestInterface {

    use StringNameTrait;

    /**
     * Breach resource path.
     *
     * @var string
     */
    public const BREACH_RESOURCE_PATH = "/breach/{name}";

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
        return self::BREACH_RESOURCE_PATH;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubstituables(): array {

        return [
            "{name}" => $this->getName(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function serializeRequest(): array {
        return [];
    }
}
