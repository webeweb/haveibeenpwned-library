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
 * Name trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Traits
 */
trait NameTrait {

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
}
