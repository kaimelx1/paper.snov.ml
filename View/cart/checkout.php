<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li class="active"><a href="/cart">Корзина</a></li>
    <li class="active">Оформление</li>
</ol>
<!--/BREACRUMB-->

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped" border="1">
            <tr>
                <th>Информация</th>
                <th>Общее количеств упаковок</th>
                <th>Сумма к оплате</th>
            </tr>
            <tr>
                <td>
                    <span class="text-muted">После оформления мы свяжемся с вами и оговорим детали доставки. <br>
                    Будьте осторожны, наш номер 096 147 25 58. Мы не звоним клинтам из других номеров.</span>
                </td>
                <td>
                    <b class="text-muted"><?php if (isset($_SESSION['quantity'])) {
                            echo $_SESSION['quantity'];
                        } ?></b>
                </td>
                <td>
                    <b class="text-muted"><?php if (isset($_SESSION['total'])) {
                            echo $_SESSION['total'];
                        } else {
                            echo 0;
                        } ?> грн.</b>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <form method="post">
                        <div class="form-group col-sm-4 col-xs-12">
                            <input type="text" class="form-control" name="name" placeholder="Полное имя*"
                                   value="<?php if (isset($_SESSION['user'])) {
                                       echo $_SESSION['user'];
                                   } ?>" required>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <input type="number" class="form-control" name="phone" placeholder="Телефон*"
                                   required>
                        </div>

                        <div class="form-group col-sm-4 col-xs-12">
                            <input type="email" class="form-control" name="email" placeholder="E-mail*"
                                   value="<?php if (isset($_SESSION['userEmail'])) {
                                       echo $_SESSION['userEmail'];
                                   } ?>" required>
                        </div>
                </td>
                <td>
                    <div class="form-group col-sm-4 col-sm-offset-1 col-xs-12">
                        <button type="submit" class="btn btn-default">Оформить</button>
                    </div>
                </td>
                </form>
            </tr>
        </table>
    </div>

</div>