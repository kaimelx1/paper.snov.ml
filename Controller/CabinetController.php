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
		// data for menu
        $this->nav();
		// cheking if this is user
        $this->isUser();
		//rendering html
        $this->render('cabinet');
    }

    /*
     * Changes user's data
     */
    public function change()
    {
		// data for menu
        $this->nav();
		// checking if this is user
        $this->isUser();
		//rendering html
        $this->refer('/cabinet', '/cabinet');

        if ($_POST) {

			// comparing password with data from db
            if (md5(SALT . $_POST['password']) == $_SESSION['userPassword']) {

                $userModel = new UserModel();

				// if there is unique email
                if (!$userModel->checkUser($_POST) || $_POST['email'] == $_SESSION['userEmail']) {

					// validating
                    $validationResult = $userModel->validate($_POST);
 
					// if validation is OK
                    if ($validationResult === true) {

						// getting user's id
                        $id = $userModel->getUserId($_SESSION['userEmail']);
                        $_POST['id'] = $id;

						// update user's data
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

		// rendering html
        $this->render('data');
    }

    /*
     * Changes user's password
     */
    public function password()
    {
		// data for menu
        $this->nav();
		// if this is user
        $this->isUser();
		// rendering html
        $this->refer('/cabinet', '/cabinet');

        if ($_POST) {

			// comparing password with data from db
            if (md5(SALT . $_POST['password']) == $_SESSION['userPassword']) {

                $userModel = new UserModel();

				// getting user's id
                $id = $userModel->getUserId($_SESSION['userEmail']);
                $_POST['id'] = $id;

				// updating user's password
                if ($userModel->passwordUpdate($_POST)) {
                    $this->message = 'Пароль изменен';
                } else {
                    $this->message = 'Произошла ошибка, попробуйте снова';
                }

            } else {
                $this->message = 'Неправильный пароль';
            }
        }

		// rendering html
        $this->render('password');
    }

    /*
     * Shows user's orders
     */
    public function orders()
    {
		// data for menu
        $this->nav();
		// if this is user
        $this->isUser();
		// rendering html
        $this->refer('/cabinet', '/cabinet');

		// getting user's id
        $userModel = new UserModel();
        $id = (int)$userModel->getUserId($_SESSION['userEmail']);

		// showing user's data
        $orderModel = new OrderModel();
        $this->data['orders'] = $orderModel->showList($id);

		// data for user's orders
        $info = array();
        foreach ($this->data['orders'] as $items) {
            foreach ((array)json_decode($items['items']) as $id => $quantity) {
                $info[$id] = $quantity;
            }
        }

        $ids = array_keys($info);
        $ids = implode(',', $ids);

		// get user's items by ids
        $itemModel = new ItemModel();
        $this->data['items'] = $itemModel->getItemsByIds($ids);

		// rendering html
        $this->render('orders');
    }
}