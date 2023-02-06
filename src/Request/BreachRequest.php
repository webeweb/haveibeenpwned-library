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
use WBW\Library\Traits\Strings\StringNameTrait;

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
    const BREACH_RESOURCE_PATH = "/breach/{name}";

    /**
     * {@inheritdoc}
     */
    public function getResourcePath(): string {
        return self::BREACH_RESOURCE_PATH;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituables(): array {

        return [
            "{name}" => $this->getName(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function serializeRequest(): array {
        return [];
    }
}
