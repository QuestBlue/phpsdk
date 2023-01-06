<?php

namespace questbluesdk;


/*
 * VoIP Servers and QuBe PBX management
 *
 */
class Servers extends Connect {


    /*
     * Order new server
     */
    public function orderServer($serverType, $params, $note = null)
    {
        $params = [
            'server_type' => $serverType,
            'papams'      => $params,
            'note'        => $note
        ];
        return $this->query('server',  $params, 'POST');
    }


    /*
     * List ordered servers
     */
    public function listServers($serverId = null)
    {
        $params = [
            'server_id' => $serverId,
        ];
        return $this->query('server',  $params);
    }
    
    
    /*
     * Upgrade server 
     */
    public function upgradeServer($serverId, $serverType)
    {
        $params = [
            'server_id' => $serverId,
            'server_type' => $serverType
        ];
        return $this->query('server/upgrade',  $params, 'POST');
    }
               
                                      
                        
    /*
     * Remove Server
     */
    public function deleteServer($serverId)
    {
        $params = [
            'server_id' => $serverId,
        ]; 
        return $this->query('server',  $params, 'DELETE');
    }

    
    /*
     * Add IP address allowed to connect SSH to the the server
     */
    public function addIp($serverId = null, $ipAddress = null, $note = null)
    {
        $params = [
            'server_id' => $serverId,
            'ip_address' => $ipAddress,
            'note'       => $note
        ]; 
        
        return $this->query('server/addip',  $params, 'PUT');
    }
    
    
    /*
     * Remove IP address allowed to connect SSH to the the server
     */
    public function deleteIp($serverId, $ipAddress)
    {
        $params = [
            'server_id' => $serverId,
            'ip_address' => $ipAddress,
        ]; 
               return $this->query('server/deleip',  $params, 'DELETE');
    }
    

    /*
     * 
     * (string) $mode, values: none, daily, weekly, monthly, 
     */
    public function manageBackupSchedule($serverId, $mode)
    {
        $params = [
            'server_id' => $serverId,
            'schedule'      => $mode,
        ]; 
        return $this->query('server/managebackupschedule',  $params, 'POST');
    }  
    
    
    /*
     * List available backups
     */
    public function listBackups($serverId)
    {
        $params = [
            'server_id' => $serverId,
        ]; 
        return $this->query('server/listbackups',  $params);
    }  
    
    
    /*
     * Restore server from backup
     */
    public function restoreBackup($serverId, $backupId)
    {
        $params = [
            'server_id' => $serverId,
            'backup_id' => $backupId,
        ]; 
        return $this->query('server/restorebackup',  $params, 'POST');
    }  
    
    
    public function removeBackup($serverId, $backupId)
    {
        $params = [
            'server_id' => $serverId,
            'backup_id' => $backupId,
        ]; 
        return $this->query('server/removebackup',  $params, 'DELETE');
    }  

}