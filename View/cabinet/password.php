<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li><a href="/cabinet/index">Кабинет</a></li>
    <li class="active">Изменить пароль</li>
</ol>
<!--/BREACRUMB-->

<div class="row">
    <form method="post" class="form-horizontal col-sm-offset-3">
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Текущий пароль*</label>
            <div class="col-sm-6">
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
        </div>
        <div class="form-group">
            <label for="newPassword" class="col-sm-2 control-label">Новый пароль*</label>
            <div class="col-sm-6">
                <input type="password" name="newPassword" class="form-control" id="newPassword" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Изменить пароль</button>
            </div>
        </div>
    </form>
</div>