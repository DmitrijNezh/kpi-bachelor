<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['configs']['main_title'] . " | " . $data['title']; ?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/theme.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>

<script>
    $(document).ready(function() {
        $("#<?php echo $data['active'];?>").addClass("active");
    });
</script>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?php echo $data['configs']['main_title'] ?></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li id="maps"><a href="/">Карты</a></li>
                <li id="data"><a href="/data/">Обработка дынных</a></li>
                <li id="ground"><a href="/ground/">Типы грунтов</a></li>
                <li id="help"><a href="/pages/help">Справка</a></li>
                <li><a href="/auth/logout">Выйти</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container content">
    <?php include 'application/views/' . $contentView; ?>
</div>

</body>
</html>