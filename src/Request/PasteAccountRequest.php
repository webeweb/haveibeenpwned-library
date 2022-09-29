<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Request;

use WBW\Library\Provider\Api\SubstituableRequestInterface;
use WBW\Library\Traits\Strings\StringAccountTrait;

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
    const PASTE_ACCOUNT_RESOURCE_PATH = "/pasteaccount/{account}";

    /**
     * {@inheritdoc}
     */
    public function getResourcePath(): string {
        return self::PASTE_ACCOUNT_RESOURCE_PATH;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituables(): array {

        return [
            "{account}" => $this->getAccount(),
        ];
    }
}
