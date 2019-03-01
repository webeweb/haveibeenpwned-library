<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model\Response;

use WBW\Library\HaveIBeenPwned\Model\AbstractResponse;
use WBW\Library\HaveIBeenPwned\Model\Breach;

/**
 * Breaches response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Response
 */
class BreachesResponse extends AbstractResponse {

    /**
     * Breaches.
     *
     * @var Breach[]
     */
    private $breaches;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setBreaches([]);
    }

    /**
     * Add a breach.
     *
     * @param Breach $breach The breach.
     * @return BreachesResponse Returns this breaches response.
     */
    public function addBreach(Breach $breach) {
        $this->breaches[] = $breach;
        return $this;
    }

    /**
     * Get the breaches.
     *
     * @return Breach[] Returns the breaches.
     */
    public function getBreaches() {
        return $this->breaches;
    }

    /**
     * Set the breaches.
     *
     * @param Breach[] $breaches The breaches.
     * @return BreachesResponse Returns this breaches response.
     */
    protected function setBreaches(array $breaches) {
        $this->breaches = $breaches;
        return $this;
    }
}
