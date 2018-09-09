<?php 

/**
 * La fonction closestToZeror retourne la valeur la plus proche de zéro qui appartient au tableau tab.
 * 
 * Si tab est vide, elle retourne 0 (zéro).
 * Si deux nombres sont tout aussi proches de zéro, le nombre positif est considéré comme étant le plus proche de zéro.
 *
 * @param mixed [] $tab le tableau dont on veut connaitre la valeur la plus proche de 0 (zéro)
 * 
 * @throws Exception si le tableu fourni en entrée est nul ou invalide, ou si une des valeurs du tableau est invalide (non comprise entre -243 et 5526 ou pas un nombre)
 * 
 * @return mixed $result la valeur du tableau la plus proche de 0 (zéro)
 **/

function closestToZero($tab){
    $result = 0 ; // on initialise $result à 0
    if ($tab === null){
        throw new Exception('Le tableau est nul.');
    }
    if (!is_array($tab)){
        throw new Exception('Le tableau est non valide.');
    }
    if(!empty($tab)){ // si le tableau est vide, il n'y a pas de traitement et on retourne 0
        $result = $tab[0] ; //on fixe $result avec la première valeue dans le tableau
        for($i = 0 ; $i < count($tab) ; $i++){
            if(!is_numeric($tab[$i]) or $tab[$i] < -273 or $tab[$i] > 5526){
                throw new Exception('Température invalide.');
            }
            $absTab = abs($tab[$i]) ;
            $absResult = abs($result) ; 
            // à chaque itération, on regarde la valeur courante du tableau et on la compare à $result
            // si en valeur absolue elle est plus petite, ou égale mais positive en valeur, alors on écrase $result avec la valeur courante du tableau
            if($absTab < $absResult or ($absTab == $absResult and $tab[$i] > $result)){
                $result = $tab[$i] ;
            }
        }
    }
    return $result;
}

// on teste la fonction avec le tableau $ts
$ts = array(7, -10, 13, 8, 4, -7.2, -12, -3.7, 3.5, -9.6, 6.5, -1.7, 6.2, 7);
try {
    echo closestToZero($ts);
}catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

?>