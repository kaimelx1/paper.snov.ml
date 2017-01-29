<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li class="active">Кабинет</li>
</ol>
<!--/BREACRUMB-->

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped" border="1">
            <tr>
                <th>Мои данные</th>
                <th>Изменить пароль</th>
                <th>Мои заказы</th>
            </tr>
            <tr>
                <td>
                    <b>Имя:</b> <?php if (isset($_SESSION['user'])) {
                        echo $_SESSION['user'];
                    } ?>
                    <br>
                    <b>Email:</b> <?php if (isset($_SESSION['userEmail'])) {
                        echo $_SESSION['userEmail'];
                    } ?>

                    <div>
                        <a href="/cabinet/change/" class="cabinet-change-data">Изменить данные</a>
                    </div>
                </td>
                <td>
                    <a href="/cabinet/password/" class="cabinet-change-password"><i
                            class="fa fa-gears fa-4x"></i></a>
                </td>
                <td>
                    <a href="/cabinet/orders" class="cabinet-show-orders"><h5>Показать список</h5></a>
                </td>
            </tr>
        </table>
    </div>
</div>