<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function mp_formulaire_charger($flux){
    $form = $flux['args']['form']; 
    if ($form=='joindre_document' AND !_request('exec')){
        $flux['data']['editable']=true;
    }
    return $flux;
}
?>