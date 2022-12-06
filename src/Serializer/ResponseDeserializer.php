<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Serializer;

use DateTime;
use DateTimeZone;
use WBW\Library\HaveIBeenPwned\Api\ResponseInterface;
use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Model\DataClass;
use WBW\Library\HaveIBeenPwned\Model\Paste;
use WBW\Library\HaveIBeenPwned\Model\Range;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Response\RangesResponse;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * Response deserializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\HaveIBeenPwned\Serializer
 */
class ResponseDeserializer {

    /**
     * Clean a raw response.
     *
     * @param string $rawResponse The raw response.
     * @return string Returns the cleaned raw response.
     */
    public static function cleanResponse(string $rawResponse): string {

        $searches = [":True", ":False", ": True", ": False"];
        $replaces = [":true", ":false", ":true", ":false"];

        return str_replace($searches, $replaces, $rawResponse);
    }

    /**
     * Deserializes a breach.
     *
     * @param array $data The data.
     * @return Breach Returns a breach.
     */
    protected static function deserializeBreach(array $data): Breach {

        $addedDate    = DateTime::createFromFormat(ResponseInterface::DATETIME_FORMAT_ADDED, ArrayHelper::get($data, "AddedDate", ""), new DateTimeZone("UTC"));
        $breachDate   = DateTime::createFromFormat(ResponseInterface::DATETIME_FORMAT_BREACH, ArrayHelper::get($data, "BreachDate", ""), new DateTimeZone("UTC"));
        $modifiedDate = DateTime::createFromFormat(ResponseInterface::DATETIME_FORMAT_MODIFIED, ArrayHelper::get($data, "ModifiedDate", ""), new DateTimeZone("UTC"));

        $model = new Breach();
        $model->setName(ArrayHelper::get($data, "Name"));
        $model->setTitle(ArrayHelper::get($data, "Title"));
        $model->setDomain(ArrayHelper::get($data, "Domain"));
        $model->setBreachDate(false !== $breachDate ? $breachDate : null);
        $model->setAddedDate(false !== $addedDate ? $addedDate : null);
        $model->setModifiedDate(false !== $modifiedDate ? $modifiedDate : null);
        $model->setPwnCount(ArrayHelper::get($data, "PwnCount", 0));
        $model->setDescription(ArrayHelper::get($data, "Description"));
        $model->setVerified(ArrayHelper::get($data, "IsVerified", false));
        $model->setSensitive(ArrayHelper::get($data, "IsSensitive", false));
        $model->setRetired(ArrayHelper::get($data, "IsRetired", false));
        $model->setSpamList(ArrayHelper::get($data, "IsSpamList", false));

        foreach (ArrayHelper::get($data, "DataClasses", []) as $current) {
            $model->addDataClass(static::deserializeDataClass($current));
        }

        return $model;
    }

    /**
     * Deserializes a breaches response.
     *
     * @param string $rawResponse The raw response.
     * @return BreachesResponse Returns the breaches response.
     */
    public static function deserializeBreachesResponse(string $rawResponse): BreachesResponse {

        $cleanedResponse = static::cleanResponse($rawResponse);

        $response = json_decode($cleanedResponse, true);

        $model = new BreachesResponse();
        $model->setRawResponse($rawResponse);

        if (true === ArrayHelper::isObject($response)) {
            $response = [$response];
        }

        foreach ($response as $current) {
            if (true === is_string($current)) {
                $current = ["Name" => $current];
            }
            $model->addBreach(static::deserializeBreach($current));
        }

        return $model;
    }

    /**
     * Deserializes a data class.
     *
     * @param string $rawResponse The raw response.
     * @return DataClass Returns a data class.
     */
    protected static function deserializeDataClass(string $rawResponse): DataClass {

        $model = new DataClass();
        $model->setName($rawResponse);

        return $model;
    }

    /**
     * Deserializes a data classes response.
     *
     * @param string $rawResponse The raw response.
     * @return DataClassesResponse Returns the data classes response.
     */
    public static function deserializeDataClassesResponse(string $rawResponse): DataClassesResponse {

        $response = json_decode($rawResponse, true);

        $model = new DataClassesResponse();
        $model->setRawResponse($rawResponse);

        foreach ($response as $current) {
            $model->addDataClass(static::deserializeDataClass($current));
        }

        return $model;
    }

    /**
     * Deserializes a paste.
     *
     * @param array $data The data.
     * @return Paste Returns the paste.
     */
    protected static function deserializePaste(array $data): Paste {

        $date = DateTime::createFromFormat(ResponseInterface::DATETIME_FORMAT_DATE, ArrayHelper::get($data, "Date", ""), new DateTimeZone("UTC"));

        $model = new Paste();
        $model->setSource(ArrayHelper::get($data, "Source"));
        $model->setId(ArrayHelper::get($data, "Id"));
        $model->setTitle(ArrayHelper::get($data, "Title"));
        $model->setDate(false !== $date ? $date : null);
        $model->setEmailCount(ArrayHelper::get($data, "EmailCount", 0));

        return $model;
    }

    /**
     * Deserializes a pastes response.
     *
     * @param string $rawResponse The raw response.
     * @return PastesResponse Returns the pastes response.
     */
    public static function deserializePastesResponse(string $rawResponse): PastesResponse {

        $cleanedResponse = static::cleanResponse($rawResponse);

        $response = json_decode($cleanedResponse, true);

        $model = new PastesResponse();
        $model->setRawResponse($rawResponse);

        foreach ($response as $current) {
            $model->addPaste(static::deserializePaste($current));
        }

        return $model;
    }

    /**
     * Deserializes a range.
     *
     * @param string $rawResponse The raw response.
     * @return Range Returns a range.
     */
    protected static function deserializeRange(string $rawResponse): Range {

        $response = explode(":", $rawResponse);

        if (count($response) < 2) {
            return new Range();
        }

        $model = new Range();
        $model->setHash(trim($response[0]));
        $model->setCount(intval($response[1]));

        return $model;
    }

    /**
     * Deserializes a ranges response.
     *
     * @param string $rawResponse The raw response.
     * @return RangesResponse Returns the ranges response.
     */
    public static function deserializeRangesResponse(string $rawResponse): RangesResponse {

        $response = explode("\n", $rawResponse);

        $model = new RangesResponse();
        $model->setRawResponse($rawResponse);

        foreach ($response as $current) {
            $model->addRange(static::deserializeRange($current));
        }

        return $model;
    }
}
