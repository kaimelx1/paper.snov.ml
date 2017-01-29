<div class="row">
    <div class="col-md-12">
        <?php if ($data['comments']) : ?>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Ссылка</th>
                    <th>Автор</th>
                    <th>Дата</th>
                    <th>Содержимое</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($data['comments'] as $comment) : ?>
                    <tr>
                        <td><?php echo $comment['id']; ?></td>
                        <td>
                            <a href="/item/show/<?php echo $comment['item_id']; ?>">Перейти</a>
                        </td>
                        <td><?php echo $comment['author']; ?></td>
                        <td><?php echo $comment['date']; ?></td>
                        <td><?php echo $comment['content']; ?></td>
                        <td>
                            <a href="/admin/deleteitemcomment/<?php echo $comment['id']; ?>"
                               onclick="return confirmDelete();">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <h4 align="center">Комментариев нет</h4><br>
        <?php endif; ?>
    </div>
</div>