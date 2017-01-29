<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li><a href="/item/all/1/1">Партнёрские товары</a></li>
    <li class="active"><?php echo $data['item']['title']; ?></li>
</ol>
<!--/BREACRUMB-->

<div class="row">
    <div class="col-md-3 col-sm-4">
        <div class="list-group">
                    <a class="list-group-item active">Партнёрские товары</a>
            <?php foreach ($data['items'] as $item) : ?>
                <a href="/item/partner/<?php echo $item['id']; ?>"
                   class="list-group-item"><?php echo $item['title']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-md-9 col-sm-8">

        <!--IMAGE-->
        <div class="col-md-5 col-sm-5">
            <img
                src="<?php if (isset($data['item']['image'])) {
                    echo $data['item']['image'];
                } else {
                    echo '/webroot/images/items/0.jpg';
                } ?>" width="371" height="421">
        </div>
        <div class="col-lg-6 col-lg-offset-1 col-sm-12">
            <!--TITLE-->
            <h2><?php echo $data['item']['title']; ?></h2>
            <!--PRICE-->
            <p><b>Цена: </b><span class="badge"><?php echo $data['item']['price']; ?> грн.</span></p>
            ID: <span class="text-muted"><?php echo $data['item']['id']; ?></span><br>
            <hr>
            <!--DESCRIPTION-->
            <div>
                <?php if ($data['item']['description']) : ?>
                    <p><?php echo iconv_substr($data['item']['description'], 0, 150); ?>...</p>
                <?php else : ?>
                    <p>Информации нет</p>
                <?php endif; ?>
            </div>
            <hr>
            <!--BUY-->
            <div class="input-group">
                <button type="button" class="btn btn-default" data-toggle="modal"
                        data-target="#partner">Заказать
                </button>
            </div>
        </div>
        <!--TABS-->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <br><br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#description" role="tab" data-toggle="tab">Описание товара</a></li>
                <li><a href="#comments" role="tab" data-toggle="tab">Отзывы
                        <span>(<?php echo count($data['comments']); ?>)</span></a></li>
            </ul>
            <!--TAB1-->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="description">
                    <?php if ($data['item']['description']) : ?>
                        <p><?php echo $data['item']['description']; ?></p>
                    <?php else : ?>
                        <p>Информации нет</p>
                    <?php endif; ?>
                </div>
                <!--TAB2-->
                <div role="tabpanel" class="tab-pane" id="comments">
                    <ul>
                        <?php foreach ($data['comments'] as $comment) : ?>
                            <li>
                                <b><?php echo $comment['author']; ?></b>
                                <p class="text-muted"><?php echo $comment['content']; ?></p>
                                <hr>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!--FORM-->
                    <form method="post">
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <input type="hidden" name="action"
                                       value="comment">
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <input type="hidden" name="author" class="form-control" placeholder="Имя*"
                                           value="<?php if (isset($_SESSION['user'])) {
                                               echo $_SESSION['user'];
                                           } ?>">
                                <?php else : ?>
                                    <input type="text" name="author" class="form-control" placeholder="Имя*" required>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-xs-12">
                                <textarea rows="7" cols="45" class="form-control" name="content"
                                          placeholder="Сообщение*" required></textarea>

                            <input type="hidden" name="itemId"
                                   value="<?php echo '111' . $data['item']['id'] ?>">

                            <input type="submit" name="post" class="btn btn-default" value="Отправить">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
