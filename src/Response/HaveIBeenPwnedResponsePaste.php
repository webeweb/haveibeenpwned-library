<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Response;

use WBW\Library\HaveIBeenPwned\API\HaveIBeenPwnedResponseInterface;
use WBW\Library\HaveIBeenPwned\Helper\HaveIBeenPwnedHelper;
use WBW\Library\HaveIBeenPwned\Model\HaveIBeenPwnedPaste;

/**
 * HaveIBeenPwned response "Paste".
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Response
 */
class HaveIBeenPwnedResponsePaste implements HaveIBeenPwnedResponseInterface {

    /**
     * Pastes.
     *
     * @var HaveIBeenPwnedPaste[]
     */
    private $pastes;

    /**
     * Constructor.
     */
    public function __construct($rawResponse) {
        $this->setPastes([]);
        $this->parse($rawResponse);
    }

    /**
     * Add a paste.
     *
     * @param HaveIBeenPwnedPaste $paste The paste.
     * @return HaveIBeenPwnedResponsePaste Returns this response "Paste".
     */
    public function addPaste(HaveIBeenPwnedPaste $paste) {
        $this->pastes[] = $paste;
        return $this;
    }

    /**
     * Get the pastes.
     *
     * @return HaveIBeenPwnedPaste[] Returns the pastes.
     */
    public function getPastes() {
        return $this->pastes;
    }

    /**
     * {@inheritdoc}
     */
    protected function parse($rawResponse) {

        // Clean the raw response.
        $cleanedResponse = HaveIBeenPwnedHelper::cleanResponse($rawResponse);

        // Decode the raw response.
        $response = json_decode($cleanedResponse, true);

        // Handle each response item.
        foreach ($response as $current) {

            // Initialize the model.
            $model = HaveIBeenPwnedPaste::parse($current);

            // Add the model.
            $this->addPaste($model);
        }
    }

    /**
     * Set the pastes.
     *
     * @param HaveIBeenPwnedPaste[] $pastes The pastes.
     * @return HaveIBeenPwnedResponsePaste Returns this response "Paste".
     */
    protected function setPastes(array $pastes) {
        $this->pastes = $pastes;
        return $this;
    }

}
