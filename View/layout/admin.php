<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ADMIN</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="/webroot/images//favicon.ico"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/webroot/css/font-awesome.min.css">

    <!-- Custom - Theme CSS -->
    <link rel="stylesheet" type="text/css" href="/webroot/css/admin.css">
</head>

<body>

<div class="container-fluid">
    <div class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Открыть навигацию</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav">
                <li><a href="/"><i class="fa fa-arrow-left"></i> Магазин</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="btn-group">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Заказы <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/orders/on/')) {
                            echo 'active';
                        } ?>"><a href="/admin/orders/on/">Обработаные</a></li>
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/orders/un/')) {
                            echo 'active';
                        } ?>"><a href="/admin/orders/un/">Необработаные</a></li>
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/orders/all/')) {
                            echo 'active';
                        } ?>"><a href="/admin/orders/all/">Все</a></li>
                    </ul>
                </li>
                <li class="btn-group">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Партнёрские <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/partners/on/')) {
                            echo 'active';
                        } ?>"><a href="/admin/partners/on/">Обработаные</a></li>
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/partners/un/')) {
                            echo 'active';
                        } ?>"><a href="/admin/partners/un/">Необработаные</a></li>
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/partners/all/')) {
                            echo 'active';
                        } ?>"><a href="/admin/partners/all/">Все</a></li>
                    </ul>
                </li>
                <li class="btn-group">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Товары <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/items/add/')) {
                            echo 'active';
                        } ?>"><a href="/admin/items/add/">Добавить</a></li>
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/items/all/')) {
                            echo 'active';
                        } ?>"><a href="/admin/items/all/">Показать</a></li>
                    </ul>
                </li>
                <li class="btn-group">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Сообщения <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/messages/on/')) {
                            echo 'active';
                        } ?>"><a href="/admin/messages/on/">Отвеченные</a></li>
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/messages/un/')) {
                            echo 'active';
                        } ?>"><a href="/admin/messages/un/">Неотвеченные</a></li>
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/messages/all/')) {
                            echo 'active';
                        } ?>"><a href="/admin/messages/all/">Все</a></li>
                    </ul>
                </li>

                <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/comments/')) {
                    echo 'active';
                } ?>"><a href="/admin/comments/">Комментарии</a></li>

                <li class="<?php if (strpos($_SERVER['REQUEST_URI'], '/users/')) {
                    echo 'active';
                } ?>"><a href="/admin/users/">Пользователи</a></li>

                <li class="btn-group">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Показать <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/item/format/xml/">Товары в XML</a></li>
                        <li><a href="/item/format/json/">Товары в JSON</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!---->
    <?php if (isset($message)) : ?>
        <div class="alert-message" align="center">
            <div class="alert alert-warning" role="alert"><?php echo $message; ?></div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert-message" align="center">
            <div class="alert alert-warning" role="alert"><?php echo $_SESSION['message']; ?></div>
        </div>
    <?php endif; ?>
    <!---->

    <!---->
    <?php echo $content; ?>
    <!---->
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- Library - Theme JS -->
<script src="/webroot/js/admin.js"></script>

</body>
</html>