<?php


namespace Controller;


use Model\OrderModel;
use Model\UserModel;
use Model\ItemModel;

class CabinetController extends BaseController
{
    protected $name = 'cabinet';

    public function index()
    {
        $this->nav();
        $this->isUser();
        $this->render('cabinet');
    }

    /*
     * Changes user's data
     */
    public function change()
    {
        $this->nav();
        $this->isUser();
        $this->refer('/cabinet', '/cabinet');

        if ($_POST) {

            if (md5(SALT . $_POST['password']) == $_SESSION['userPassword']) {

                $userModel = new UserModel();

                if (!$userModel->checkUser($_POST) || $_POST['email'] == $_SESSION['userEmail']) {

                    $validationResult = $userModel->validate($_POST);

                    if ($validationResult === true) {

                        $id = $userModel->getUserId($_SESSION['userEmail']);
                        $_POST['id'] = $id;

                        if ($userModel->dataUpdate($_POST)) {
                            $this->message = 'Данные изменены';
                        } else {
                            $this->message = 'Произошла ошибка, попробуйте снова';
                        }

                    } else {
                        $this->message = $validationResult;
                    }

                } else {
                    $this->message = 'Пользователь с таким email уже существует';
                }
            } else {
                $this->message = 'Неправильный пароль';
            }
        }

        $this->render('data');
    }

    /*
     * Changes user's password
     */
    public function password()
    {
        $this->nav();
        $this->isUser();
        $this->refer('/cabinet', '/cabinet');

        if ($_POST) {

            if (md5(SALT . $_POST['password']) == $_SESSION['userPassword']) {

                $userModel = new UserModel();

                $id = $userModel->getUserId($_SESSION['userEmail']);
                $_POST['id'] = $id;

                if ($userModel->passwordUpdate($_POST)) {
                    $this->message = 'Пароль изменен';
                } else {
                    $this->message = 'Произошла ошибка, попробуйте снова';
                }

            } else {
                $this->message = 'Неправильный пароль';
            }
        }

        $this->render('password');
    }

    /*
     * Shows user's orders
     */
    public function orders()
    {
        $this->nav();
        $this->isUser();
        $this->refer('/cabinet', '/cabinet');

        $userModel = new UserModel();
        $id = (int)$userModel->getUserId($_SESSION['userEmail']);

        $orderModel = new OrderModel();
        $this->data['orders'] = $orderModel->showList($id);

        $info = array();
        foreach ($this->data['orders'] as $items) {
            foreach ((array)json_decode($items['items']) as $id => $quantity) {
                $info[$id] = $quantity;
            }
        }

        $ids = array_keys($info);
        $ids = implode(',', $ids);

        $itemModel = new ItemModel();
        $this->data['items'] = $itemModel->getItemsByIds($ids);

        $this->render('orders');
    }
}