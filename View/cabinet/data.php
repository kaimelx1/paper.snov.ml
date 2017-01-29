<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li><a href="/cabinet/index">Кабинет</a></li>
    <li class="active">Изменить данные</li>
</ol>
<!--/BREACRUMB-->

<div class="row">
    <form method="post" class="form-horizontal col-sm-offset-3">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Новое имя*</label>
            <div class="col-sm-6">
                <input type="text" name="name" class="form-control" id="name"
                       value="<?php if (isset($_SESSION['user'])) {
                           echo $_SESSION['user'];
                       } ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Новый email*</label>
            <div class="col-sm-6">
                <input type="email" name="email" class="form-control" id="email"
                       value="<?php if (isset($_SESSION['userEmail'])) {
                           echo $_SESSION['userEmail'];
                       } ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Текущий пароль</label>
            <div class="col-sm-6">
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Изменить данные</button>
            </div>
        </div>
    </form>
</div>