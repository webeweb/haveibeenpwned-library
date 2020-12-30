<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Entity;

/**
 * Breached account interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Entity
 */
interface BreachedAccountInterface extends HaveIBeenPwnedEntityInterface {

    /**
     * Get the account.
     *
     * @return string|null Returns the account.
     */
    public function getHaveIBeenPwnedAccount(): ?string;

    /**
     * Get the domain.
     *
     * @return string|null Returns teh domain.
     */
    public function getHaveIBeenPwnedDomain(): ?string;

    /**
     * Get the include unverified.
     *
     * @return bool|null Returns the include unverified.
     */
    public function getHaveIBeenPwnedIncludeUnverified(): ?bool;

    /**
     * Get the truncate response.
     *
     * @return bool|null Returns the truncate response.
     */
    public function getHaveIBeenPwnedTruncateResponse(): ?bool;
}
