<?php
require_once '../../model/modelCompte.php';
    $comptesAvecCllients = getAllCompteAvecClients();
  include '../../../header.php';
?>
<h1>BANQUE DU PEUPLES<h1/>

<a href="/mesprojets/BanqueDuPeuple/newCompte"><button type="button" class="btn btn-primary btn-sm">NOUVEAU COMPTE</button></a>

<table class="table table-striped table-dark monTableau">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NUMERO</th>
      <th scope="col">DATE CREATION</th>
      <th scope="col">SOLDE</th>
      <th scope="col">NOM CLIENT</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i = 0;
      foreach ($comptesAvecCllients as $key => $c) {
        $i++;
        ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $c['numero'] ?></td>
            <td><?= $c['dateCreation'] ?></td>
            <td><?= $c['solde'] ?></td>
            <td><?= $c['nom'] ?> <?= $c['prenom'] ?></td>
      <td><button type="button" class="btn btn-primary btn-sm">ACTIVER</button>
          <button type="button" class="btn btn-secondary btn-sm">BLOQUER</button>
      </td>
          </tr>
        <?php
      }
    ?>  </tbody>
</table>

<?php
  include '../../../footer.php';
