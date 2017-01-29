<div class="row">
    <div class="col-md-12">
        <?php if ($data['messages']) : ?>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Почта</th>
                    <th>Дата</th>
                    <th>Тема</th>
                    <th>Сообщение</th>
                    <th>Статус</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($data['messages'] as $msg) : ?>
                    <tr>
                        <td><?php echo $msg['id']; ?></td>
                        <td><?php echo $msg['name']; ?></td>
                        <td><?php echo $msg['phone']; ?></td>
                        <td><?php echo $msg['email']; ?></td>
                        <td><?php echo $msg['date'] ?></td>
                        <td><?php echo $msg['subject']; ?></td>
                        <td><?php echo $msg['message']; ?></td>
                        <td><?php if ($msg['status']) {
                                echo 'Отвечен';
                            } else {
                                echo 'Неотвечен';
                            } ?></td>
                        <?php if ($msg['status']) : ?>
                            <td><a href="/admin/editmessagestatus/<?php echo $msg['id']; ?>/0">В обработку</a></td>
                        <?php else : ?>
                            <td><a href="/admin/editmessagestatus/<?php echo $msg['id']; ?>/1">Обработать</a></td>
                        <?php endif; ?>
                        <td><a href="/admin/deletemessage/<?php echo $msg['id']; ?>"
                               onclick="return confirmDelete();">Удалить</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <h4 align="center">Сообщений нет</h4><br>
        <?php endif; ?>
    </div>
</div>