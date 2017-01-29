<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li class="active">Главная</li>
</ol>
<!--/BREACRUMB-->

<div class="box-items">
    <?php if (isset($data['items'])) : ?>
    <div class="row">
        <div class="slider-items">
            <?php foreach ($data['items'] as $item) : ?>
                <div class="col-xs-12">
                    <div class="slider-member">
                        <div class="thumbnail">
                            <a href="/item/show/<?php echo $item['id']; ?>"><img
                                src="<?php \Common\Convert::image($item['id'])?>" width="260" height="273"></a>
                            <div class="caption" align="center">
                                <b><?php echo $item['title']; ?></b>
                                <span
                                    class="badge"><?php echo round($item['price'] - ($item['price'] * $item['discount']), 1); ?>
                                    грн.</span>
                                <hr>
                                <p>
                                    <a data-id="<?php echo $item['id']; ?>"
                                       class="add-item-to-cart btn btn-default btn-xs">В корзину</a>
                                    <a href="/item/show/<?php echo $item['id']; ?>"
                                       class="btn btn-default btn-xs" ">Открыть</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>