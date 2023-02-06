<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Request;

use WBW\Library\HaveIBeenPwned\Response\AbstractResponse;
use WBW\Library\HaveIBeenPwned\Serializer\ResponseDeserializer;

/**
 * Data classes request.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Request
 */
class DataClassesRequest extends AbstractRequest {

    /**
     * Data classes resource path.
     *
     * @var string
     */
    const DATA_CLASSES_RESOURCE_PATH = "/dataclasses";

    /**
     * {@inheritdoc}
     */
    public function deserializeResponse(string $rawResponse): AbstractResponse {
        return ResponseDeserializer::deserializeDataClassesResponse($rawResponse);
    }

    /**
     * {@inheritdoc}
     */
    public function getResourcePath(): string {
        return self::DATA_CLASSES_RESOURCE_PATH;
    }

    /**
     * {@inheritdoc}
     */
    public function serializeRequest(): array {
        return [];
    }
}
