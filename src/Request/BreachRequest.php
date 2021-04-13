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

use WBW\Library\Core\Model\Attribute\StringNameTrait;
use WBW\Library\HaveIBeenPwned\API\SubstituteRequestInterface;

/**
 * Breach request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Request
 */
class BreachRequest extends AbstractRequest implements SubstituteRequestInterface {

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
    public function getSubstituteName(): string {
        return "{name}";
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituteValue(): ?string {
        return $this->getName();
    }
}
