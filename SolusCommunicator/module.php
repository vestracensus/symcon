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

        

    }

    function Destroy()
    {
        parent::Destroy();
    }

    function ApplyChanges()
    {
        parent::ApplyChanges();
    }

    public function ForwardData($JSONString)
    {
        $data = json_decode($JSONString);
        IPS_LogMessage("IO FRWD", utf8_decode($data->Buffer));
    }

    public function Send(string $Text)
    {
        $this->SendDataToChildren(json_encode(Array("DataID" => "{B1735420-2A23-E15B-60CE-3E85E57E21AC}", "Buffer" => $Text)));
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