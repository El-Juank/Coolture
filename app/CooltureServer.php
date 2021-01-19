<?php

namespace App;

class Server{

    public static function Purgue(){
        //així no ens oblidem cap!
        File::Purgue();
        EventMessage::Purgue();
        RumourMessage::Purgue();
        Message::Purgue();
    }

}

?>