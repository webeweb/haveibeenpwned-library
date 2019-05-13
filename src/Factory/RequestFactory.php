<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Factory;

use WBW\Library\HaveIBeenPwned\Entity\BreachedAccountInterface;
use WBW\Library\HaveIBeenPwned\Entity\BreachesInterface;
use WBW\Library\HaveIBeenPwned\Entity\BreachInterface;
use WBW\Library\HaveIBeenPwned\Entity\PasteAccountInterface;
use WBW\Library\HaveIBeenPwned\Entity\RangeInterface;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\BreachRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\DataClassesRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Model\Request\RangeRequest;

/**
 * Request factory.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Factory
 */
class RequestFactory {

    /**
     * Creates a breach request.
     *
     * @param BreachInterface $breach The breaches.
     * @return BreachRequest Returns the breach request.
     */
    public static function newBreachRequest(BreachInterface $breach) {

        $model = new BreachRequest();
        $model->setName($breach->getHaveIBeenPwnedName());

        return $model;
    }

    /**
     * Creates a breached account request.
     *
     * @param BreachedAccountInterface $breachedAccount The breached account.
     * @return BreachedAccountRequest Returns the breached account request.
     */
    public static function newBreachedAccountRequest(BreachedAccountInterface $breachedAccount) {

        $model = new BreachedAccountRequest();
        $model->setAccount($breachedAccount->getHaveIBeenPwnedAccount());
        $model->setDomain($breachedAccount->getHaveIBeenPwnedDomain());
        $model->setIncludeUnverified($breachedAccount->getHaveIBeenPwnedIncludeUnverified());
        $model->setTruncateResponse($breachedAccount->getHaveIBeenPwnedTruncateResponse());

        return $model;
    }

    /**
     * Creates a breaches request.
     *
     * @param BreachesInterface $breaches The breaches.
     * @return BreachesRequest Returns the breaches request.
     */
    public static function newBreachesRequest(BreachesInterface $breaches) {

        $model = new BreachesRequest();
        $model->setDomain($breaches->getHaveIBeenPwnedDomain());

        return $model;
    }

    /**
     * Creates a data classes request.
     *
     * @return DataClassesRequest Returns the data classes request.
     */
    public static function newDataClassesRequest() {
        return new DataClassesRequest();
    }

    /**
     * Creates a paste account request.
     *
     * @param PasteAccountInterface $pasteAccount The paste account.
     * @return PasteAccountRequest Returns the paste account request.
     */
    public static function newPasteAccountRequest(PasteAccountInterface $pasteAccount) {

        $model = new PasteAccountRequest();
        $model->setAccount($pasteAccount->getHaveIBeenPwnedAccount());

        return $model;
    }

    /**
     * Creates a range request.
     *
     * @param RangeInterface $range The range.
     * @return RangeRequest Returns the range request.
     */
    public static function newRangeRequest(RangeInterface $range) {

        $model = new RangeRequest();
        $model->setHash($range->getHaveIBeenPwnedHash());

        return $model;
    }
}
