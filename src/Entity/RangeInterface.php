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

namespace WBW\Library\HaveIBeenPwned\Entity;

/**
 * Range interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Entity
 */
interface RangeInterface extends HaveIBeenPwnedEntityInterface {

    /**
     * Get the hash.
     *
     * @return string|null Returns the hash.
     */
    public function getHaveIBeenPwnedHash(): ?string;
}
