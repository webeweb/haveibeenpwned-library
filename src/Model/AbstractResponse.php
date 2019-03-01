<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model;

use WBW\Library\HaveIBeenPwned\API\ResponseInterface;

/**
 * Abstract response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model
 * @abstract
 */
abstract class AbstractResponse implements ResponseInterface {

    /**
     * Raw response.
     *
     * @var string
     */
    private $rawResponse;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the raw response.
     *
     * @return string Returns the raw response.
     */
    public function getRawResponse() {
        return $this->rawResponse;
    }

    /**
     * Set the raw response.
     *
     * @param string $rawResponse The raw response.
     * @return AbstractResponse Returns this response.
     */
    public function setRawResponse($rawResponse) {
        $this->rawResponse = $rawResponse;
        return $this;
    }
}
