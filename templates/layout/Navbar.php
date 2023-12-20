<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Begin SEO tag -->
    <title> <?= $this->title ?> </title>
    <meta property="og:title" content="<?= $this->title ?>">
    <meta name="author" content="Ahmad Almamare">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="<?= DESCRIPTION ?>">
    <meta property="og:description" content="<?= DESCRIPTION ?>">
    <link rel="canonical" href="<?= SITE_DOMIN ?>">
    <meta property="og:url" content="<?= SITE_DOMIN ?>">
    <meta property="og:site_name" content="<?= SITE_NAME ?>">

    <!-- FAVICONS -->
    <link rel="icon" href="<?= $this->link ?>/public/assets/icon/favicon.ico" sizes="any">
    <link rel="apple-touch-icon" href="<?= $this->link ?>/public/assets/icon/apple-touch-icon.png">
    <link rel="manifest" href="<?= $this->link ?>/public/assets/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#F4A11E">

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="<?= $this->link ?>/public/assets/plugins/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $this->link ?>/public/assets/plugins/fontawesome-free/css/all.min.css">
    <script src="<?= $this->link ?>/public/assets/plugins/vue.js/vue.global.js"></script>

    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="<?= $this->link ?>/public/assets/css/style.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Base Url -->
    <script>
        function url() {
            var base_url = "<?= $this->link; ?>";
            return base_url;
        }
    </script>
</head>

<body class="d-flex h-100 text-center text-white bg-dark">