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

namespace WBW\Library\HaveIBeenPwned\Entity;

/**
 * Breach interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Entity
 */
interface BreachInterface extends HaveIBeenPwnedEntityInterface {

    /**
     * Get the name.
     *
     * @return string|null Returns the name.
     */
    public function getHaveIBeenPwnedName(): ?string;
}
