<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Fixtures\Serializer;

use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Model\DataClass;
use WBW\Library\HaveIBeenPwned\Model\Paste;
use WBW\Library\HaveIBeenPwned\Model\Range;
use WBW\Library\HaveIBeenPwned\Serializer\ResponseDeserializer;

/**
 * Test response deserializer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Fixtures\Serializer
 */
class TestResponseDeserializer extends ResponseDeserializer {

    /**
     * {@inheritdoc}
     */
    public static function deserializeBreach(array $rawResponse): Breach {
        return parent::deserializeBreach($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializeDataClass(string $rawResponse): DataClass {
        return parent::deserializeDataClass($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializePaste(array $rawResponse): Paste {
        return parent::deserializePaste($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializeRange(string $rawResponse): Range {
        return parent::deserializeRange($rawResponse);
    }
}
