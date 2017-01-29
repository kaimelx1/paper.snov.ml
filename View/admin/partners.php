<div class="row">
    <div class="col-md-12">
        <?php if ($data['orders']) : ?>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Товары</th>
                    <th>Сумма</th>
                    <th>Дата</th>
                    <th>Имя</th>
                    <th>ID</th>
                    <th>Телефон</th>
                    <th>Почта</th>
                    <th>Статус</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($data['orders'] as $order) : ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td>
                            <?php foreach ($data['items'] as $item) : ?>
                                <?php if ($order['item_id'] == $item['id']) : ?>
                                    <table>
                                        <td><?php echo '<a href="/item/partner/' . $item['id'] . '" >' . $item['title'] . '</a>, ' . $order['quantity'] . ' шт.'; ?></td>
                                    </table>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td><?php echo $order['total_sum'] ?> грн.</td>
                        <td><?php echo $order['date'] ?></td>
                        <td><?php echo $order['name']; ?></td>
                        <td><?php echo $order['user_id']; ?></td>
                        <td><?php echo $order['phone']; ?></td>
                        <td><?php echo $order['email']; ?></td>
                        <td><?php if ($order['status']) {
                                echo 'Обработан';
                            } else {
                                echo 'Не обработан';
                            } ?></td>
                        <?php if ($order['status']) : ?>
                            <td><a href="/admin/editpartnerstatus/<?php echo $order['id']; ?>/0">В обработку</a></td>
                        <?php else : ?>
                            <td><a href="/admin/editpartnerstatus/<?php echo $order['id']; ?>/1">Обработать</a></td>
                        <?php endif; ?>
                        <td><a href="/admin/deletepartner/<?php echo $order['id']; ?>"
                               onclick="return confirmDelete();">Удалить</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <h4 align="center">Заказов нет</h4><br>
        <?php endif; ?>
    </div>
</div>