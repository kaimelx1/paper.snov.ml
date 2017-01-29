<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li><a href="/item/all/1/1">Товары</a></li>
    <li class="active"><?php echo $data['item']['title']; ?></li>
</ol>
<!--/BREACRUMB-->

<div class="row">
    <div class="col-md-3 col-sm-4">
        <div class="list-group">
            <?php foreach ($data['sections'] as $section) : ?>
                <?php if ($data['item']['section_id'] == $section['id']) : ?>
                    <a class="list-group-item active">
                        <?php echo $section['section']; ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach ($data['items'] as $item) : ?>
                <a href="/item/show/<?php echo $item['id']; ?>"
                   class="list-group-item"><?php echo $item['title']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-md-9 col-sm-8">

        <!--IMAGE-->
        <div class="col-md-5 col-sm-5">
            <img
                src="<?php \Common\Convert::image($data['item']['id'])?>" width="371" height="421">
        </div>
        <div class="col-lg-6 col-lg-offset-1 col-sm-12">
            <!--TITLE-->
            <h2><?php echo $data['item']['title']; ?></h2>
            <!--PRICE-->
            <?php if ($data['item']['discount'] > 0) : ?>
                <p>
                    <b>Цена за упаковку: </b><span class="badge"><?php echo round($data['item']['price'] - ($data['item']['price'] * $data['item']['discount']), 1); ?>
                    грн.</span>
                    <del><?php echo $data['item']['price']; ?> грн.</del>
                </p>
            <?php else: ?>
                <p><b>Цена за упаковку: </b><?php echo $data['item']['price']; ?> грн.</span></p>
            <?php endif; ?>
            <b>В упаковке:</b> <?php echo $data['item']['quantity']; ?> шт.
            <hr>
            <!--DESCRIPTION-->
            <div>
                <?php if ($data['item']['description']) : ?>
                    <p><?php echo $data['item']['description']; ?></p>
                <?php else : ?>
                    <p>Информации нет</p>
                <?php endif; ?>
            </div>
            <hr>
            <!--PUT IN BASKET-->
            <div class="input-group">
                <input class="form-control quantity" type="number" min="1" placeholder="Количество"/>
                <div class="input-group-btn add-to-cart">
                    <button type="button" class="btn btn-default">В корзину
                    </button>
                </div>
            </div>
            <hr>
            <!--OTHER INFORMATION-->
            <div>
                ID: <span class="text-muted item-id"><?php echo $data['item']['id']; ?></span><br>
                Статус:
                <?php if ($data['item']['availability']) : ?>
                    <span class="text-muted">В наличии</span>
                <?php else: ?>
                    <span class="text-muted">Нет в наличии</span>
                <?php endif; ?>
                <?php if ($data['item']['discount']) : ?>
                    <br><span class="text-muted">Уценённый товар!</span>
                <?php endif; ?>
                <?php if ($data['item']['is_new']) : ?>
                    <br><span class="text-muted">Новинка!</span>
                <?php endif; ?>
            </div>
        </div>
        <!--TABS-->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <br><br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#description" role="tab" data-toggle="tab">Описание товара</a></li>
                <li><a href="#video" role="tab" data-toggle="tab">Видео-обзоры</a></li>
                <li><a href="#comments" role="tab" data-toggle="tab">Отзывы
                        <span>(<?php echo count($data['comments']); ?>)</span></a></li>
            </ul>
            <!--TAB1-->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="description">
                    <?php if ($data['item']['about']) : ?>
                        <p><?php echo $data['item']['about']; ?></p>
                    <?php else : ?>
                        <p>Информации нет</p>
                    <?php endif; ?>
                </div>
                <!--TAB2-->
                <div role="tabpanel" class="tab-pane" id="video">
                    <?php if ($data['item']['video'][0]) : ?>
                        <?php foreach ($data['item']['video'] as $link) : ?>
                            <p>
                                <iframe width="560" height="315" src="<?php echo $link; ?>"
                                        frameborder="0" allowfullscreen></iframe>
                            </p>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Информации нет</p>
                    <?php endif; ?>
                </div>
                <!--TAB3-->
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
                                   value="<?php echo $data['item']['id'] ?>">

                            <input type="submit" name="post" class="btn btn-default" value="Отправить">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
