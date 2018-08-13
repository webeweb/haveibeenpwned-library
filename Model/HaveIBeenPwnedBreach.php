<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Model;

use DateTime;
use DateTimeZone;
use WBW\Library\Core\Helper\Argument\ArrayHelper;

/**
 * HaveIBeenPwned breach model.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class HaveIBeenPwnedBreach {

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
     * @var array
     */
    private $dataClasses;

    /**
     * Descirption.
     *
     * @var string
     */
    private $description;

    /**
     * Domain.
     *
     * @var string
     */
    private $domain;

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
     * Name.
     *
     * @var string
     */
    private $name;

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
     * Title.
     *
     * @var string
     */
    private $title;

    /**
     * Verified.
     *
     * @var bool
     */
    private $verified;

    /**
     * Constructor.
     *
     * @param array $rawResponse The raw response.
     */
    public function __construct($rawResponse) {
        $this->setDataClasses([]);
        $this->setFabricated(false);
        $this->setPwnCount(0);
        $this->setRetired(false);
        $this->setSensitive(false);
        $this->setSpamList(false);
        $this->setVerified(false);

        $this->parse($rawResponse);
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
     * @return array Returns the data classes.
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
     * Get the domain.
     *
     * @return string Returns the domain.
     */
    public function getDomain() {
        return $this->domain;
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
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getName() {
        return $this->name;
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
     * Get the title.
     *
     * @return string Returns the title.
     */
    public function getTitle() {
        return $this->title;
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
     * Parse the raw response.
     *
     * @param array $rawResponse The raw response.
     * @return void
     */
    protected function parse($rawResponse) {

        // Parse the date.
        $addedDate    = DateTime::createFromFormat("Y-m-d\TH:i\Z", ArrayHelper::get($rawResponse, "AddedDate", ""), new DateTimeZone("UTC"));
        $breachDate   = DateTime::createFromFormat("Y-m-d", ArrayHelper::get($rawResponse, "BreachDate", ""), new DateTimeZone("UTC"));
        $modifiedDate = DateTime::createFromFormat("Y-m-d\TH:i\Z", ArrayHelper::get($rawResponse, "ModifiedDate", ""), new DateTimeZone("UTC"));

        // Initialize the model.
        $this->setAddedDate(false !== $addedDate ? $addedDate : null);
        $this->setBreachDate(false !== $breachDate ? $breachDate : null);
        $this->setDescription(ArrayHelper::get($rawResponse, "Description"));
        $this->setDataClasses(ArrayHelper::get($rawResponse, "DataClasses", []));
        $this->setDomain(ArrayHelper::get($rawResponse, "Domain"));
        $this->setModifiedDate(false !== $modifiedDate ? $modifiedDate : null);
        $this->setName(ArrayHelper::get($rawResponse, "Name"));
        $this->setPwnCount(ArrayHelper::get($rawResponse, "PwnCount", 0));
        $this->setRetired(ArrayHelper::get($rawResponse, "IsRetired", false));
        $this->setSensitive(ArrayHelper::get($rawResponse, "IsSensitive", false));
        $this->setSpamList(ArrayHelper::get($rawResponse, "IsSpamList", false));
        $this->setTitle(ArrayHelper::get($rawResponse, "Title"));
        $this->setVerified(ArrayHelper::get($rawResponse, "IsVerified", false));
    }

    /**
     * Set the added date.
     *
     * @param DateTime $addedDate The added date.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setAddedDate(DateTime $addedDate = null) {
        $this->addedDate = $addedDate;
        return $this;
    }

    /**
     * Set the breach date.
     * @param DateTime $breachDate The breach date.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setBreachDate(DateTime $breachDate = null) {
        $this->breachDate = $breachDate;
        return $this;
    }

    /**
     * Set the data classes.
     *
     * @param array $dataClasses The data classes.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setDataClasses(array $dataClasses) {
        $this->dataClasses = $dataClasses;
        return $this;
    }

    /**
     * Set the description.
     *
     * @param string $description The description.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * Set the domain.
     *
     * @param string $domain The domain.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setDomain($domain) {
        $this->domain = $domain;
        return $this;
    }

    /**
     * Set the fabricated.
     *
     * @param bool $fabricated The fabricated.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setFabricated($fabricated) {
        $this->fabricated = $fabricated;
        return $this;
    }

    /**
     * Set the modified date.
     *
     * @param DateTime $modifiedDate The modified date.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setModifiedDate(DateTime $modifiedDate = null) {
        $this->modifiedDate = $modifiedDate;
        return $this;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the pwn count.
     *
     * @param int $pwnCount The pwn count.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setPwnCount($pwnCount) {
        $this->pwnCount = $pwnCount;
        return $this;
    }

    /**
     * Set the retired.
     *
     * @param bool $retired The retired.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setRetired($retired) {
        $this->retired = $retired;
        return $this;
    }

    /**
     * Set the sensitive.
     *
     * @param bool $sensitive The sensitive.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setSensitive($sensitive) {
        $this->sensitive = $sensitive;
        return $this;
    }

    /**
     * Set the spam list.
     *
     * @param bool $spamList The spam list.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setSpamList($spamList) {
        $this->spamList = $spamList;
        return $this;
    }

    /**
     * Set the title.
     *
     * @param string $title The title.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the verified.
     *
     * @param bool $verified The verified.
     * @return HaveIBeenPwnedBreach Returns this HaveIBeenPwned breach.
     */
    protected function setVerified($verified) {
        $this->verified = $verified;
        return $this;
    }

}
