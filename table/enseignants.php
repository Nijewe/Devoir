<?php

$i=1; 

?>

<div class="tab-pane fade content" id="v-pills-enseignants" role="tabpanel" aria-labelledby="v-pills-enseignants-tab" tabindex="0">

    <div class="tableau">
      <table class="table">
          <h3>Liste des enseignants</h3>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Prenom</th>
              <th scope="col">Email</th>
              <th scope="col">Telephone</th>
              <th scope="col">Addresse</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($enseignants as $enseignant){?>
              <tr>
                <th><?= $i ?></th>
                <td><?= $enseignant['nom'] ?></td>
                <td><?= $enseignant['prenom'] ?></td>
                <td><?= $enseignant['email'] ?></td>
                <td><?= $enseignant['telephone'] ?></td>
                <td><?= $enseignant['adresse'] ?></td>
                <td>
                  <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modif_enseignant_<?= $enseignant['id'] ?>">Modifier</button>
                  <div class="modal fade" id="modif_enseignant_<?= $enseignant['id'] ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Modifier les informations</h1>
                          <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="data/enseignants/modifier.php" method="post" id="item-form" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $enseignant['id'] ?>">
                            <div>
                              <label for="nom">Nom de famille</label>
                              <input type="text" name="nom" id="nom" required value="<?= $enseignant['nom'] ?>">
                            </div>
            
                            <div>
                              <label for="prenom">Prenom</label>
                              <input type="text" name="prenom" id="prenom" required value="<?= $enseignant['prenom'] ?>">
                            </div>
            
                            <div>
                              <label for="email">Email</label>
                              <input type="email" name="email" id="email" required value="<?= $enseignant['email'] ?>">
                            </div>
            
                            <div>
                              <label for="telephone">Numero de telephone</label>
                              <input type="number" name="telephone" id="telephone" value="<?= $enseignant['telephone'] ?>">
                            </div>
            
                            <div>
                              <label for="addresse">Addresse</label>
                              <input type="text" name="adresse" id="adresse" value="<?= $enseignant['adresse'] ?>">
                            </div>
            
                            <button type="submit" class="btn btn-primary">Soumettre</button>
                            
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_enseignant_<?= $enseignant['id'] ?>">Supprimer</button>
                  <div class="modal fade" id="delete_enseignant_<?= $enseignant['id'] ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Suppression</h1>
                          <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <text>Etes-vous certain de vouloir supprimer cette ligne</text>
                          <form action="data/enseignants/supprimer.php" method="post" id="item-form" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $enseignant['id'] ?>">
            
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                            
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>

            <?php $i++;  } ?>
          </tbody>
      </table>
    </div>

    <svg version="1.1" id="Layer_1" data-bs-toggle="modal" data-bs-target="#add_enseignant" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 119.72" style="enable-background:new 0 0 122.88 119.72" xml:space="preserve"><g><path d="M22.72,0h77.45c6.25,0,11.93,2.56,16.05,6.67c4.11,4.11,6.67,9.79,6.67,16.05v74.29c0,6.25-2.56,11.93-6.67,16.05 l-0.32,0.29c-4.09,3.94-9.64,6.38-15.73,6.38H22.72c-6.25,0-11.93-2.56-16.05-6.67l-0.3-0.32C2.43,108.64,0,103.09,0,97.01V22.71 c0-6.25,2.55-11.93,6.67-16.05C10.78,2.55,16.46,0,22.72,0L22.72,0z M55.47,38.34c0-3.3,2.67-5.97,5.97-5.97 c3.3,0,5.97,2.67,5.97,5.97v15.55h15.55c3.3,0,5.97,2.67,5.97,5.97c0,3.3-2.67,5.97-5.97,5.97H67.41v15.55 c0,3.3-2.67,5.97-5.97,5.97c-3.3,0-5.97-2.67-5.97-5.97V65.83H39.91c-3.3,0-5.97-2.67-5.97-5.97c0-3.3,2.67-5.97,5.97-5.97h15.55 V38.34L55.47,38.34z M100.16,10.24H22.72c-3.43,0-6.54,1.41-8.81,3.67c-2.26,2.26-3.67,5.38-3.67,8.81v74.29 c0,3.33,1.31,6.35,3.43,8.59l0.24,0.22c2.26,2.26,5.38,3.67,8.81,3.67h77.45c3.32,0,6.35-1.31,8.59-3.44l0.21-0.23 c2.26-2.26,3.67-5.38,3.67-8.81V22.71c0-3.42-1.41-6.54-3.67-8.81C106.71,11.65,103.59,10.24,100.16,10.24L100.16,10.24z"/></g></svg>

    <div class="modal fade" id="add_enseignant" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Ajouter un enseignant</h1>
              <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="data/enseignants/ajouter.php" method="post" enctype="multipart/form-data">
                <div>
                  <label for="nom">Nom de famille</label>
                  <input type="text" name="nom" id="nom" required>
                </div>

                <div>
                  <label for="prenom">Prenom</label>
                  <input type="text" name="prenom" id="prenom" required>
                </div>

                <div>
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" required>
                </div>

                <div>
                  <label for="telephone">Numero de telephone</label>
                  <input type="number" name="telephone" id="telephone">
                </div>

                <div>
                  <label for="addresse">Addresse</label>
                  <input type="text" name="adresse" id="adresse">
                </div>

                <button type="submit" class="btn btn-primary">Soumettre</button>
                
              </form>
            </div>
          </div>
        </div>
    </div>
</div>