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
 * String domain trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model\Attribute
 */
trait StringDomainTrait {

    /**
     * Domain.
     *
     * @var string|null
     */
    private $domain;

    /**
     * Get the domain.
     *
     * @return string|null Returns teh domain.
     */
    public function getDomain(): ?string {
        return $this->domain;
    }

    /**
     * Set the domain.
     *
     * @param string|null $domain The domain.
     */
    public function setDomain(?string $domain): self {
        $this->domain = $domain;
        return $this;
    }
}
