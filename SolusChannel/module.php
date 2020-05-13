<?php

class SolusChannel extends IPSModule {

    /*
        Symcon functions
    */

    public function Create()
    {
        parent::Create();

        $this->RegisterPropertyInteger("channel_volume", 0);
        $this->RegisterPropertyInteger("channel_mute", 0);

        $this->RegisterVariableBoolean ("mute", "Muted", $this->Var_Mute(), 10);
        $this->RegisterVariableInteger ("volume", "Volume", $this->Var_Volume(), 11);
    }

    public function Destroy()
    {
        parent::Destroy();
    }

    public function ApplyChanges()
    {
        parent::ApplyChanges();
    }

    public function RequestAction ($Ident, $Value) {
        switch ($Ident) {
            case 'mute':
                SetValue ($this->GetIDForIdent ($Ident), $Value);
                break;
            case 'volume':
                SetValue ($this->GetIDForIdent ($Ident), $Value);
                break;
            default:
                throw new Exception ("Invalid Ident");
        }
    }

    public function Send()
    {
        $this->SendDataToParent(json_encode(Array("DataID" => "{5D8F4A49-874D-2C1A-77CD-6C05106FA557}")));
    }

    public function ReceiveData($JSONString)
    {
        $data = json_decode($JSONString);
        IPS_LogMessage("Device RECV", utf8_decode($data->Buffer));
    }


    /*
        Public functions
    */

    function SetVolume (Int $Volume) {
        // We should build the request here and let the parent send it.
        //$this->SendDataToParent ();
    }

    function Mute (bool $mute) {
        // We should build the request here and let the parent send it.
        //$this->SendDataToParent ();
    }

    /*
        Poller functions
    */

    function UpdateVolumeLevels () {

    }

    /*
        Private functions
    */

    private function Var_Volume () {
        $volume_var_name = 'SolusVolume';

        if (@ !IPS_GetVariableProfile($volume_var_name)) {
            IPS_CreateVariableProfile ($volume_var_name, 1);
            IPS_SetVariableProfileIcon ($volume_var_name, 'Intensity');
            IPS_SetVariableProfileText ($volume_var_name, '', '%');
            IPS_SetVariableProfileValues ($volume_var_name, 0, 100, 3);
        }
        return $volume_var_name;
    }

    private function Var_Mute () {
        $mute_var_name = 'SolusMute';

        if (@ !IPS_GetVariableProfile ($mute_var_name)) {
            IPS_CreateVariableProfile ($volume_var_name, 0);
            IPS_SetVariableProfileIcon ($mute_var_name, 'Power');
        }

        return $mute_var_name;
    }

}


?>