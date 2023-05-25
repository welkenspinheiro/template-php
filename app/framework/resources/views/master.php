<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <link rel="stylesheet" href="/assets/css/global.css"> <!-- Referência do CSS Global -->
    <?php $this->section('css'); ?>
    <script src="https://unpkg.com/feather-icons"></script> <!-- Biblioteca do Feather Icons -->
</head>
<body>
<section class="container-dashboard">
        <aside class="container-aside" id="container-aside">
            <?php require 'partials/sidebar.php' ?>
        </aside>


        <section class="container-section-principal">
            <i data-feather="menu" id="menuMobile"></i>
            <article class="container-section-principal-header">
                <?php require 'partials/header.php' ?>
            </article>

            <main class="container-section-principal-content">
                <?=$this->load();?>
            </main>

        </section>
    </section>

    <script src="/assets/js/scriptPrincipal.js"></script>
    <script src="app.js"></script>
</body>
</html>