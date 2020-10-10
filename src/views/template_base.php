<!doctype html>
  <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title><?php echo $this->title ?></title>
      <!-- Chargement des feuilles de style injectees par le controlleur -->
      <?php foreach($this->stylesheets as $stylesheet) { ?>
            <link rel="stylesheet" type="text/css" href="src/public/css/<?php echo $stylesheet ?>.css"/>
      <?php  } ?>
    </head>
    <body>
      <header>
        <?php require_once('navbar.php'); ?>
      </header>
      <main>
        <h1 id="main_title"><?php echo $this->title?></h1>
        <?php echo $this->content; ?>
      </main>
      <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="src/public/js/filter.js"></script>
        <?php require_once('footer.php') ?>
      </footer>
    </body>
  </html>
