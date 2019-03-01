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
 * Hash trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Traits
 */
trait HashTrait {

    /**
     * Hash.
     *
     * @var string
     */
    private $hash;

    /**
     * Get the hash.
     *
     * @return string Returns the hash.
     */
    public function getHash() {
        return $this->hash;
    }

    /**
     * Set the hash.
     *
     * @param string $hash The hash.
     */
    public function setHash($hash) {
        $this->hash = $hash;
        return $this;
    }
}
