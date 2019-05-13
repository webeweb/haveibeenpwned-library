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
     * @return string Returns the account.
     */
    public function getHaveIBeenPwnedAccount();

    /**
     * Get the domain.
     *
     * @return string Returns teh domain.
     */
    public function getHaveIBeenPwnedDomain();

    /**
     * Get the include unverified.
     *
     * @return bool Returns the include unverified.
     */
    public function getHaveIBeenPwnedIncludeUnverified();

    /**
     * Get the truncate response.
     *
     * @return bool Returns the truncate response.
     */
    public function getHaveIBeenPwnedTruncateResponse();
}
