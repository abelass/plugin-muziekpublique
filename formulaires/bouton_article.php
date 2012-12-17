<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function formulaires_bouton_article_charger_dist($id_article,$langue) {
    $valeurs = array(
	"id_article"	=> $id_article,
	"langue"	=> $langue,
	"id_rubrique"	=> "",	
	"eliminer_rubrique"	=> "",			 		
    );
    $valeurs['eliminer_rubrique'] = _request('eliminer_rubrique');
    $valeurs['_hidden'] .= "<input type='hidden' name='id_article' value='$id_article' />";
    $valeurs['_hidden'] .= "<input type='hidden' name='lang' value='$langue' />";    

    return $valeurs;
}



/* @annotation: Actualisation de la base de donnée */
function formulaires_bouton_article_traiter_dist($id_article=''){
$id_rubrique=_request('id_rubrique');
$lang=_request('lang');

if (_request('ok')){

			// Pas moyen de faire fonctionner le LIMIT 0,1 et l'ordre inverse avec sqlite
			
			$where = array( 
			"id_rubrique='$id_rubrique'",		
			);

			$result_num = sql_select("ordre", "spip_pb_selection", $where, "ordre");
			$ordre = 0;
			while ($row_num = sql_fetch($result_num)) {
				$ordre = $row_num["ordre"];
			}
			$ordre ++;
			sql_insertq("spip_pb_selection", array('id_rubrique' => $id_rubrique, 'id_article'=>$id_article, 'ordre'=>$ordre, 'lang'=>$lang));

	}



}
?>