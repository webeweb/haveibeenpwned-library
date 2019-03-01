<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\API;

/**
 * Substitute request interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\API
 */
interface SubstituteRequestInterface {

    /**
     * Get the substitute name.
     *
     * @return string Returns the substitute name.
     */
    public function getSubstituteName();

    /**
     * Get the substitute value.
     *
     * @return string Returns the substitute value.
     */
    public function getSubstituteValue();
}
