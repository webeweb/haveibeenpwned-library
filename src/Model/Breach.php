<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model;

use DateTime;
use WBW\Library\HaveIBeenPwned\Traits\DomainTrait;
use WBW\Library\HaveIBeenPwned\Traits\NameTrait;
use WBW\Library\HaveIBeenPwned\Traits\TitleTrait;

/**
 * Breach.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class Breach {

    use DomainTrait;
    use NameTrait;
    use TitleTrait;

    /**
     * Added date.
     *
     * @var DateTime
     */
    private $addedDate;

    /**
     * Breach date.
     *
     * @var DateTime
     */
    private $breachDate;

    /**
     * Data classes.
     *
     * @var DataClass[]
     */
    private $dataClasses;

    /**
     * Description.
     *
     * @var string
     */
    private $description;

    /**
     * Fabricated.
     *
     * @var bool
     */
    private $fabricated;

    /**
     * Modified date.
     *
     * @var DateTime
     */
    private $modifiedDate;

    /**
     * Pwn count.
     *
     * @var int
     */
    private $pwnCount;

    /**
     * Retired.
     *
     * @var bool
     */
    private $retired;

    /**
     * Sensitive.
     *
     * @var bool
     */
    private $sensitive;

    /**
     * Spam list.
     *
     * @var bool
     */
    private $spamList;

    /**
     * Verified.
     *
     * @var bool
     */
    private $verified;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setDataClasses([]);
        $this->setFabricated(false);
        $this->setPwnCount(0);
        $this->setRetired(false);
        $this->setSensitive(false);
        $this->setSpamList(false);
        $this->setVerified(false);
    }

    /**
     * Add a data class.
     *
     * @param DataClass $dataClass The data class.
     * @return Breach Returns this breach.
     */
    public function addDataClass(DataClass $dataClass) {
        $this->dataClasses[] = $dataClass;
        return $this;
    }

    /**
     * Get the added date.
     *
     * @return DateTime Returns the added date.
     */
    public function getAddedDate() {
        return $this->addedDate;
    }

    /**
     * Get the breach date.
     *
     * @return DateTime Returns the breach date.
     */
    public function getBreachDate() {
        return $this->breachDate;
    }

    /**
     * Get the data classes.
     *
     * @return DataClass[] Returns the data classes.
     */
    public function getDataClasses() {
        return $this->dataClasses;
    }

    /**
     * Get the description.
     *
     * @return string Returns the description.
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Get the fabricated.
     *
     * @return bool Returns the fabricated.
     */
    public function getFabricated() {
        return $this->fabricated;
    }

    /**
     * Get the modified date.
     *
     * @return DateTime Returns the modified date.
     */
    public function getModifiedDate() {
        return $this->modifiedDate;
    }

    /**
     * Get the pwn count.
     *
     * @return int Returns the pwn count.
     */
    public function getPwnCount() {
        return $this->pwnCount;
    }

    /**
     * Get the retired.
     *
     * @return bool Returns the retired.
     */
    public function getRetired() {
        return $this->retired;
    }

    /**
     * Get the sensitive.
     *
     * @return bool Returns the sensitive.
     */
    public function getSensitive() {
        return $this->sensitive;
    }

    /**
     * Get the spam list.
     *
     * @return bool Returns the spam list.
     */
    public function getSpamList() {
        return $this->spamList;
    }

    /**
     * Get the verified.
     *
     * @return bool Returns the verified.
     */
    public function getVerified() {
        return $this->verified;
    }

    /**
     * Set the added date.
     *
     * @param DateTime $addedDate The added date.
     * @return Breach Returns this breach.
     */
    public function setAddedDate(DateTime $addedDate = null) {
        $this->addedDate = $addedDate;
        return $this;
    }

    /**
     * Set the breach date.
     *
     * @param DateTime $breachDate The breach date.
     * @return Breach Returns this breach.
     */
    public function setBreachDate(DateTime $breachDate = null) {
        $this->breachDate = $breachDate;
        return $this;
    }

    /**
     * Set the data classes.
     *
     * @param DataClass[] $dataClasses The data classes.
     * @return Breach Returns this breach.
     */
    public function setDataClasses(array $dataClasses) {
        $this->dataClasses = $dataClasses;
        return $this;
    }

    /**
     * Set the description.
     *
     * @param string $description The description.
     * @return Breach Returns this breach.
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * Set the fabricated.
     *
     * @param bool $fabricated The fabricated.
     * @return Breach Returns this breach.
     */
    public function setFabricated($fabricated) {
        $this->fabricated = $fabricated;
        return $this;
    }

    /**
     * Set the modified date.
     *
     * @param DateTime $modifiedDate The modified date.
     * @return Breach Returns this breach.
     */
    public function setModifiedDate(DateTime $modifiedDate = null) {
        $this->modifiedDate = $modifiedDate;
        return $this;
    }

    /**
     * Set the pwn count.
     *
     * @param int $pwnCount The pwn count.
     * @return Breach Returns this breach.
     */
    public function setPwnCount($pwnCount) {
        $this->pwnCount = $pwnCount;
        return $this;
    }

    /**
     * Set the retired.
     *
     * @param bool $retired The retired.
     * @return Breach Returns this breach.
     */
    public function setRetired($retired) {
        $this->retired = $retired;
        return $this;
    }

    /**
     * Set the sensitive.
     *
     * @param bool $sensitive The sensitive.
     * @return Breach Returns this breach.
     */
    public function setSensitive($sensitive) {
        $this->sensitive = $sensitive;
        return $this;
    }

    /**
     * Set the spam list.
     *
     * @param bool $spamList The spam list.
     * @return Breach Returns this breach.
     */
    public function setSpamList($spamList) {
        $this->spamList = $spamList;
        return $this;
    }

    /**
     * Set the verified.
     *
     * @param bool $verified The verified.
     * @return Breach Returns this breach.
     */
    public function setVerified($verified) {
        $this->verified = $verified;
        return $this;
    }
}
