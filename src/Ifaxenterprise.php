<?php

namespace questbluesdk;

use questbluesdk\Models\Responses\ErrorResponse;

/**
 * Class Ifaxenterprise
 * Handles operations related to enterprise fax DIDs, including managing DIDs, groups, users, permissions, file uploads, and sending faxes.
 */
class Ifaxenterprise extends Connect
{
    /**
     * Order a DID with optional note and PIN.
     *
     * @param string $did The DID to order.
     * @param string $sname Service name.
     * @param string|null $note Optional note for the order.
     * @param string|null $pin Optional PIN for the order.
     * @return string|ErrorResponse|bool
     */
    public function orderDid(string $did, string $sname, ?string $note = null, ?string $pin = null): string|ErrorResponse|bool
    {
        $params = [
            'did'   => $did,
            'sname' => $sname,
            'note'  => $note,
            'pin'   => $pin,
        ];

        $result = $this->query('fax2', $params, 'POST');
        if ($result === false) {
            return 'DID ordering error';
        }

        return $result->error ?? true;
    }

    /**
     * List all DIDs with pagination options.
     *
     * @param array $params Filtering and pagination parameters.
     * @return string|ErrorResponse
     */
    public function listDids(array $params = []): string|ErrorResponse
    {
        $data = array_merge([
            'did'      => '',
            'per_page' => 10,
            'page'     => 1
        ], $params);

        return $this->query('fax2', $data);
    }

    /**
     * Update information for a specific DID.
     *
     * @param array $params Parameters for updating the DID.
     * @return string|ErrorResponse
     */
    public function updateDid(array $params): string|ErrorResponse
    {
        $data = array_merge([
            'did'             => null,
            'sname'           => null,
            'note'            => null,
            'pin'             => null,
            'post2url'        => null,
            'ata_mac_address' => null,
        ], $params);

        return $this->query('fax2', $data, 'PUT');
    }

    /**
     * Pause or unpause a fax account.
     *
     * @param string $did The DID to pause or unpause.
     * @param string $action Action to perform (e.g., "pause" or "unpause").
     * @return string|ErrorResponse
     */
    public function pauseFaxAcc(string $did, string $action): string|ErrorResponse
    {
        $params = [
            'did'    => $did,
            'action' => $action
        ];

        return $this->query('fax2/pause', $params, 'PUT');
    }

    /**
     * Delete a specific DID.
     *
     * @param string $did The DID to delete.
     * @return string|ErrorResponse
     */
    public function deleteDid(string $did): string|ErrorResponse
    {
        $params = [
            'did' => $did,
        ];

        return $this->query('fax2', $params, 'DELETE');
    }

    /**
     * Create a new fax group.
     *
     * @param string $sname Service name.
     * @param string $name Group name.
     * @return string|ErrorResponse
     */
    public function createGroup(string $sname, string $name): string|ErrorResponse
    {
        $params = [
            'sname' => $sname,
            'name'  => $name,
        ];

        return $this->query('fax2/group', $params, 'POST');
    }

    /**
     * List all groups or a specific group by service name.
     *
     * @param string|null $sname Optional service name to filter.
     * @return string|ErrorResponse
     */
    public function listGroups(?string $sname = null): string|ErrorResponse
    {
        $params = [
            'sname' => $sname,
        ];

        return $this->query('fax2/group', $params);
    }

    /**
     * Update information for a specific group.
     *
     * @param string $sname Original service name.
     * @param string $snameNew New service name.
     * @param string $nameNew New group name.
     * @return string|ErrorResponse
     */
    public function updateGroup(string $sname, string $snameNew, string $nameNew): string|ErrorResponse
    {
        $params = [
            'sname'     => $sname,
            'sname_new' => $snameNew,
            'name_new'  => $nameNew,
        ];

        return $this->query('fax2/group', $params, 'PUT');
    }

    /**
     * Delete a specific group by service name.
     *
     * @param string $sname Service name of the group to delete.
     * @return string|ErrorResponse
     */
    public function deleteGroup(string $sname): string|ErrorResponse
    {
        $params = [
            'sname' => $sname,
        ];

        return $this->query('fax2/group', $params, 'DELETE');
    }

    /**
     * Create a new user for fax services.
     *
     * @param string $faxLogin User login.
     * @param string $faxPassword User password.
     * @param string $sname Service name.
     * @param string $faxName User's first name.
     * @param string|null $faxLname User's last name.
     * @param string|null $faxEmail User's email.
     * @param string $isAdmin Flag to set as admin (default: 'off').
     * @return string|ErrorResponse
     */
    public function createUser(string $faxLogin, string $faxPassword, string $sname, string $faxName, ?string $faxLname = null, ?string $faxEmail = null, string $isAdmin = 'off'): string|ErrorResponse
    {
        $params = [
            'fax_login'    => $faxLogin,
            'fax_password' => $faxPassword,
            'sname'        => $sname,
            'fax_name'     => $faxName,
            'fax_lname'    => $faxLname,
            'fax_email'    => $faxEmail,
            'is_admin'     => $isAdmin,
        ];

        return $this->query('fax2/user', $params, 'POST');
    }

    /**
     * List all users or filter by specific login or service name.
     *
     * @param string|null $faxLogin Optional login filter.
     * @param string|null $sname Optional service name filter.
     * @return string|ErrorResponse
     */
    public function listUsers(?string $faxLogin = null, ?string $sname = null): string|ErrorResponse
    {
        $params = [
            'fax_login' => $faxLogin,
            'sname'     => $sname,
        ];

        return $this->query('fax2/user', $params);
    }

    /**
     * Update user information for fax services.
     *
     * @param string $faxLogin Original user login.
     * @param string $newFaxLogin New login.
     * @param string|null $faxPassword New password.
     * @param string|null $faxName New first name.
     * @param string|null $faxLname New last name.
     * @param string|null $faxEmail New email.
     * @param string|null $isAdmin New admin status.
     * @return string|ErrorResponse
     */
    public function updateUser(string $faxLogin, string $newFaxLogin, ?string $faxPassword = null, ?string $faxName = null, ?string $faxLname = null, ?string $faxEmail = null, ?string $isAdmin = null): string|ErrorResponse
    {
        $params = [
            'fax_login'      => $faxLogin,
            'fax_login_new'  => $newFaxLogin,
            'fax_password'   => $faxPassword,
            'fax_name'       => $faxName,
            'fax_lname'      => $faxLname,
            'fax_email'      => $faxEmail,
            'is_admin'       => $isAdmin,
        ];

        return $this->query('fax2/user', $params, 'PUT');
    }

    /**
     * Delete a user from the fax service by their login.
     *
     * @param string $faxLogin The login of the user to delete.
     * @return string|ErrorResponse Returns a success message or an error response on failure.
     */
    public function deleteUser(string $faxLogin): string|ErrorResponse
    {
        $params = [
            'fax_login' => $faxLogin,
            //'testmode'     => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax2/user', $params, 'DELETE');
    }

    /**
     * Update permissions for a specific user and DID.
     *
     * @param string $faxLogin User login.
     * @param string $did The DID associated with the user.
     * @param bool $allowSend Permission to allow sending.
     * @param bool $allowDelete Permission to allow deletion.
     * @param bool $allowListIn Permission to list incoming faxes.
     * @param bool $allowListOut Permission to list outgoing faxes.
     * @return string|ErrorResponse
     */
    public function updateUserPermissions(string $faxLogin, string $did, bool $allowSend, bool $allowDelete, bool $allowListIn, bool $allowListOut): string|ErrorResponse
    {
        $params = [
            'fax_login'      => $faxLogin,
            'did'            => $did,
            'allow_send'     => $allowSend,
            'allow_delete'   => $allowDelete,
            'allow_list_in'  => $allowListIn,
            'allow_list_out' => $allowListOut,
        ];

        return $this->query('fax2/permit', $params, 'POST');
    }

    /**
     * List permissions for a specific user or DID.
     *
     * @param string|null $faxLogin Optional user login filter.
     * @param string|null $did Optional DID filter.
     * @return string|ErrorResponse
     */
    public function listUserPermissions(?string $faxLogin = null, ?string $did = null): string|ErrorResponse
    {
        $params = [
            'fax_login' => $faxLogin,
            'did'       => $did,
        ];

        return $this->query('fax2/permit', $params);
    }

    /**
     * Delete permissions for a specific user and DID.
     *
     * @param string $faxLogin User login.
     * @param string|null $did Optional DID.
     * @return string|ErrorResponse
     */
    public function deleteUserPermissions(string $faxLogin, ?string $did = null): string|ErrorResponse
    {
        $params = [
            'fax_login' => $faxLogin,
            'did'       => $did,
        ];

        return $this->query('fax2/permit', $params, 'DELETE');
    }

    /**
     * Update email permissions for a specific DID.
     *
     * @param string $did The DID to update permissions for.
     * @param string $email The email to grant permissions to.
     * @param bool $allowSend Permission to allow sending.
     * @param bool $allowReceive Permission to allow receiving.
     * @return string|ErrorResponse
     */
    public function updateEmailPermissions(string $did, string $email, bool $allowSend, bool $allowReceive): string|ErrorResponse
    {
        $params = [
            'did'           => $did,
            'email'         => $email,
            'allow_send'    => $allowSend,
            'allow_receive' => $allowReceive,
        ];

        return $this->query('fax2/email', $params, 'POST');
    }

    /**
     * List email permissions for a specific DID and email.
     *
     * @param string $did The DID to filter.
     * @param string $email The email to filter.
     * @return string|ErrorResponse
     */
    public function listEmailPermissions(string $did, string $email): string|ErrorResponse
    {
        $params = [
            'did'   => $did,
            'email' => $email,
        ];

        return $this->query('fax2/email', $params);
    }

    /**
     * Delete email permissions for a specific DID and email.
     *
     * @param string $did The DID to delete permissions for.
     * @param string $email The email to delete permissions for.
     * @return string|ErrorResponse
     */
    public function deleteEmailPermissions(string $did, string $email): string|ErrorResponse
    {
        $params = [
            'did'   => $did,
            'email' => $email,
        ];

        return $this->query('fax2/email', $params, 'DELETE');
    }

    /**
     * Upload a file for faxing.
     *
     * @param string $fpath Path to the file to upload.
     * @return string|ErrorResponse
     */
    public function uploadFile(string $fpath): string|ErrorResponse
    {
        $params = [
            'file'     => base64_encode(file_get_contents($fpath)),
            'filename' => base64_encode(basename($fpath)),
        ];

        return $this->query('fax2/upload', $params, 'POST');
    }

    /**
     * Send a fax from one DID to another with a specified file.
     *
     * @param string $didFrom Sender's DID.
     * @param string $didTo Recipient's DID.
     * @param string $fileId ID of the uploaded file to send.
     * @return string|ErrorResponse
     */
    public function sendFax(string $didFrom, string $didTo, string $fileId): string|ErrorResponse
    {
        $params = [
            'did_from' => $didFrom,
            'did_to'   => $didTo,
            'file_id'  => $fileId,
        ];

        return $this->query('fax2/send', $params, 'POST');
    }

    /**
     * Retrieve fax history with optional filters.
     *
     * @param string|null $did Optional DID filter.
     * @param string|null $service Optional service type filter.
     * @param string|null $type Optional type filter.
     * @param string|null $faxId Optional fax ID filter.
     * @param string|null $period Optional period filter.
     * @return string|ErrorResponse
     */
    public function faxHistory(?string $did = null, ?string $service = null, ?string $type = null, ?string $faxId = null, ?string $period = null): string|ErrorResponse
    {
        $params = [
            'did'     => $did,
            'service' => $service,
            'type'    => $type,
            'fax_id'  => $faxId,
            'period'  => $period,
        ];

        return $this->query('faxhistory', $params);
    }

    /**
     * Download a specific fax based on its ID and period.
     *
     * @param string $faxId The fax ID to download.
     * @param string $period The period associated with the fax.
     * @return string|ErrorResponse
     */
    public function faxDownload(string $faxId, string $period): string|ErrorResponse
    {
        $params = [
            'fax_id' => $faxId,
            'period' => $period,
        ];

        return $this->query('faxdownload', $params);
    }

}
