 <?php
  include '../../../header.php';
  require_once '../../model/modelClient.php';
  $clients = getAllClients();
?>
<h1>LISTE DES CLIENTS<h1/>

<table class="table table-striped table-dark monTableau">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">CIN</th>
      <th scope="col">NOM</th>
      <th scope="col">PRENOM</th>
      <th scope="col">ADRESSE</th>
      <th scope="col">TELEPHONE</th>
      <th scope="col">ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
      foreach ($clients as $key => $client) {
      $i++;     
        ?>

         <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $client['cni'] ?></td>
          <td><?= $client['nom'] ?></td>
          <td><?= $client['prenom'] ?></td>
          <td><?= $client['adresse'] ?></td>
          <td><?= $client['tel'] ?></td>
          <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">AJOUTER NOUVEAU COMPTE</button>
          <button type="button" class="btn btn-secondary btn-sm">LISTE DES COMPTES</button>
          <button type="button" class="btn btn-primary btn-sm">SUPPRIMER</button></td>
        </tr>
      <?php } ?>
     
  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Numero de compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Solde</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Ajouter Compte</button>
      </div>
    </div>
  </div>
</div>



<?php
  include '../../../footer.php';