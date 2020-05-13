<?php

class SolusSplitter extends IPSModule {

    /*
        Basic Symcon functions
    */

    function Create()
    {
        parent::Create();

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

    public function SendDataToParent () {
        // This goes to the I/O
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

    private function InitialSetup () {
        $this->ClientSocket();
    }

    private function ClientSocket () {
        // Client Socket: {3CFF0FD9-E306-41DB-9B5A-9D06D38576C3}

        /*
            Socket (IP, Port)	
            Rx : {7A1272A4-CBDB-46EF-BFC6-DCF4A53D2FC7}	
            Tx : {C8792760-65CF-4C53-B5C7-A30FCC84FEFE}
            
            Kann für ServerSocket, UDPSocket (ab 5.0), MulticastSocket (ab 5.0) genutzt werden. Liefert Buffer, ClientIP und ClientPort
        */

        // Get the ID of the variable holding the socket ID by Ident
        if ($id = GetIDForIdent ("socket_" . $_IPS['SELF'])) {
            // If socket ID is 0 there must be no socket, so create it
            if (GetValueInteger ($id) == 0) {
                $socketInstance = IPS_CreateInstance ("{3CFF0FD9-E306-41DB-9B5A-9D06D38576C3}");
                IPS_SetIdent ($socketInstance, "socket_" . $_IPS['SELF']);
                // Set the socket ID in the variable so we can use it next time too
                SetValueInteger ($id, $socketInstance);
            }
        }

        // Check if socket is connected
    }

}


?>