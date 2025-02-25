<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
      <button class="nav-link" id="v-pills-enseignants-tab" data-bs-toggle="pill" data-bs-target="#v-pills-enseignants" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Enseignants</button>

      <button class="nav-link" id="v-pills-etudiants-tab" data-bs-toggle="pill" data-bs-target="#v-pills-etudiants" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Etudiants</button>

      <button class="nav-link" id="v-pills-cours-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cours" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Cours</button>

      <button class="nav-link" id="v-pills-fiche-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fiche" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Fiches</button>
  </div>
  <div class="tab-content" id="v-pills-tabContent">
    
    
    <?php
    include_once("table/Home.php");
    include_once("table/enseignants.php");
    include_once("table/etudiants.php");
    include_once("table/fiche.php");
    include_once("table/cours.php");
    ?>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>