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
use WBW\Library\HaveIBeenPwned\API\HaveIBeenPwnedModelInterface;

/**
 * HaveIBeenPwned paste model.
 *
 * @link https://haveibeenpwned.com/API/v2#PasteModel
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class HaveIBeenPwnedPaste implements HaveIBeenPwnedModelInterface {

    /**
     * Date.
     *
     * @var DateTime
     */
    private $date;

    /**
     * Email count.
     *
     * @var int
     */
    private $emailCount;

    /**
     * Id.
     *
     * @var string
     */
    private $id;

    /**
     * Source.
     *
     * @var string
     */
    private $source;

    /**
     * Title.
     *
     * @var string
     */
    private $title;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setEmailCount(0);
    }

    /**
     * Get the date.
     *
     * @return DateTime Returns the date.
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Get the email count.
     *
     * @return int Returns the email count.
     */
    public function getEmailCount() {
        return $this->emailCount;
    }

    /**
     * Get the id.
     *
     * @return string Returns the id.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the source.
     *
     * @return string Returns the source.
     */
    public function getSource() {
        return $this->source;
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
     * Parse a raw response.
     *
     * @param array $rawResponse The raw response.
     * @return HaveIBeenPwnedPaste Returns the HaveIBeenPwned breach.
     */
    public static function parse($rawResponse) {

        // Parse the dates.
        $date = DateTime::createFromFormat(self::DATETIME_FORMAT_DATE, ArrayHelper::get($rawResponse, "Date", ""), new DateTimeZone("UTC"));

        // Initialize the model.
        $model = new HaveIBeenPwnedPaste();

        $model->setDate(false !== $date ? $date : null);
        $model->setEmailCount(ArrayHelper::get($rawResponse, "EmailCount", 0));
        $model->setId(ArrayHelper::get($rawResponse, "Id"));
        $model->setSource(ArrayHelper::get($rawResponse, "Source"));
        $model->setTitle(ArrayHelper::get($rawResponse, "Title"));

        // Return the model.
        return $model;
    }

    /**
     * Set the date.
     *
     * @param DateTime $date The date.
     * @return HaveIBeenPwnedPaste Returns this HaveIBeenPwned paste.
     */
    public function setDate(DateTime $date = null) {
        $this->date = $date;
        return $this;
    }

    /**
     * Set the email count.
     *
     * @param int $emailCount The email count.
     * @return HaveIBeenPwnedPaste Returns this HaveIBeenPwned paste.
     */
    public function setEmailCount($emailCount) {
        $this->emailCount = $emailCount;
        return $this;
    }

    /**
     * Set the id.
     *
     * @param string $id The id.
     * @return HaveIBeenPwnedPaste Returns this HaveIBeenPwned paste.
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Set the source.
     *
     * @param string $source The source.
     * @return HaveIBeenPwnedPaste Returns this HaveIBeenPwned paste.
     */
    public function setSource($source) {
        $this->source = $source;
        return $this;
    }

    /**
     * Set the title.
     *
     * @param string $title The title.
     * @return HaveIBeenPwnedPaste Returns this HaveIBeenPwned paste.
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

}
