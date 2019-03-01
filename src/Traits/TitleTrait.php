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
 * Title trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Traits
 */
trait TitleTrait {

    /**
     * Title.
     *
     * @var string
     */
    private $title;

    /**
     * Get the title.
     *
     * @return string Returns the title.
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set the title.
     *
     * @param string $title The title.
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }
}
