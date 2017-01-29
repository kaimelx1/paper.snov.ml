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
		// if referer is not cart/index or there is no total order's sum
        if (!$_SERVER['HTTP_REFERER'] == '/cart/index/' || !isset($_SESSION['total'])) {
            header('Location: /');
            die;
        }

        if ($_POST) {

			// getting user's id by email
            $userModel = new UserModel();
            $id = $userModel->getUserId($_POST['email']);

            if($id) {
                $_POST['id'] = $id;
            } else {
                $_POST['id'] = 0;
            }

            $orderModel = new OrderModel();
            $validationResult = $orderModel->validate($_POST);

			// if validation is OK
            if ($validationResult === true) {

				// making order
                if ($lastId = $orderModel->order($_POST, $_SESSION)) {

					// unsetting order's sesions
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

		// data for menu
        $this->nav();
		// rendering html
        $this->render('checkout');
    }

    /*
     * Shows cart's main page
     */
    public function index()
    {
		// data for menu
        $this->nav();

        if (isset($_SESSION['items'])) {

			// parsing order
            $orderedItems = array_keys($_SESSION['items']);
            $orderedItems = implode(',', $orderedItems);
            $itemModel = new ItemModel();

			// if there is items in order
            if ($orderedItems) {

				// getting items by ids
                $result = $itemModel->getItemsByIds($orderedItems);
                $this->data['ordered'] = $result;

				// checking if there is items in cart
                if ($_SESSION['items']) {

					// parsing order
                    $itemsIds = array_keys($_SESSION['items']);
                    $itemsIds = implode(',', $itemsIds);

					// total items' quantity
                    $itemsQuantities = 0;
                    foreach ($_SESSION['items'] as $item) {
                        $itemsQuantities += $item;
                    }

                    $_SESSION['quantity'] = $itemsQuantities;

					// getting full information about items
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

		// rendering html
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
		// referer verification
        $this->hasReferrer();

		// editing item's quantity
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
		// referer verification
        $this->hasReferrer();

		// adding item
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
		// referer verification
        $this->hasReferrer();

        $id = intval($data[0]);
        $quantity = intval($data[1]);

		// if there is items in cart - they are stored in session
        if (isset($_SESSION['items'][$id])) {
            $_SESSION['items'][$id] += $quantity;
        } else {
            $_SESSION['items'][$id] = $quantity;
        }

		// showing items' count
        echo Cart::countItems();
        return true;
    }

    /*
     * Adds items to the cart using AJAX
     */
    public function addAjax($id)
    {
		// referer verification
        $this->hasReferrer();

		// adding item and showing items' count
        echo Cart::addItem($id[0]);
        return true;
    }

    /*
     * Clears cart
     */
    public function clear()
    {
		// if referer is not '/cart' - redirect onto main page
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
		// if referer is not '/cart' - redirect onto main page
        $this->refer('/cart', '/');

        unset($_SESSION['items'][$id[0]]);
        header('Location: /cart/index/');
        die();
    }
}