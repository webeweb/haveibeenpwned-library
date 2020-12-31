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
use WBW\Library\Core\Model\Attribute\StringIdTrait;
use WBW\Library\Core\Model\Attribute\StringTitleTrait;

/**
 * Paste.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class Paste {

    use StringIdTrait;
    use StringTitleTrait;

    /**
     * Date.
     *
     * @var DateTime|null
     */
    private $date;

    /**
     * Email count.
     *
     * @var int|null
     */
    private $emailCount;

    /**
     * Source.
     *
     * @var string|null
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
     * @return DateTime|null Returns the date.
     */
    public function getDate(): ?DateTime {
        return $this->date;
    }

    /**
     * Get the email count.
     *
     * @return int|null Returns the email count.
     */
    public function getEmailCount(): ?int {
        return $this->emailCount;
    }

    /**
     * Get the source.
     *
     * @return string|null Returns the source.
     */
    public function getSource(): ?string {
        return $this->source;
    }

    /**
     * Set the date.
     *
     * @param DateTime|null $date The date.
     * @return Paste Returns this paste.
     */
    public function setDate(?DateTime $date): Paste {
        $this->date = $date;
        return $this;
    }

    /**
     * Set the email count.
     *
     * @param int|null $emailCount The email count.
     * @return Paste Returns this paste.
     */
    public function setEmailCount(?int $emailCount): Paste {
        $this->emailCount = $emailCount;
        return $this;
    }

    /**
     * Set the source.
     *
     * @param string|null $source The source.
     * @return Paste Returns this paste.
     */
    public function setSource(?string $source): Paste {
        $this->source = $source;
        return $this;
    }
}
