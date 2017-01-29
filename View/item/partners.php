<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li class="active">Партнёрские товары</li>
</ol>
<!--/BREACRUMB-->

<ul class="nav nav-tabs">
    <li class="active">
        <a href="#tab1" data-toggle="tab">Партнёрские товары</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade in active" id="tab1">
        <?php if ($data['items']) : ?>
            <div class="row masonry" data-columns>
                <?php foreach ($data['items'] as $item) : ?>

                    <div>
                        <div class="thumbnail">
                            <a href="/item/partner/<?php echo $item['id']; ?>">
                                <img src="<?php echo $item['image']; ?>" width="260" height="273">
                            </a>
                            <div class="caption" align="center">
                                <b><?php echo $item['title']; ?></b>
                                <span class="badge"><?php echo $item['price']; ?>
                                    грн.</span>
                                <hr>
                                <p>
                                    <a href="/item/partner/<?php echo $item['id']; ?>"
                                       class="btn btn-default btn-xs" ">Открыть</a>
                                </p>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
