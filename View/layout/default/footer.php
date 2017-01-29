<div class="visible-md visible-lg">

    <hr>
    <!-- Origional snipet by msurguy<http://bootsnipp.com/msurguy>, I editted his snipet so that it works with bootstrap 3.3 -->
    <div class="row">
        <div class="col-xs-3">
            <ul class="list-unstyled">
                <li>Товары</li>
                <li><a class="text-muted">Визитки, евро-визитки</a></li>
                <li><a class="text-muted">Таблички, вывески</a></li>
                <li><a class="text-muted">Плакаты, газеты</a></li>
                <li><a class="text-muted">Флаера, евро-флаера</a></li>
                <li><a class="text-muted">Альбомы, фотоальбомы</a></li>
            </ul>
        </div>
        <div class="col-xs-3">
            <ul class="list-unstyled">
                <li>Адрес</li>
                <li><a class="text-muted">ул. Независимости, 1 <br>
                        Сновск, Украина</a></li>
                <li>Телефон</li>
                <li><a class="text-muted">096 147 25 58</a></li>
                <li>Почтовый ящик</li>
                <li><a class="text-muted">print@print.com</a></li>
            </ul>
        </div>
        <div class="col-xs-3">
            <ul class="list-unstyled">
                <li>Детали</li>
                <li><a class="text-muted">При покупке товара</a></li>
                <li><a class="text-muted">мы перезваниваем по</a></li>
                <li><a class="text-muted">указанному номеру</a></li>
                <li><a class="text-muted">и оговариваем</a></li>
                <li><a class="text-muted">детали доставки</a></li>
                <li><a class="text-muted">и заказа в целом.</a></li>
            </ul>
        </div>
        <div class="col-xs-3">
            <ul class="list-unstyled">
                <li>Время работы</li>
                <li><a class="text-muted">Понедельник: 8 - 19</a></li>
                <li><a class="text-muted">Вторник: 8 - 19</a></li>
                <li><a class="text-muted">Среда: 8 - 19</a></li>
                <li><a class="text-muted">Четверг: 8 - 19</a></li>
                <li><a class="text-muted">Пятница: 8 - 19</a></li>
                <li><a class="text-muted">Суббота: 9 - 15</a></li>
                <li><a class="text-muted">Воскресение 9 - 15</a></li>
            </ul>
        </div>
    </div>

</div>

<hr>
<div class="row">
    <div class="col-xs-8">
        <ul class="list-unstyled list-inline pull-left">
            <li><a href="/contact">Обратная связь</a></li>
            <li><a href="#" data-toggle="modal" data-target="#subscrible">Подписаться на новости</a></li>
        </ul>
    </div>
    <div class="col-xs-4">
        <p class="text-muted pull-right" data-toggle="tooltip" data-placement="top" title="Разработчик">A. Vashchenko</p>
    </div>
</div>

</div>

<?php if ($_SERVER['REQUEST_URI'] === '/') : ?>
    <!-- JQuery v1.11.3 -->
    <script src="/webroot/js/jquery.min.js"></script>
    <!-- Library - OWL Carousel V.2.0 beta -->
    <script src="/webroot/libraries/owl-carousel/owl.carousel.min.js"></script>
<?php else : ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php endif; ?>

<!-- Library - Theme JS -->
<script src="/webroot/js/admin.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="/webroot/js/salvattore.min.js"></script>

</body>
</html>
