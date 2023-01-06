<?php
require_once('./Connect.php');


/*
 * VoIP Servers and QuBe PBX management
 *
 */
class Servers extends Connect {


    /*
     * Order new server
     */
    public function orderServer($server_type, $params, $note = null)
    {
        $params = [
            'server_type' => $server_type,
            'papams'      => $params,
            'note'        => $note
        ];
        return $this->query('server',  $params, 'POST');
    }


    /*
     * List ordered servers
     */
    public function listServers($server_id = null)
    {
        $params = [
            'server_id' => $server_id,
        ];
        return $this->query('server',  $params);
    }
    
    
    /*
     * Upgrade server 
     */
    public function upgradeServer($server_id, $server_type)
    {
        $params = [
            'server_id' => $server_id,
            'server_type' => $server_type
        ];
        return $this->query('server/upgrade',  $params, 'POST');
    }
               
                                      
                        
    /*
     * Remove Server
     */
    public function deleteServer($server_id)
    {
        $params = [
            'server_id' => $server_id,
        ]; 
        return $this->query('server',  $params, 'DELETE');
    }

    
    /*
     * Add IP address allowed to connect SSH to the the server
     */
    public function addIp($server_id = null, $ip_address = null, $note = null)
    {
        $params = [
            'server_id' => $server_id,
            'ip_address' => $ip_address,
            'note'       => $note
        ]; 
        
        return $this->query('server/addip',  $params, 'PUT');
    }
    
    
    /*
     * Remove IP address allowed to connect SSH to the the server
     */
    public function deleteIp($server_id, $ip_address)
    {
        $params = [
            'server_id' => $server_id,
            'ip_address' => $ip_address,
        ]; 
               return $this->query('server/deleip',  $params, 'DELETE');
    }
    

    /*
     * 
     * (string) $mode, values: none, daily, weekly, monthly, 
     */
    public function manageBackupSchedule($server_id, $mode)
    {
        $params = [
            'server_id' => $server_id,
            'schedule'      => $mode,
        ]; 
        return $this->query('server/managebackupschedule',  $params, 'POST');
    }  
    
    
    /*
     * List available backups
     */
    public function listBackups($server_id)
    {
        $params = [
            'server_id' => $server_id,
        ]; 
        return $this->query('server/listbackups',  $params);
    }  
    
    
    /*
     * Restore server from backup
     */
    public function restoreBackup($server_id, $backup_id)
    {
        $params = [
            'server_id' => $server_id,
            'backup_id' => $backup_id,
        ]; 
        return $this->query('server/restorebackup',  $params, 'POST');
    }  
    
    
    public function removeBackup($server_id, $backup_id)
    {
        $params = [
            'server_id' => $server_id,
            'backup_id' => $backup_id,
        ]; 
        return $this->query('server/removebackup',  $params, 'DELETE');
    }  

}


// Call the class methods
$api = new Servers;


/*
$params = ['qube', [
    'password'  => 'myPassword',
    'email'     => 'some@email.com',
]];
*/
/*
$params = ['vodia', [
    'password'  => 'myPassword',
    'email'     => 'some@email.com',
    'company'   => 'Company name',
    'did'       => '1231231231',
]];
*/
 /*$params = ['vital-pbx', [
    'email'             => 'some@email.com',
]];
*/
/*
$params = ['sbc', [
    'sbcuser_password'  => 'myPassword',
    'email'             => 'some@email.com',
]];
*/             
# $response = $api->orderServer('small', $params, 'test server');


// List ordered servers
$response = $api->listServers();

// Remove server
# $response = $api->deleteServer(11861);

// Add IP address allowed to connect to the the server
# $response = $api->addIp(11846, '109.251.2.180');

// Remove IP address allowed to connect to the the server
# $response = $api->deleteIp(11846, '109.251.2.180');

// $server_type vaalues: medium, large, enterprise, enterpriseplusplus
# $response = $api->upgradeServer(11846, 'large');   
  
# $response = $api->manageBackupSchedule(11846, 'daily');
# $response = $api->listBackups(11846);
# $response = $api->restoreBackup(11846, 759);
# $response = $api->removeBackup(11846, 759);

echo '<pre>';
print_r($response);

