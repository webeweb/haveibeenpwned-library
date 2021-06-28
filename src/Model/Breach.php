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
use WBW\Library\Traits\Strings\StringDescriptionTrait;
use WBW\Library\Traits\Strings\StringDomainTrait;
use WBW\Library\Traits\Strings\StringNameTrait;
use WBW\Library\Traits\Strings\StringTitleTrait;

/**
 * Breach.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class Breach {

    use StringDescriptionTrait;
    use StringDomainTrait;
    use StringNameTrait;
    use StringTitleTrait;

    /**
     * Added date.
     *
     * @var DateTime|null
     */
    private $addedDate;

    /**
     * Breach date.
     *
     * @var DateTime|null
     */
    private $breachDate;

    /**
     * Data classes.
     *
     * @var DataClass[]
     */
    private $dataClasses;

    /**
     * Fabricated.
     *
     * @var bool|null
     */
    private $fabricated;

    /**
     * Modified date.
     *
     * @var DateTime|null
     */
    private $modifiedDate;

    /**
     * Pwn count.
     *
     * @var int|null
     */
    private $pwnCount;

    /**
     * Retired.
     *
     * @var bool|null
     */
    private $retired;

    /**
     * Sensitive.
     *
     * @var bool|null
     */
    private $sensitive;

    /**
     * Spam list.
     *
     * @var bool|null
     */
    private $spamList;

    /**
     * Verified.
     *
     * @var bool|null
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
    public function addDataClass(DataClass $dataClass): Breach {
        $this->dataClasses[] = $dataClass;
        return $this;
    }

    /**
     * Get the added date.
     *
     * @return DateTime|null Returns the added date.
     */
    public function getAddedDate(): ?DateTime {
        return $this->addedDate;
    }

    /**
     * Get the breach date.
     *
     * @return DateTime|null Returns the breach date.
     */
    public function getBreachDate(): ?DateTime {
        return $this->breachDate;
    }

    /**
     * Get the data classes.
     *
     * @return DataClass[] Returns the data classes.
     */
    public function getDataClasses(): array {
        return $this->dataClasses;
    }

    /**
     * Get the fabricated.
     *
     * @return bool|null Returns the fabricated.
     */
    public function getFabricated(): ?bool {
        return $this->fabricated;
    }

    /**
     * Get the modified date.
     *
     * @return DateTime|null Returns the modified date.
     */
    public function getModifiedDate(): ?DateTime {
        return $this->modifiedDate;
    }

    /**
     * Get the pwn count.
     *
     * @return int|null Returns the pwn count.
     */
    public function getPwnCount(): ?int {
        return $this->pwnCount;
    }

    /**
     * Get the retired.
     *
     * @return bool|null Returns the retired.
     */
    public function getRetired(): ?bool {
        return $this->retired;
    }

    /**
     * Get the sensitive.
     *
     * @return bool|null Returns the sensitive.
     */
    public function getSensitive(): ?bool {
        return $this->sensitive;
    }

    /**
     * Get the spam list.
     *
     * @return bool|null Returns the spam list.
     */
    public function getSpamList(): ?bool {
        return $this->spamList;
    }

    /**
     * Get the verified.
     *
     * @return bool|null Returns the verified.
     */
    public function getVerified(): ?bool {
        return $this->verified;
    }

    /**
     * Set the added date.
     *
     * @param DateTime|null $addedDate The added date.
     * @return Breach Returns this breach.
     */
    public function setAddedDate(?DateTime $addedDate): Breach {
        $this->addedDate = $addedDate;
        return $this;
    }

    /**
     * Set the breach date.
     *
     * @param DateTime|null $breachDate The breach date.
     * @return Breach Returns this breach.
     */
    public function setBreachDate(?DateTime $breachDate): Breach {
        $this->breachDate = $breachDate;
        return $this;
    }

    /**
     * Set the data classes.
     *
     * @param DataClass[] $dataClasses The data classes.
     * @return Breach Returns this breach.
     */
    public function setDataClasses(array $dataClasses): Breach {
        $this->dataClasses = $dataClasses;
        return $this;
    }

    /**
     * Set the fabricated.
     *
     * @param bool|null $fabricated The fabricated.
     * @return Breach Returns this breach.
     */
    public function setFabricated(?bool $fabricated): Breach {
        $this->fabricated = $fabricated;
        return $this;
    }

    /**
     * Set the modified date.
     *
     * @param DateTime|null $modifiedDate The modified date.
     * @return Breach Returns this breach.
     */
    public function setModifiedDate(?DateTime $modifiedDate): Breach {
        $this->modifiedDate = $modifiedDate;
        return $this;
    }

    /**
     * Set the pwn count.
     *
     * @param int|null $pwnCount The pwn count.
     * @return Breach Returns this breach.
     */
    public function setPwnCount(?int $pwnCount): Breach {
        $this->pwnCount = $pwnCount;
        return $this;
    }

    /**
     * Set the retired.
     *
     * @param bool|null $retired The retired.
     * @return Breach Returns this breach.
     */
    public function setRetired(?bool $retired): Breach {
        $this->retired = $retired;
        return $this;
    }

    /**
     * Set the sensitive.
     *
     * @param bool|null $sensitive The sensitive.
     * @return Breach Returns this breach.
     */
    public function setSensitive(?bool $sensitive): Breach {
        $this->sensitive = $sensitive;
        return $this;
    }

    /**
     * Set the spam list.
     *
     * @param bool|null $spamList The spam list.
     * @return Breach Returns this breach.
     */
    public function setSpamList(?bool $spamList): Breach {
        $this->spamList = $spamList;
        return $this;
    }

    /**
     * Set the verified.
     *
     * @param bool|null $verified The verified.
     * @return Breach Returns this breach.
     */
    public function setVerified(?bool $verified): Breach {
        $this->verified = $verified;
        return $this;
    }
}
