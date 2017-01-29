<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PAPER</title>

    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="/webroot/images//favicon.ico"/>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Library - OWL Carousel V.2.0 beta -->
    <link rel="stylesheet" type="text/css" href="/webroot/libraries/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/webroot/libraries/owl-carousel/owl.theme.css">

    <!-- Styles -->
    <link href="/webroot/css/style.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/webroot/css/font-awesome.min.css">

</head>
<body>

<?php include 'modal.php'; ?>

<div class="container">
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
                <?php if (isset($data['categories'], $data['sections'])) : ?>
                    <?php foreach ($data['categories'] as $category) : ?>
                        <li class="dropdown">
                            <a href="<?php echo $category['category']; ?>" class="dropdown-toggle"
                               data-toggle="dropdown"><?php echo $category['category']; ?> <b class="caret"> </b></a>
                            <ul class="dropdown-menu">
                                <?php foreach ($data['sections'] as $section) : ?>
                                    <?php if ($category['category'] == $section['category']) : ?>
                                        <li>
                                            <a href="/item/all/<?php echo $section['id']; ?>/1"><?php echo $section['section']; ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
                <li class="<?php if (strpos($_SERVER['REQUEST_URI'], 'partners')) {
                    echo 'active';
                } ?>"><a href="/item/partners">Партнёрские товары</a></li>
            </ul>

            <div class="btn-group basket pull-right">
                <a href="/cart" type="button" class="btn btn-default"><i class="fa fa-shopping-basket"></i> Корзина
                    <span id="cart-count" class="badge"><?php echo \Common\Cart::countItems(); ?></span></a>
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" title="Дополнительно">
                    <span class="fa fa-gear fa-spin"></span>
                </button>
                <ul class="dropdown-menu"> <!-- dropdown-menu-right -->

                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="<?php if (strpos($_SERVER['REQUEST_URI'], 'cabinet')) {
                                echo 'active';
                            } ?>"><a href="/cabinet/index" >Мой кабинет</li>
                        <li><a href="/user/logout" >Выйти</li>
                    <?php else: ?>
                        <li><a href="#" data-toggle="modal" data-target="#login">Вход</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#registration">Регистрация</a></li>
                    <?php endif; ?>
                </ul>
            </div>
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
    <?php if (isset($_SESSION['orderMessage'])) : ?>
        <div class="alert-message" align="center">
            <div class="alert alert-warning" role="alert"><?php echo $_SESSION['orderMessage']; ?></div>
        </div>
    <?php endif; ?>
<!---->
    <?php if (isset($_SESSION['user']) && $_SESSION['userRole'] == 'admin') : ?>
    <a href="/admin" title="Администраторская">
        <div class="admin-right-button" align="center"><i class="fa fa-gears fa-2x fa-spin"></i></div>
    </a>
    <?php endif; ?>
	
	<?php if (isset($_SESSION['message'])) { unset($_SESSION['message']); } ?>