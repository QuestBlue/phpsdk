<?php

namespace questbluesdk;

use questbluesdk\Models\Responses\ErrorResponse;

/**
 * Class Ifaxpro
 * Handles fax-related operations, including managing states, rate centers, ordering, updating, and deleting DIDs,
 * as well as sending faxes and pausing fax accounts.
 */
class Ifaxpro extends Connect
{
    /**
     * List all available states for fax DIDs.
     *
     * @return string|ErrorResponse
     */
    public function listStates(): string|ErrorResponse
    {
        return $this->query('fax/states');
    }

    /**
     * List rate centers within a specified state.
     *
     * @param string $state The state to list rate centers for.
     * @return string|ErrorResponse
     */
    public function listRateCenters(string $state): string|ErrorResponse
    {
        $params = [
            'state' => $state
        ];

        return $this->query('fax/ratecenters', $params);
    }

    /**
     * List available DIDs for fax services based on filtering options.
     *
     * @param string $type DID type.
     * @param string|null $state Optional state filter.
     * @param string|null $ratecenter Optional rate center filter.
     * @param string|null $npa Optional NPA filter.
     * @param string|null $zip Optional ZIP code filter.
     * @param string|null $code Optional code filter.
     * @return string|ErrorResponse
     */
    public function listAvailableDids(
        string $type,
        ?string $state = null,
        ?string $ratecenter = null,
        ?string $npa = null,
        ?string $zip = null,
        ?string $code = null
    ): string|ErrorResponse {
        $params = [
            'type'       => $type,
            'state'      => $state,
            'ratecenter' => $ratecenter,
            'npa'        => $npa,
            'zip'        => $zip,
            'code'       => $code
        ];

        return $this->query('fax/available', $params);
    }

    /**
     * Order a DID for fax services with additional configuration.
     *
     * @param string $did The DID to order.
     * @param string|null $note Optional note for the order.
     * @param string|null $pin Optional PIN for the DID.
     * @param string $faxName The fax account name.
     * @param string $faxEmail The email associated with the fax account.
     * @param string $faxLogin The login for the fax account.
     * @param string $faxPassword The password for the fax account.
     * @param string|null $isFull Optional parameter indicating full feature mode.
     * @param string|null $reportAtt Optional report attachment option.
     * @return string|ErrorResponse|bool Returns true on success, or an error message on failure.
     */
    public function orderDid(
        string $did,
        ?string $note = null,
        ?string $pin = null,
        string $faxName,
        string $faxEmail,
        string $faxLogin,
        string $faxPassword,
        ?string $isFull = null,
        ?string $reportAtt = null
    ): string|ErrorResponse|bool {
        $params = [
            'did'          => $did,
            'note'         => $note,
            'pin'          => $pin,
            'fax_name'     => $faxName,
            'fax_email'    => $faxEmail,
            'fax_login'    => $faxLogin,
            'fax_password' => $faxPassword,
            'is_full'      => $isFull,
            'report_att'   => $reportAtt,
        ];

        $result = $this->query('fax', $params, 'POST');
        if ($result === false) {
            return 'DID ordering error';
        }

        return $result->error ?? true;
    }

    /**
     * List ordered DIDs with pagination options.
     *
     * @param string|null $did Optional DID filter.
     * @param int $perPage Number of records per page.
     * @param int $page Page number.
     * @return string|ErrorResponse
     */
    public function listDids(?string $did = '', int $perPage = 10, int $page = 1): string|ErrorResponse
    {
        $params = [
            'did'      => $did,
            'per_page' => $perPage,
            'page'     => $page
        ];

        return $this->query('fax', $params);
    }

    /**
     * Update DID information.
     *
     * @param array $params Parameters for updating the DID.
     * @return string|ErrorResponse
     */
    public function updateDid(array $params): string|ErrorResponse
    {
        $data = array_merge([
            'did'              => null,
            'note'             => null,
            'pin'              => null,
            'unset_acc'        => null,
            'fax_name'         => null,
            'fax_email'        => null,
            'fax_login'        => null,
            'fax_password'     => null,
            'is_full'          => null,
            'report_att'       => null,
            'post2url'         => null,
            'ata_mac_address'  => null,
        ], $params);

        return $this->query('fax', $data, 'PUT');
    }

    /**
     * Pause or unpause a fax account for a specific DID.
     *
     * @param string $did The DID to modify.
     * @param string $action Action to perform (pause or unpause).
     * @return string|ErrorResponse
     */
    public function pauseFaxAcc(string $did, string $action): string|ErrorResponse
    {
        $params = [
            'did'    => $did,
            'action' => $action
        ];

        return $this->query('fax/pause', $params, 'PUT');
    }

    /**
     * Delete a DID for fax services.
     *
     * @param string $did The DID to delete.
     * @return string|ErrorResponse
     */
    public function deleteDid(string $did): string|ErrorResponse
    {
        $params = [
            'did' => $did,
        ];

        return $this->query('fax', $params, 'DELETE');
    }

    /**
     * Send a fax from one DID to another with an optional file attachment.
     *
     * @param string $didFrom The sender's DID.
     * @param string $didTo The recipient's DID.
     * @param string $fpath Path to the file to be faxed.
     * @return string|ErrorResponse
     */
    public function sendFax(string $didFrom, string $didTo, string $fpath): string|ErrorResponse
    {
        $params = [
            'did_from'  => $didFrom,
            'did_to'    => $didTo,
            'file'      => base64_encode(file_get_contents($fpath)),
            'filename'  => base64_encode(pathinfo($fpath)['basename']),
        ];

        return $this->query('fax/send', $params, 'POST');
    }

    /**
     * Move a DID from fax to voice service.
     *
     * @param string $did The DID to move.
     * @return string|ErrorResponse
     */
    public function move2voice(string $did): string|ErrorResponse
    {
        $params = [
            'did' => $did,
        ];

        return $this->query('fax/move2voice', $params, 'PUT');
    }
}
