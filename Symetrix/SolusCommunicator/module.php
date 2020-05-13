<?php

class SolusCommunicator extends IPSModule {

    /*
        Basic Symcon functions
    */

    function Create()
    {
        parent::Create();

        $this->RegisterPropertyString("hostaddress", "");
        $this->RegisterPropertyInteger("hostport", 48630);

        //$this->RegisterVariableInteger("socket_" . $_IPS['SELF'], "Socket", '', 0);
        
        $this->InitialSetup();

    }

    function Destroy()
    {
        parent::Destroy();
    }

    function ApplyChanges()
    {
        parent::ApplyChanges();
    }

    public function ReceiveData ($JSONString) {
        IPS_LogMessage ("SolusCOM", "Received data!");
    }

    public function SendDataToChildren (string $data) {
        
    }


    /*
        Public functions
    */


    /*
        Poller functions
    */

    

    /*
        Private functions
    */

    

}


?>