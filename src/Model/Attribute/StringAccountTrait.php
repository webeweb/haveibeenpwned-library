<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model\Attribute;

/**
 * String account trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model\Attribute
 */
trait StringAccountTrait {

    /**
     * Account
     *
     * @var string|null
     */
    private $account;

    /**
     * Get the account.
     *
     * @return string|null Returns the account.
     */
    public function getAccount(): ?string {
        return $this->account;
    }

    /**
     * Set the account.
     *
     * @param string|null $account The account.
     */
    public function setAccount(?string $account): self {
        $this->account = $account;
        return $this;
    }
}
