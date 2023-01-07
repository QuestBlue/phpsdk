<?php

namespace questbluesdk;

class Servers extends Connect {

    public function orderServer($serverType, $params, $note = null)
    {
        $params = [
            'server_type' => $serverType,
            'papams'      => $params,
            'note'        => $note
        ];
        return $this->query('server',  $params, 'POST');
    }

    public function listServers($serverId = null)
    {
        $params = [
            'server_id' => $serverId,
        ];
        return $this->query('server',  $params);
    }
    
    public function upgradeServer($serverId, $serverType)
    {
        $params = [
            'server_id' => $serverId,
            'server_type' => $serverType
        ];
        return $this->query('server/upgrade',  $params, 'POST');
    }

    public function deleteServer($serverId)
    {
        $params = [
            'server_id' => $serverId,
        ]; 
        return $this->query('server',  $params, 'DELETE');
    }

    public function addIp($serverId = null, $ipAddress = null, $note = null)
    {
        $params = [
            'server_id' => $serverId,
            'ip_address' => $ipAddress,
            'note'       => $note
        ]; 
        
        return $this->query('server/addip',  $params, 'PUT');
    }
    
    public function deleteIp($serverId, $ipAddress)
    {
        $params = [
            'server_id' => $serverId,
            'ip_address' => $ipAddress,
        ]; 
               return $this->query('server/deleip',  $params, 'DELETE');
    }
    
    public function manageBackupSchedule($serverId, $mode)
    {
        $params = [
            'server_id' => $serverId,
            'schedule'      => $mode,
        ]; 
        return $this->query('server/managebackupschedule',  $params, 'POST');
    }  
    
    public function listBackups($serverId)
    {
        $params = [
            'server_id' => $serverId,
        ]; 
        return $this->query('server/listbackups',  $params);
    }  
    
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