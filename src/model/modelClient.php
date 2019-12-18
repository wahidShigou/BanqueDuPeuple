<?php
	require_once 'bd.php';
	function getClientByIdCompte($idCompte){
		$sql = "SELECT Cl.* FROM client Cl, Compte Cp WHERE Cp.idClient = Cl.id AND Cp.id = '$idCompte'";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}
	function getAllClients(){
		$sql = "SELECT * FROM client";
		global $bd;
		return $bd -> query($sql) -> fetchAll();
	}
	function getClientByCni($cni)
	{
		$sql ="SELECT * FROM client WHERE cni = '$cni'";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}
?>