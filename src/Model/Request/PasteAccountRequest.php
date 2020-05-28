<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model\Request;

use WBW\Library\HaveIBeenPwned\API\SubstituteRequestInterface;
use WBW\Library\HaveIBeenPwned\Model\AbstractRequest;
use WBW\Library\HaveIBeenPwned\Model\Attribute\StringAccountTrait;

/**
 * Paste account request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model\Request
 */
class PasteAccountRequest extends AbstractRequest implements SubstituteRequestInterface {

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
    public function getResourcePath() {
        return self::PASTE_ACCOUNT_RESOURCE_PATH;
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
}
