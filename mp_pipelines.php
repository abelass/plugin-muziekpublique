<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function mp_formulaire_charger($flux){
    $form = $flux['args']['form']; 
    echo 0;
    if ($form=='joindre_document' AND !_request('exec')){
        echo 1;
        $flux['data']['editable']=true;
    }
    return $flux;
}
?>