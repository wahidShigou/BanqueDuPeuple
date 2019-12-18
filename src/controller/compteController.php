
<?php
	require_once "../model/modelCompte.php";
	if (isset($_POST['compte']))
	{
		 extract($_POST);
		var_dump($_POST);
		$dateCreation = date("d-m-Y");

		$idCli = insererClient($cni, $nom, $prenom, $adresse,  $tel);
		$idGestCompte = 1;
		$idCompte = ajoutCompte($numero, $dateCreation, $solde, $idCli, $idGestCompte);

		if($idCompte>0)
		{
			header("location:/mesprojets/BanqueDuPeuple/newCompte");
		}
		

	}

 ?>