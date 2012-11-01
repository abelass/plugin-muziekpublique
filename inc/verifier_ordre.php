<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
function inc_verifier_ordre_dist($where){
    $result_num = sql_select("*","spip_selection_objets", $where,'', "ordre,id_objet");
    $ordre = 0;
                
    // on vérifie l'ordre des objets déjà enregistrés et on corrige si beselection_objetin
                
    while ($row = sql_fetch($result_num)) {
        $ordre++;
        $where = array(
            'id_rubrique='.$row['id_rubrique'],                   
            'id_article='.$row['id_article'],
            );

        sql_updateq("spip_selection_objets",array("ordre" => $ordre),$where) ;
        }
        
    return $ordre;
}
?>