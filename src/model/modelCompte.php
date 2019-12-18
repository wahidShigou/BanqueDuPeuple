<?php
    require_once 'bd.php';
    function insererClient($cni, $nom, $prenom, $adresse,  $tel)
    {
        $lastId = lastInsertIdForTable("client");

        $insert = "INSERT INTO client (id,cni,nom,prenom,adresse,tel) VALUES ('$lastId','$cni','$nom','$prenom','$adresse','$tel')";
        /*
            Ou bien 
            $insert = "INSERT INTO client VALUES (null,$cni,$nom,$prenom,$adresse,$tel)";
        */
        global $bd;
        $bd -> exec($insert);
        return $bd -> lastInsertId();
    }
    function ajoutCompte($numero, $dateCreation, $solde, $idClient, $idGestCompte)
    {
        //$idClient = insererClient();
        $lastId = lastInsertIdForTable("compte");
       $insert = "INSERT INTO compte VALUES ('$lastId','$numero','$dateCreation','$solde',$idClient,$idGestCompte)";
        global $bd;
        $bd -> exec($insert);
        return $bd -> lastInsertId();
    }
    function genererNumero(){
        $sql = "SELECT max(id) FROM compte";
        global $bd;
        $array =  $bd -> query($sql) -> fetch();
        if($array == NULL){
            $id = 1;
        }else{
            $array[0]++;
            $id = $array[0];
        }
        $numero = "FSN_".date('d').date('m').date('Y')."_C".$id;
        return $numero;
    }
    // Creer une methode findCompteByNumero($numero).
    function findCompteByNumero($numero){
        $sql = "SELECT * FROM compte WHERE numero='$numero'";
        global $bd;
        return $bd -> query($sql) -> fetch();
    }
    // Creer une methode qui retourne la liste des comptes (getAllCompte).
    function getAllCompte(){
        $sql = "SELECT * FROM compte";
        global $bd;
        return $bd -> query($sql) -> fetchall();
    }
    function getAllCompteAvecClients(){
        $sql = "SELECT compte.*, nom, prenom FROM compte,client WHERE compte.idClient = client.id";
        global $bd;
        return $bd -> query($sql) -> fetchall();
    }
    function changeEtat($idCompte){
        $sql ="SELECT etat FROM compte WHERE id='$idCompte'";
        global $bd;
        $etat = $bd -> query($sql) -> fetch();
        if ($etat[0] == 1) {
            $sql = "UPDATE compte set etat = 0 WHERE id='$idCompte' ";
            return $bd -> exec($sql);
        }else{
            $sql = "UPDATE compte set etat = 1 WHERE id='$idCompte' ";
            return $bd -> exec($sql);
        }
    }
    function getNumCompteByIdOp($idOp)
    {
        $sql ="SELECT numero FROM compte WHERE id = (SELECT idCompte FROM operation WHERE id='$idOp')";
        global $bd;
        return $bd -> query($sql) -> fetch();
    }
    function getComptesByIdClient($idCli){
        $sql = "SELECT CP.*, U.nom, U.prenom FROM compte CP, client CL, utilisateur U WHERE CP.idClient = CL.id AND CP.idGestCompte = U.id AND CL.id ='$idCli'";
        global $bd;
        return $bd -> query($sql) ->fetchAll();
    }
?>