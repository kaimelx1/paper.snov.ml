<?php if (isset($data['items']) && $_SERVER['REQUEST_URI'] == '/admin/items/all/') : ?>
    <div class="row">
        <div class="col-md-12">
            <?php if ($data['items']) : ?>
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Изображение</th>
                        <th>Наименование</th>
                        <th>Категория</th>
                        <th>Цена</th>
                        <th>Скидка</th>
                        <th>Кол-во в упаковке</th>
                        <th>Видео</th>
                        <th>Новинка</th>
                        <th>Наличие</th>
                        <th>Описание</th>
                        <th>Подробно</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach ($data['items'] as $item) : ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td>
                                <a
                                    href="<?php \Common\Convert::image($item['id'])?>">
                                    <img
                                        src="<?php \Common\Convert::image($item['id'])?>" width="70" height="70">
                                </a>
                            </td>
                            <td><a href="/item/show/<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></td>
                            <td>
                                <?php foreach ($data['sections'] as $section) : ?>
                                    <?php if ($item['section_id'] == $section['id']) : ?>
                                        <?php echo $section['section']; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td><?php echo round($item['price'] - $item['price'] * $item['discount'], 1); ?> грн.</td>
                            <td><?php echo $item['discount'] * 100 ?>%</td>
                            <td><?php echo $item['quantity'] * 100 ?> шт.</td>
                            <td>
                                <?php if ($item['video']) {
                                    echo '+';
                                } else {
                                    echo '-';
                                } ?>
                            </td>
                            <td><?php if ($item['is_new']) {
                                    echo '+';
                                } else {
                                    echo '-';
                                } ?>
                            </td>
                            <td><?php if ($item['availability']) {
                                    echo '+';
                                } else {
                                    echo '-';
                                } ?>
                            </td>
                            <td><?php if ($item['description']) {
                                    echo '+';
                                } else {
                                    echo '-';
                                } ?>
                            </td>
                            <td><?php if ($item['about']) {
                                    echo '+';
                                } else {
                                    echo '-';
                                } ?>
                            </td>
                            <td><a href="/admin/items/edit/<?php echo $item['id']; ?>">Редактировать</a></td>
                            <td><a href="/admin/deleteitem/<?php echo $item['id']; ?>"
                                   onclick="return confirmDelete();">Удалить</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <h4 align="center">Товаров нет</h4><br>
            <?php endif; ?>
        </div>
    </div>

    <!------------------------------------------------------------------>

<?php elseif ($_SERVER['REQUEST_URI'] == '/admin/items/add/') : ?>
    <div class="col-md-8 col-md-offset-2 col-xs-12">
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label underline">Название*</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Название товара"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label for="section" class="col-sm-2 control-label underline">Категория*</label>
                <div class="col-sm-10">
                    <select name="section" id="section" class="form-control" required>
                        <?php foreach ($data['sections'] as $section) : ?>
                            <option value="<?php echo $section['id']; ?>"><?php echo $section['section']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="price" class="col-sm-2 control-label underline">Цена (грн.)*</label>
                <div class="col-sm-10">
                    <input type="number" name="price" class="form-control" id="price" placeholder="Цена товара"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label for="discount" class="col-sm-2 control-label">Размер скидки (%)</label>
                <div class="col-sm-10">
                    <input type="number" name="discount" class="form-control" id="discount"
                           placeholder="Размер скидки в процентах">
                </div>
            </div>
            <div class="form-group">
                <label for="quantity" class="col-sm-2 control-label underline">Кол-во в упаковке*</label>
                <div class="col-sm-10">
                    <input type="number" name="quantity" class="form-control" id="quantity"
                           placeholder="Количество в одной упаковке" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label underline">Краткое описание*</label>
                <div class="col-sm-10">
                    <textarea name="description" id="description" rows="3" class="form-control"
                              placeholder="Краткое описание товара" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="about" class="col-sm-2 control-label">Подробное описание</label>
                <div class="col-sm-10">
                    <textarea name="about" id="about" rows="3" class="form-control"
                              placeholder="Подробное описание товара"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="video" class="col-sm-2 control-label">Ссылка на видео</label>
                <div class="col-sm-10">
                    <textarea name="video" id="video" rows="3" class="form-control"
                              placeholder="youtube.com->Поделиться->HTML-код->https://www.youtube.com/embed/... Каждую ссылку с новой строки"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="new" class="col-sm-2 control-label">Новинка</label>
                <div class="col-sm-10">
                    <input type="checkbox" name="new" value="1" class="form-control" id="new">
                </div>
            </div>
            <div class="form-group">
                <label for="availability" class="col-sm-2 control-label">В наличии</label>
                <div class="col-sm-10">
                    <input type="checkbox" name="availability" value="1" class="form-control" id="availability">
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Изображение (jpg)</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" id="image">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Добавить</button>
                </div>
            </div>
        </form>
    </div>

    <!------------------------------------------------------------------>

<?php elseif (isset($data['item'])) : ?>
    <div class="col-md-8 col-md-offset-2 col-xs-12">
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label">ID</label>
                <div class="col-sm-10">
                    <h5><?php echo $data['item']['id']; ?></h5>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label underline">Название*</label>
                <div class="col-sm-10">
                    <input type="text" name="title" value="<?php echo $data['item']['title']; ?>" class="form-control"
                           id="title" placeholder="Название товара"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label for="section" class="col-sm-2 control-label underline">Категория*</label>
                <div class="col-sm-10">
                    <select name="section" id="section" class="form-control" required>
                        <?php foreach ($data['sections'] as $section) : ?>
                            <option
                                value="<?php echo $section['id']; ?>" <?php if ($data['item']['section_id'] == $section['id']) {
                                echo 'selected';
                            } ?>><?php echo $section['section']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="price" class="col-sm-2 control-label underline">Цена (грн.)*</label>
                <div class="col-sm-10">
                    <input type="number" name="price" value="<?php echo $data['item']['price']; ?>" class="form-control"
                           id="price" placeholder="Цена товара"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label for="discount" class="col-sm-2 control-label">Размер скидки (%)</label>
                <div class="col-sm-10">
                    <input type="number" name="discount" value="<?php echo $data['item']['discount'] * 100; ?>"
                           class="form-control" id="discount"
                           placeholder="Размер скидки в процентах">
                </div>
            </div>
            <div class="form-group">
                <label for="quantity" class="col-sm-2 control-label underline">Кол-во в упаковке*</label>
                <div class="col-sm-10">
                    <input type="number" name="quantity" value="<?php echo $data['item']['quantity']; ?>"
                           class="form-control" id="quantity"
                           placeholder="Количество в одной упаковке" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label underline">Краткое описание*</label>
                <div class="col-sm-10">
                    <textarea name="description" id="description" rows="3" class="form-control"
                              placeholder="Краткое описание товара"
                              required><?php echo $data['item']['description']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="about" class="col-sm-2 control-label">Подробное описание</label>
                <div class="col-sm-10">
                    <textarea name="about" id="about" rows="3" class="form-control"
                              placeholder="Подробное описание товара"><?php echo $data['item']['about']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="video" class="col-sm-2 control-label">Ссылка на видео</label>
                <div class="col-sm-10">
                    <textarea name="video" id="video" rows="3" class="form-control"
                              placeholder="youtube.com->Поделиться->HTML-код->https://www.youtube.com/embed/... Каждую ссылку с новой строки"><?php echo $data['item']['video']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="new" class="col-sm-2 control-label">Новинка</label>
                <div class="col-sm-10">
                    <input type="checkbox" name="new" value="1" class="form-control"
                           id="new" <?php if ($data['item']['is_new'] == 1) {
                        echo 'checked';
                    }; ?>>
                </div>
            </div>
            <div class="form-group">
                <label for="availability" class="col-sm-2 control-label">В наличии</label>
                <div class="col-sm-10">
                    <input type="checkbox" name="availability" value="1" class="form-control"
                           id="availability" <?php if ($data['item']['availability'] == 1) {
                        echo 'checked';
                    }; ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Изображение</label>
                <div class="col-sm-10">
                    <a
                        href="<?php \Common\Convert::image($data['item']['id'])?>">
                        <img src="<?php \Common\Convert::image($data['item']['id'])?>" width="70" height="70">
                    </a>
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Добавить новое изображение (jpg/png/gif)</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" id="image">
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $data['item']['id']; ?>">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Редактировать</button>
                </div>
            </div>
        </form>
    </div>
<?php endif; ?>
