<?php

namespace Common;

class Cart
{
    /*
     * Returns quantity of items in cart (session)
     */
    public static function countItems()
    {
        if (isset($_SESSION['items'])) {
            // Если массив с товарами есть, то подсчитаем и вернем их количество
            $count = 0;
            foreach ($_SESSION['items'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;

        } else {
            // Если товаров нет, вернем 0
            return 0;
        }
    }

    /*
     * Adding item to the cart (session)
     */
    public static function addItem($id)
    {
        // Приводим $id к типу integer
        $id = intval($id);

        // Пустой массив для товаров в корзине
        $itemsInCart = array();

        // Если в корзине уже есть товары (они хранятся в сессии)
        if (isset($_SESSION['items'])) {
            // То заполним наш массив товарами
            $itemsInCart = $_SESSION['items'];
        }

        // Проверяем есть ли уже такой товар в корзине
        if (array_key_exists($id, $itemsInCart)) {
            // Если такой товар есть в корзине, но был добавлен еще раз, увеличим количество на 1
            $itemsInCart[$id]++;
        } else {
            // Если нет, добавляем id нового товара в корзину с количеством 1
            $itemsInCart[$id] = 1;
        }

        // Записываем массив с товарами в сессию
        $_SESSION['items'] = $itemsInCart;

        // Возвращаем количество товаров в корзине
        return self::countItems();
    }

    /*
     * Returns total price
     */
    public static function getTotalPrice($items)
    {
        $itemsInCart = self::getItems();
        $total = 0;

        if ($itemsInCart) {
            foreach ($items as $item) {
                $total += round($item['price'] - $item['price'] * $item['discount'], 1) * $itemsInCart[$item['id']];
            }
        }

        return $total;
    }

    /*
     * Returns items (session)
     */
    private function getItems()
    {
        if (isset($_SESSION['items'])) {
            return $_SESSION['items'];
        }
        return false;
    }
}