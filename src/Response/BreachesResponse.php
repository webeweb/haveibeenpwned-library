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

use WBW\Library\HaveIBeenPwned\Model\Breach;

/**
 * Breaches response.
 *
 * @author webeweb <https://github.com/webeweb>
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
        parent::__construct();

        $this->setBreaches([]);
    }

    /**
     * Add a breach.
     *
     * @param Breach $breach The breach.
     * @return BreachesResponse Returns this breaches response.
     */
    public function addBreach(Breach $breach): BreachesResponse {
        $this->breaches[] = $breach;
        return $this;
    }

    /**
     * Get the breaches.
     *
     * @return Breach[] Returns the breaches.
     */
    public function getBreaches(): array {
        return $this->breaches;
    }

    /**
     * Set the breaches.
     *
     * @param Breach[] $breaches The breaches.
     * @return BreachesResponse Returns this breaches response.
     */
    protected function setBreaches(array $breaches): BreachesResponse {
        $this->breaches = $breaches;
        return $this;
    }
}
