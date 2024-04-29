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
use WBW\Library\Common\Traits\Strings\StringAccountTrait;
use WBW\Library\HaveIBeenPwned\Response\AbstractResponse;
use WBW\Library\HaveIBeenPwned\Serializer\ResponseDeserializer;

/**
 * Paste account request.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Request
 */
class PasteAccountRequest extends AbstractRequest implements SubstituableRequestInterface {

    use StringAccountTrait;

    /**
     * Paste account resource path.
     *
     * @var string
     */
    public const PASTE_ACCOUNT_RESOURCE_PATH = "/pasteaccount/{account}";

    /**
     * {@inheritDoc}
     */
    public function deserializeResponse(string $rawResponse): AbstractResponse {
        return ResponseDeserializer::deserializePastesResponse($rawResponse);
    }

    /**
     * {@inheritDoc}
     */
    public function getResourcePath(): string {
        return self::PASTE_ACCOUNT_RESOURCE_PATH;
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
     * {@inheritDoc}
     */
    public function serializeRequest(): array {
        return [];
    }
}
