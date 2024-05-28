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
 * Breaches interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Entity
 */
interface BreachesInterface extends HaveIBeenPwnedEntityInterface {

    /**
     * Get the domain.
     *
     * @return string|null Returns teh domain.
     */
    public function getHaveIBeenPwnedDomain(): ?string;
}
