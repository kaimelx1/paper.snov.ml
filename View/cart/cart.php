<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li class="active">Корзина</li>
</ol>
<!--/BREACRUMB-->

<div class="row">
    <?php if (isset($data['ordered']) && $data['ordered']) : ?>
        <div class="col-md-12">
            <form action="/cart/edit/" method="post">
                <table class="table table-striped" border="1">
                    <tr>
                        <th class="product-name">Товар</th>
                        <th class="product-name">Информация</th>
                        <th class="product-quantity">Кол-во упаковок</th>
                        <th class="product-price">За одну упаковку</th>
                        <th class="product-subtotal">Итого</th>
                        <th class="product-remove">Удалить</th>
                    </tr>

                    <?php foreach ($data['ordered'] as $item) : ?>
                        <tr>
                            <td>
                                <a href="/item/show/<?php echo $item['id']; ?>">
                                    <a
                                        href="<?php \Common\Convert::image($item['id'])?>">
                                        <img src="<?php \Common\Convert::image($item['id'])?>" width="121" height="121">
                                    </a>
                                </a>
                            </td>
                            <td>
                                <a href="/item/show/<?php echo $item['id']; ?>/1"> </a>
                                <?php echo $item['title']; ?> <br><br>
                                В одной упаковке: <span class="text-muted"><?php echo $item['quantity']; ?>шт.</span>
                                <br>
                                Скидка: <span class="text-muted"><?php echo $item['discount'] * 100; ?>%</span> <br>
                                ID товара: <span class="text-muted"><?php echo $item['id']; ?></span>
                            </td>
                            <td>
                                <br>
                                <br>
                                <div align="center">
                                    <input type="number" name="items[<?php echo $item['id']; ?>]"
                                           class="form-control cart-input"
                                           value="<?php echo $_SESSION['items'][$item['id']]; ?>" min="1"/>
                                </div>
                            </td>
                            <td>
                                <br>
                                <br>
                                <?php if ($item['discount']) : ?>
                                    <h4><?php echo round($item['price'] - ($item['price'] * $item['discount']), 1); ?>
                                        грн. <sup>
                                            <del><?php echo $item['price']; ?></del>
                                        </sup></h4>
                                <?php else : ?>
                                    <h4><?php echo $item['price']; ?></h4>
                                <?php endif; ?>
                            </td>
                            <td>
                                <br>
                                <br>
                                <h4><?php echo $_SESSION['items'][$item['id']] * round($item['price'] - ($item['price'] * $item['discount']), 1); ?>
                                    грн.</h4>
                            </td>
                            <td>
                                <br>
                                <br>
                                <a href="/cart/delete/<?php echo $item['id']; ?>" title="Удалить"><img
                                        src="/webroot/images/icon/product-remove.png"/></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3">
                            <button type="submit" class="btn btn-default cart-button">Обновить данные
                                корзины
                            </button>
                        </td>
                        <td colspan="3">
                            <a href="/cart/clear/" class="btn btn-default">Очистить корзину</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="col-md-4 col-sm-4 col-sm-offset-8">
            <table class="table table-striped" border="1">
                <tr>
                    <th>Суммарная цена</th>
                    <th>Заказать</th>
                </tr>
                <tr>
                    <td>
                        <span class="text-muted"><?php echo $_SESSION['total'] ?> грн.</span>
                    </td>
                    <td>
                        <a href="/cart/checkout/" class="btn btn-default">Заказать</a>
                    </td>
                </tr>
            </table>
        </div>

    <?php else : ?>
        <div align="center">
            <h3 class="text-muted">Ваша корзина пуста</h3>
        </div>
    <?php endif; ?>
</div>
