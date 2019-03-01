<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Traits;

/**
 * Domain trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Traits
 */
trait DomainTrait {

    /**
     * Domain.
     *
     * @var string
     */
    private $domain;

    /**
     * Get the domain.
     *
     * @return string Returns teh domain.
     */
    public function getDomain() {
        return $this->domain;
    }

    /**
     * Set the domain.
     *
     * @param string $domain The domain.
     */
    public function setDomain($domain) {
        $this->domain = $domain;
        return $this;
    }
}
