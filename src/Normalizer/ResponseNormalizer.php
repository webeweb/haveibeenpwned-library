<?php

/*
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Normalizer;

use DateTime;
use DateTimeZone;
use WBW\Library\Core\Argument\ArrayHelper;
use WBW\Library\Core\Argument\StringHelper;
use WBW\Library\HaveIBeenPwned\API\ResponseInterface;
use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Model\DataClass;
use WBW\Library\HaveIBeenPwned\Model\Paste;
use WBW\Library\HaveIBeenPwned\Model\Range;
use WBW\Library\HaveIBeenPwned\Model\Response\BreachesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\DataClassesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\PastesResponse;
use WBW\Library\HaveIBeenPwned\Model\Response\RangesResponse;

/**
 * Response normalizer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Normalizer
 */
class ResponseNormalizer {

    /**
     * Clean a raw response.
     *
     * @param string $rawResponse The raw response.
     * @return string Returns the cleaned raw response.
     */
    public static function cleanResponse($rawResponse) {

        //
        $searches = [":True", ":False"];
        $replaces = [":true", ":false"];

        // Return the cleaned raw response.
        return StringHelper::replace($rawResponse, $searches, $replaces);
    }

    /**
     * Denormalize a breach.
     *
     * @param array $rawResponse The raw response.
     * @return Breach Returns a breach.
     */
    protected static function denormalizeBreach(array $rawResponse) {

        $addedDate    = DateTime::createFromFormat(ResponseInterface::DATETIME_FORMAT_ADDED, ArrayHelper::get($rawResponse, "AddedDate", ""), new DateTimeZone("UTC"));
        $breachDate   = DateTime::createFromFormat(ResponseInterface::DATETIME_FORMAT_BREACH, ArrayHelper::get($rawResponse, "BreachDate", ""), new DateTimeZone("UTC"));
        $modifiedDate = DateTime::createFromFormat(ResponseInterface::DATETIME_FORMAT_MODIFIED, ArrayHelper::get($rawResponse, "ModifiedDate", ""), new DateTimeZone("UTC"));

        $model = new Breach();
        $model->setAddedDate(false !== $addedDate ? $addedDate : null);
        $model->setBreachDate(false !== $breachDate ? $breachDate : null);
        $model->setDescription(ArrayHelper::get($rawResponse, "Description"));
        $model->setDomain(ArrayHelper::get($rawResponse, "Domain"));
        $model->setModifiedDate(false !== $modifiedDate ? $modifiedDate : null);
        $model->setName(ArrayHelper::get($rawResponse, "Name"));
        $model->setPwnCount(ArrayHelper::get($rawResponse, "PwnCount", 0));
        $model->setRetired(ArrayHelper::get($rawResponse, "IsRetired", false));
        $model->setSensitive(ArrayHelper::get($rawResponse, "IsSensitive", false));
        $model->setSpamList(ArrayHelper::get($rawResponse, "IsSpamList", false));
        $model->setTitle(ArrayHelper::get($rawResponse, "Title"));
        $model->setVerified(ArrayHelper::get($rawResponse, "IsVerified", false));

        foreach (ArrayHelper::get($rawResponse, "DataClasses", []) as $current) {

            $dataClass = new DataClass();
            $dataClass->setName($current);

            $model->addDataClass($dataClass);
        }

        return $model;
    }

    /**
     * Denormalize a breaches response.
     *
     * @param string $rawResponse The raw response.
     * @return BreachesResponse Returns the breaches response.
     */
    public static function denormalizeBreachesResponse($rawResponse) {

        $cleanedResponse = static::cleanResponse($rawResponse);

        $response = json_decode($cleanedResponse, true);

        $model = new BreachesResponse();
        $model->setRawResponse($rawResponse);

        foreach ($response as $current) {
            if (true === is_string($current)) {
                $current = ["Name" => $current];
            }
            $model->addBreach(static::denormalizeBreach($current));
        }

        return $model;
    }

    /**
     * Denormalize a data class.
     *
     * @param string $rawResponse The raw response.
     * @return DataClass Returns a data class.
     */
    protected static function denormalizeDataClass($rawResponse) {

        $model = new DataClass();
        $model->setName($rawResponse);

        return $model;
    }

    /**
     * Denormalize a data classes response.
     *
     * @param string $rawResponse The raw response.
     * @return DataClassesResponse Returns the data classes response.
     */
    public static function denormalizeDataClassesResponse($rawResponse) {

        $response = json_decode($rawResponse, true);

        $model = new DataClassesResponse();
        $model->setRawResponse($rawResponse);

        foreach ($response as $current) {
            $model->addDataClass(static::denormalizeDataClass($current));
        }

        return $model;
    }

    /**
     * Denormalize a paste.
     *
     * @param array $rawResponse The raw response.
     * @return Paste Returns the paste.
     */
    protected static function denormalizePaste(array $rawResponse) {

        $date = DateTime::createFromFormat(ResponseInterface::DATETIME_FORMAT_DATE, ArrayHelper::get($rawResponse, "Date", ""), new DateTimeZone("UTC"));

        $model = new Paste();
        $model->setDate(false !== $date ? $date : null);
        $model->setEmailCount(ArrayHelper::get($rawResponse, "EmailCount", 0));
        $model->setId(ArrayHelper::get($rawResponse, "Id"));
        $model->setSource(ArrayHelper::get($rawResponse, "Source"));
        $model->setTitle(ArrayHelper::get($rawResponse, "Title"));

        return $model;
    }

    /**
     * Denormalize a pastes response.
     *
     * @param string $rawResponse The raw response.
     * @return PastesResponse Returns the pastes response.
     */
    public static function denormalizePastesResponse($rawResponse) {

        $cleanedResponse = static::cleanResponse($rawResponse);

        $response = json_decode($cleanedResponse, true);

        $model = new PastesResponse();
        $model->setRawResponse($rawResponse);

        foreach ($response as $current) {
            $model->addPaste(static::denormalizePaste($current));
        }

        return $model;
    }

    /**
     * Denormalize a range.
     *
     * @param string $rawResponse The raw response.
     * @return Range Returns a range.
     */
    protected static function denormalizeRange($rawResponse) {

        $response = explode(":", $rawResponse);

        if (count($response) < 2) {
            return new Range();
        }

        $model = new Range();
        $model->setCount(intval($response[1]));
        $model->setHash(trim($response[0]));

        return $model;
    }

    /**
     * Denormalize a ranges response.
     *
     * @param string $rawResponse The raw response.
     * @return RangesResponse Returns the ranges response.
     */
    public static function denormalizeRangesResponse($rawResponse) {

        $response = explode("\n", $rawResponse);

        $model = new RangesResponse();
        $model->setRawResponse($rawResponse);

        foreach ($response as $current) {
            $model->addRange(static::denormalizeRange($current));
        }

        return $model;
    }
}
