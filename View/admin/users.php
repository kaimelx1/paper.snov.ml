<div class="row">
    <div class="col-md-12">
        <?php if ($data['users']) : ?>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Почта</th>
                    <th>Роль</th>
                    <th>Дата регистрации</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($data['users'] as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php if ($user['role'] == 'admin') {
                                echo 'Администратор';
                            } else {
                                echo 'Пользователь';
                            } ?></td>
                        <td><?php echo $user['date']; ?></td>
                        <td>
                            <?php if ($user['role'] == 'admin') : ?>
                                <p>Запрещено</p>
                            <?php else : ?>
                                <a href="/admin/deleteuser/<?php echo $user['id']; ?>"
                                   onclick="return confirmDelete();">Удалить</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <h4 align="center">Пользователей нет</h4><br>
        <?php endif; ?>
    </div>
</div>