<?php
	
	function connexion ()
	{
			$con = mysqli_connect("localhost","root","","troc"); 
			if ($con == null)
			{
				echo "Erreur de connexion au serveur localhost";
				return null;
			}
			else{
				mysqli_set_charset($con, "utf8");
				return $con;
			}
	}
	function deconnexion ($con)
	{
		if ($con != null ) { mysqli_close($con); }
	}
	function verif_connexion ($pseudo, $mdp)
	{
		$requete = "select * from enfant where pseudo ='".$pseudo."' and mdp ='".$mdp."';"; 
		$con = connexion (); 
		if ($con==null) {
			return null; 
		}else {
			$resultat = mysqli_query($con, $requete);
			$ligne = mysqli_fetch_assoc($resultat);
			return $ligne; 
		}
		deconnexion($con);
	}
function afficher_loisir()
{
	$requete="select l.idL, l.libelle, l.lieuL from loisir l;";
		$con = connexion ();
		if($con == null)
		{
			return null;
		}
		else{
			//execution de la requete et recuperer les tuples
			$resultats=mysqli_query($con, $requete);
			//declaration d'un tableau vide
			$lesLignes = array();
			//parcours des resultats et leur insertion dans le tableau lesLignes
			while ($ligne = mysqli_fetch_assoc($resultats))
			{
				$lesLignes[]=$ligne;
			}
			//retourner le tableau lesLignes
			return $lesLignes;
		}
}


?>






