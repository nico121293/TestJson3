<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=mysql-nico121293.alwaysdata.net;dbname=nico121293_1;charset=utf8', '145965', 'phoebe');
}

catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer
// On récupère tout le contenu de la table MenuSemaine
$reponse = $bdd->query('SELECT * FROM MenuSemaine');

//On créer un tableau pour stocker les infos
$Info = array();

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
	$Recup = [
		'ID'=>$donnees['ID'],
		'Jour'=>$donnees['Jour'],
		'Plat'=>$donnees['Plat'],
		'Prix'=>$donnees['Prix']	
	];		
	
	array_push($Info, $Recup);
}
$reponse->closeCursor(); // Termine le traitement de la requête

echo json_encode($Info);
?>
