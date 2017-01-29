<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li class="active">Обратная связь</li>
</ol>
<!--/BREACRUMB-->
<!-- Map Section-->
<div class="map-section container-fluid no-padding">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2466.392265781819!2d31.939986215497992!3d51.81726437968724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46d4d499ee35fba1%3A0xe50f81487ce33f4e!2z0JzQsNCz0LDQt9C40L0sINCy0YPQu9C40YbRjyDQndC10LfQsNC70LXQttC90L7RgdGC0ZYsIDEsINCp0L7RgNGBLCDQp9C10YDQvdGW0LPRltCy0YHRjNC60LAg0L7QsdC70LDRgdGC0YwsIDE1MjAw!5e0!3m2!1sru!2sua!4v1483189919230"
        width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
</div><!-- Map Section /- -->
<br>
<div class="row">
    <form method="post">
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="name" class="form-control" placeholder="Полное Имя*"
                   value="<?php if (isset($_SESSION['user'])) {
                       echo $_SESSION['user'];
                   } ?>" required>
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <input type="number" name="phone" class="form-control" placeholder="Номер телефона">
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <input type="email" name="email" class="form-control" placeholder="Адрес электронной почты*"
                   value="<?php if (isset($_SESSION['userEmail'])) {
                       echo $_SESSION['userEmail'];
                   } ?>" required>
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="subject" class="form-control" placeholder="Тема сообщения*" required>
        </div>
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <textarea rows="7" name="message" class="form-control" placeholder="Сообщение*" required></textarea>
        </div>
        <div class="form-group col-xs-4 col-xs-offset-5">
            <button type="submit" class="btn btn-submit">Отправить</button>
        </div>
    </form>
</div>