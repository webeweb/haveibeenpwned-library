<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\API;

/**
 * HaveIBeenPwned request interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\API
 */
interface HaveIBeenPwnedRequestInterface {

    /**
     * Endpoint.
     *
     * @var string
     */
    const ENDPOINT = "https://haveibeenpwned.com/api/v2";

    /**
     * Get the resource path.
     *
     * @return string Returns the resource path.
     */
    public function getResourcePath();

    /**
     * Convert into an array representing this instance.
     *
     * @return array Returns the array representing this instance.
     */
    public function toArray();
}
