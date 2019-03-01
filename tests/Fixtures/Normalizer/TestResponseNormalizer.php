<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Fixtures\Normalizer;

use WBW\Library\HaveIBeenPwned\Normalizer\ResponseNormalizer;

/**
 * Test response normalizer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Fixtures\Normalizer
 */
class TestResponseNormalizer extends ResponseNormalizer {

    /**
     * {@inheritdoc}
     */
    public static function denormalizeBreach(array $rawResponse) {
        return parent::denormalizeBreach($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public static function denormalizeDataClass($rawResponse) {
        return parent::denormalizeDataClass($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public static function denormalizePaste(array $rawResponse) {
        return parent::denormalizePaste($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public static function denormalizeRange($rawResponse) {
        return parent::denormalizeRange($rawResponse);
    }
}
