<!-- MODAL -->
<div class="modal fade" id="login">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                </button>
                <h4 class="modal-title">Вход</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="auth" value="auth">
                <form action="/user/login" method="post" class="navbar-form text-center">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email*" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Пароль*" required>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-sign-in"></i> Войти
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registration">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                </button>
                <h4 class="modal-title">Регистрация</h4>
            </div>
            <div class="modal-body">

                <form action="/user/register" method="post" class="navbar-form text-center">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Имя*" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email*" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Пароль*" required>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-sign-in"></i> Зарегистрироваться
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="subscrible">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                </button>
                <h4 class="modal-title">Подписаться на новости</h4>
            </div>
            <div class="modal-body">

                <form action="/" method="post" class="navbar-form text-center">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email*" required>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-sign-in"></i> Подписаться
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="partner">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                </button>
                <h4 class="modal-title">Оформить заказ</h4>
            </div>
            <div class="modal-body">
                <form action="/item/order/" method="post" class="navbar-form text-center">
                    <div class="form-group">
                        <input type="number" name="quantity" placeholder="Количество*" class="form-control" min="1"/>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Полное имя*" class="form-control"
                               value="<?php if (isset($_SESSION['user'])) {
                                   echo $_SESSION['user'];
                               } ?>" required/>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="number" name="phone" placeholder="Телефон*" class="form-control" required/>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email*" class="form-control"
                               value="<?php if (isset($_SESSION['userEmail'])) {
                                   echo $_SESSION['userEmail'];
                               } ?>" required/>
                    </div>
                    <br><br>
                    <input type="hidden" name="itemId" value="<?php echo $data['item']['id']; ?>">
                    <input type="hidden" name="price" value="<?php echo $data['item']['price']; ?>">
                    <input type="hidden" name="action" value="buy">
                    <button type="submit" class="btn btn-primary">Оформить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /MODAL -->