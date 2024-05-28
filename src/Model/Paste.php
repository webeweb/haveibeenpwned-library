<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\HaveIBeenPwned\Model;

use WBW\Library\Common\Traits\DateTimes\DateTimeDateTrait;
use WBW\Library\Common\Traits\Strings\StringIdTrait;
use WBW\Library\Common\Traits\Strings\StringSourceTrait;
use WBW\Library\Common\Traits\Strings\StringTitleTrait;

/**
 * Paste.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Model
 */
class Paste {

    use DateTimeDateTrait;
    use StringIdTrait;
    use StringSourceTrait;
    use StringTitleTrait;

    /**
     * Email count.
     *
     * @var int|null
     */
    private $emailCount;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setEmailCount(0);
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
     * Set the email count.
     *
     * @param int|null $emailCount The email count.
     * @return Paste Returns this paste.
     */
    public function setEmailCount(?int $emailCount): Paste {
        $this->emailCount = $emailCount;
        return $this;
    }
}
