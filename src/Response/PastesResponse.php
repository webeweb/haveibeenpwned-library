<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Response;

use WBW\Library\HaveIBeenPwned\Model\Paste;

/**
 * Pastes response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Response
 */
class PastesResponse extends AbstractResponse {

    /**
     * Pastes.
     *
     * @var Paste[]
     */
    private $pastes;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->setPastes([]);
    }

    /**
     * Add a paste.
     *
     * @param Paste $paste The paste.
     * @return PastesResponse Returns this pastes response.
     */
    public function addPaste(Paste $paste): PastesResponse {
        $this->pastes[] = $paste;
        return $this;
    }

    /**
     * Get the pastes.
     *
     * @return Paste[] Returns the pastes.
     */
    public function getPastes(): array {
        return $this->pastes;
    }

    /**
     * Set the pastes.
     *
     * @param Paste[] $pastes The pastes.
     * @return PastesResponse Returns this pastes response.
     */
    protected function setPastes(array $pastes): PastesResponse {
        $this->pastes = $pastes;
        return $this;
    }
}
