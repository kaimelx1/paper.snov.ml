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
			// if there is array with items, count their quantity and return it
            $count = 0;
            foreach ($_SESSION['items'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;

        } else {
			// if there are no items, return 0
            return 0;
        }
    }

    /*
     * Adding item to the cart (session)
     */
    public static function addItem($id)
    {
        $id = intval($id);

        // array for items in cart
        $itemsInCart = array();

		// if there are items in cart
        if (isset($_SESSION['items'])) {
			// fill array with items
            $itemsInCart = $_SESSION['items'];
        }

		// checking if this item is in cart
        if (array_key_exists($id, $itemsInCart)) {
			// if yes - incrementing it
            $itemsInCart[$id]++;
        } else {
			// if no - putting this item's id in cart, quantity = 1
            $itemsInCart[$id] = 1;
        }

		// putting array with items into the session
        $_SESSION['items'] = $itemsInCart;

		// returning items' quantity (in cart)
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