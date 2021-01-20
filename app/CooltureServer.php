<?php

namespace App;

class Server{

    public static function Purgue(){
        //així no ens oblidem cap!
        File::PurgueAll();
       // EventMessage::Purgue();
       // RumourMessage::Purgue();
        Message::Purgue();
        Assistance::Purgue();
    }

}

?>