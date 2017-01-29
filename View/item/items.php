<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li class="active">Товары</li>
</ol>
<!--/BREACRUMB-->

<ul class="nav nav-tabs">
    <?php foreach ($data['sections'] as $section) : ?>
        <?php if ($data['id'][0] == $section['id']) : ?>
            <li class="active">
                <a><?php echo $section['section']; ?></a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <?php if ($data['items']) : ?>
        <div class="row masonry" data-columns>
            <?php foreach ($data['items'] as $item) : ?>
                <div>
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
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<div align="center"><?php echo $data['pagination']->get(); ?></div>



