<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function action_dissocier_document_publique_dist($arg=null){
    if(is_null($arg)){
        $securiser_action = charger_fonction('securiser_action', 'inc');
        $arg = $securiser_action();
    }

    $arg = explode('-',$arg);

    list($id_objet, $objet, $document) = $arg;
    $suppr=false;
    if (count($arg)>3 AND $arg[3]=='suppr')
        $suppr = true;
    if (count($arg)>4 AND $arg[4]=='safe')
        $check = true;

    include_spip('action/dissocier_document');
        
    dissocier_document($document, $objet, $id_objet, $suppr, $check);

}


?>
