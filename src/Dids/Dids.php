<?php

namespace questbluesdk\Dids;

use questbluesdk\Connect;
use questbluesdk\Dids\Models\DidModel;
use questbluesdk\Models\Responses\ErrorResponse;

/**
 * Class Dids
 *
 * Provides methods for managing DID (Direct Inward Dialing) numbers, including
 * listing available states, rate centers, available DIDs, ordering DIDs, updating DID settings,
 * moving DIDs to fax, and deleting DIDs.
 *
 * This class interacts with the QuestBlue API to perform operations related to DIDs,
 * such as retrieving available numbers, configuring call routing, and setting up
 * emergency services.
 *
 * @package questbluesdk\Dids
 */
class Dids extends Connect
{
    /**
     * Retrieves a list of available states for DID services.
     *
     * @return string|ErrorResponse JSON response from the API or ErrorResponse on failure.
     */
    public function listStates(): string|ErrorResponse
    {
        return $this->query('did/states');
    }

    /**
     * Retrieves rate centers based on the provided tier and state.
     *
     * @param int $tier The DID tier.
     * @param string $state The state abbreviation.
     * @return string|ErrorResponse JSON response from the API or ErrorResponse on failure.
     */
    public function listRateCenters(int $tier, string $state): string|ErrorResponse
    {
        $params = [
            'tier' => $tier,
            'state' => $state
        ];

        return $this->query('did/ratecenters', $params);
    }

    /**
     * Lists available DIDs based on the given DidModel parameters.
     *
     * @param DidModel $didModel Model containing search parameters for available DIDs.
     * @return string|ErrorResponse JSON response from the API or ErrorResponse on failure.
     */
    public function listAvailableDids(DidModel $didModel): string|ErrorResponse
    {
        $params = [
            'type'       => $didModel->type,
            'tier'       => $didModel->tier,
            'state'      => $didModel->location->state, //
            'ratecenter' => $didModel->location->ratecenter,
            'npa'        => $didModel->location->npa,
            'zip'        => $didModel->location->zip,
            'code'       => $didModel->code
        ];

        return $this->query('did/available', $params);
    }

    /**
     * Orders a new DID based on the specified DidModel.
     *
     * @param DidModel $didModel Model containing details for the DID order.
     * @return bool|string|ErrorResponse True on success, error message string or ErrorResponse on failure.
     */
    public function orderDid(DidModel $didModel): bool|string|ErrorResponse
    {
        $params = [
            'tier'        => $didModel->tier,
            'did'         => $didModel->did,
            'note'        => $didModel->note,
            'route2trunk' => $didModel->route2trunk,
            'pin'         => $didModel->pin,
            'lidb'        => $didModel->lidb,
            'cnam'        => $didModel->cnam,
            'e911'        => $didModel->e911,
            'dlda'        => $didModel->dlda,
            //'testmode'   => 'success' //Values: success, warning, error
        ];

        $result = $this->query('did', $params, 'POST');
        return $result !== false ? ($result->error ?? true) : 'DID ordering error';
    }

    /**
     * Retrieves a paginated list of DIDs.
     *
     * @param string $did Optional DID to filter results.
     * @param int $perPage Results per page (5-200).
     * @param int $page Page number.
     * @return string|ErrorResponse JSON response from the API or ErrorResponse on failure.
     */
    public function listDids(string $did = '', int $perPage = 10, int $page = 1): string|ErrorResponse
    {
        $params = [
            'did'      => $did,
            'per_page' => $perPage,
            'page'     => $page
        ];

        return $this->query('did', $params);
    }

    /**
     * Updates the details of a DID using the provided DidModel.
     *
     * @param DidModel $didModel Model containing the updated DID details.
     * @return string|ErrorResponse JSON response from the API or ErrorResponse on failure.
     */
    public function updateDid(DidModel $didModel): string|ErrorResponse
    {
        $params = [
            'did'             => $didModel->did,
            'note'            => $didModel->note,
            'pin'             => $didModel->pin,
            'route2trunk'     => $didModel->route2trunk,
            'forw2did'        => $didModel->forward2did,
            'failover'        => $didModel->failover,
            'lidb'            => $didModel->lidb,
            'cnam'            => $didModel->cnam,
            'e911'            => $didModel->e911,
            'dlda'            => $didModel->dlda,
            'e911_call_alert' => $didModel->e911CallAlert,
            //'testmode'       => 'success' //Values: success, warning, error
        ];

        return $this->query('did', $params, 'PUT');
    }

    /**
     * Moves a DID to fax service.
     *
     * @param string $did The DID to be moved to fax.
     * @return string|ErrorResponse JSON response from the API or ErrorResponse on failure.
     */
    public function move2fax(string $did): string|ErrorResponse
    {
        $params = [
            'did' => $did,
            //'testmode' => 'success' //Values: success, warning, error
        ];

        return $this->query('did/move2fax', $params, 'PUT');
    }

    /**
     * Deletes a DID.
     *
     * @param string $did The DID to be deleted.
     * @return string|ErrorResponse JSON response from the API or ErrorResponse on failure.
     */
    public function deleteDid(string $did): string|ErrorResponse
    {
        $params = [
            'did' => $did,
            //'testmode' => 'success' //Values: success, warning, error
        ];

        return $this->query('did', $params, 'DELETE');
    }
}
