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
    public static function deserializeBreach(array $rawResponse) {
        return parent::deserializeBreach($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializeDataClass($rawResponse) {
        return parent::deserializeDataClass($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializePaste(array $rawResponse) {
        return parent::deserializePaste($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializeRange($rawResponse) {
        return parent::deserializeRange($rawResponse);
    }
}
