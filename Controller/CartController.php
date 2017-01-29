<?php

namespace Controller;

use Model\ItemModel;
use Model\UserModel;
use Model\OrderModel;
use Common\Cart;

class CartController extends BaseController
{

    protected $name = 'cart';

    /*
     * Shows checkout page & sends order
     */
    public function checkout()
    {
        if (!$_SERVER['HTTP_REFERER'] == '/cart/index/' || !isset($_SESSION['total'])) {
            header('Location: /');
            die;
        }

        if ($_POST) {

            $userModel = new UserModel();
            $id = $userModel->getUserId($_POST['email']);

            if($id) {
                $_POST['id'] = $id;
            } else {
                $_POST['id'] = 0;
            }

            $orderModel = new OrderModel();
            $validationResult = $orderModel->validate($_POST);

            if ($validationResult === true) {

                if ($lastId = $orderModel->order($_POST, $_SESSION)) {

                    //$this->mailer($_SESSION['total'], $lastId, date('Y-m-d H:i:s'), 'Наш');
                    unset($_SESSION['items']);
                    unset($_SESSION['total']);

                    $_SESSION['orderMessage'] = "Заказ #{$lastId} выполнен, ожидайте нашего звонка";
                    header('Location: /cart/index/');
                    die();

                } else {
                    $this->message = 'Произошла ошибка, попробуйте снова';
                }

            } else {
                $this->message = $validationResult;
            }
        }

        $this->nav();
        $this->render('checkout');
    }

    /*
     * Shows cart's main page
     */
    public function index()
    {
        $this->nav();

        if (isset($_SESSION['items'])) {

            $orderedItems = array_keys($_SESSION['items']);
            $orderedItems = implode(',', $orderedItems);
            $itemModel = new ItemModel();

            if ($orderedItems) {

                $result = $itemModel->getItemsByIds($orderedItems);
                $this->data['ordered'] = $result;

                // Проверяем есть ли в массиве товары (не пустой ли)
                if ($_SESSION['items']) {

                    $itemsIds = array_keys($_SESSION['items']);
                    $itemsIds = implode(',', $itemsIds);

                    $itemsQuantities = 0;
                    foreach ($_SESSION['items'] as $item) {
                        $itemsQuantities += $item;
                    }

                    $_SESSION['quantity'] = $itemsQuantities;

                    // Если строка сформирована, получаем полную информацию о товарах с модели
                    if ($itemsIds) {

                        $itemModel = new ItemModel();
                        $_SESSION['total'] = Cart::getTotalPrice($itemModel->getItemsByIds($itemsIds));
                    }

                } else {
                    $this->data['ordered'] = array();
                }

            } else {
                $this->data['ordered'] = array();
            }

        }

        $this->render('cart');

        if (isset($_SESSION['orderMessage'])) {
            unset($_SESSION['orderMessage']);
        }
    }

    /*
     * Edits order's data
     */
    public function edit()
    {
        $this->hasReferrer();

        if ($_POST) {
            foreach ($_POST['items'] as $id => $quantity) {
                $_SESSION['items'][$id] = $quantity;
            }
        }

        header('Location: /cart/index/');
        die();
    }

    /*
     * Adds items to the cart
     */
    public function add($id)
    {
        $this->hasReferrer();

        Cart::addItem($id);
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die();
    }

    /*
     * Adds items to the cart using AJAX
     */
    public function addItemQuantity($data)
    {
        $this->hasReferrer();

        $id = intval($data[0]);
        $quantity = intval($data[1]);

        // Если в корзине уже есть товары (они хранятся в сессии)
        if (isset($_SESSION['items'][$id])) {
            $_SESSION['items'][$id] += $quantity;
        } else {
            $_SESSION['items'][$id] = $quantity;
        }

        echo Cart::countItems();
        return true;
    }

    /*
     * Adds items to the cart using AJAX
     */
    public function addAjax($id)
    {
        $this->hasReferrer();

        echo Cart::addItem($id[0]);
        return true;
    }

    /*
     * Clears cart
     */
    public function clear()
    {
        $this->refer('/cart', '/');

        if (isset($_SESSION['items'])) {
            unset($_SESSION['items']);
        }

        header('Location: /cart/index/');
        die();
    }

    /*
     * Deletes cart's item
     */
    public function delete($id)
    {
        $this->refer('/cart', '/');

        unset($_SESSION['items'][$id[0]]);
        header('Location: /cart/index/');
        die();
    }
}