<!--BREACRUMB-->
<ol class="breadcrumb">
    <li><a href="/">
            <i class="fa fa-home"></i>
        </a></li>
    <li><a href="/cabinet/index">Кабинет</a></li>
    <li class="active">Мои заказы</li>
</ol>
<!--/BREACRUMB-->

<div class="row">
    <div class="col-md-12">
        <?php if ($data['orders']) : ?>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Товары</th>
                    <th>Итого по заказу</th>
                    <th>Дата</th>
                    <th>Статус</th>
                </tr>
                <?php foreach ($data['orders'] as $order) : ?>
                    <tr>
                        <td><?php echo $order['id'] ?></td>
                        <td>
                            <?php foreach (json_decode($order['items']) as $id => $quantity) : ?>
                                <?php foreach ($data['items'] as $item) : ?>
                                    <?php if ($id == $item['id']) : ?>
                                        <table>
                                            <td><?php echo '<a href="/item/show/' . $item['id'] . '" class="cabinet-list-link">' . $item['title'] . '</a>, ' . $quantity * $item['quantity'] . ' шт.'; ?></td>
                                        </table>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </td>
                        <td><?php echo $order['total_sum'] ?> грн.</td>
                        <td><?php echo $order['date'] ?></td>
                        <td><?php if ($order['status']) {
                                echo 'Заказ обработан';
                            } else {
                                echo 'Заказ на обработке';
                            } ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <h4>Вы не сделали ни одного заказа</h4><br>
        <?php endif; ?>
    </div>
</div>