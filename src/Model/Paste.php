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
use WBW\Library\Core\Model\Attribute\StringTitleTrait;

/**
 * Paste.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class Paste {

    use StringTitleTrait;

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
     * Set the date.
     *
     * @param DateTime $date The date.
     * @return Paste Returns this paste.
     */
    public function setDate(DateTime $date = null) {
        $this->date = $date;
        return $this;
    }

    /**
     * Set the email count.
     *
     * @param int $emailCount The email count.
     * @return Paste Returns this paste.
     */
    public function setEmailCount($emailCount) {
        $this->emailCount = $emailCount;
        return $this;
    }

    /**
     * Set the id.
     *
     * @param string $id The id.
     * @return Paste Returns this paste.
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Set the source.
     *
     * @param string $source The source.
     * @return Paste Returns this paste.
     */
    public function setSource($source) {
        $this->source = $source;
        return $this;
    }
}
