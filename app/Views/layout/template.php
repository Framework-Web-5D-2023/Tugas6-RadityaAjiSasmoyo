<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tautan ke Bootstrap CSS -->
  <link href="<?= site_url("assets/bootstrap.css"); ?>" rel="stylesheet">

  <title><?= $title ?></title>
</head>

<body>
  <?= $this->include("layout/navbar"); ?>
  <?= $this->renderSection('content') ?>
</body>

<script type="text/javascript" src="<?= site_url("assets/bootstrap.js"); ?>"></script>


<?= $this->renderSection('script') ?>

</html>