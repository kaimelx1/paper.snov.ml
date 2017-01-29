<?php

namespace Controller;

use Common\FileCache;
use Model\OrderModel;
use Model\OrderPartnersModel;
use Model\UserModel;
use Model\ItemModel;
use Model\ContactModel;
use Model\ItemCommentModel;
use Model\SectionModel;

class AdminController extends BaseController
{
    protected $name = 'admin';
    protected $layout = 'admin';

    /*
     * Shows admin's main page
     */
    public function index()
    {
		// verifications
        $this->isAdmin();
        $this->render('index');
    }

    /*
     * Shows orders
     */
    public function orders($alias)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin', '/admin');

        $orderModel = new OrderModel();

		// starting different methods depending on alias
        if ($alias[0] === 'all') {
            $this->data['orders'] = $orderModel->all();
        } elseif ($alias[0] === 'on') {
            $this->data['orders'] = $orderModel->status($alias[0]);
        } elseif ($alias[0] === 'un') {
            $this->data['orders'] = $orderModel->status($alias[0]);
        }

		// json decode for items
        $info = array();
        foreach ($this->data['orders'] as $items) {
            foreach ((array)json_decode($items['items']) as $id => $quantity) {
                $info[$id] = $quantity;
            }
        }

		// getting items by ids
        $ids = array_keys($info);
        $ids = implode(',', $ids);
        $itemModel = new ItemModel();
        $this->data['items'] = $itemModel->getItemsByIds($ids);

		// rendering html
        $this->render('orders');
    }

    /*
     * Deletes order
     */
    public function deleteOrder($id)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin/orders/', '/admin');

		// deleting order
        $orderModel = new OrderModel();
        $orderModel->delete($id[0]);

		// redirecting
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Edits order's status
     */
    public function editOrderStatus($id)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin/orders/', '/admin');

		// editing status
        $orderModel = new OrderModel();
        $orderModel->editStatus($id);

		// redirecting
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Shows partner's orders
     */
    public function partners($alias)
    {

	// verifications
        $this->isAdmin();
        $this->refer('/admin', '/admin');

        $orderPartnersModel = new OrderPartnersModel();

		// starting different methods depending on alias
        if ($alias[0] === 'all') {
            $this->data['orders'] = $orderPartnersModel->all();
        } elseif ($alias[0] === 'on') {
            $this->data['orders'] = $orderPartnersModel->status($alias[0]);
        } elseif ($alias[0] === 'un') {
            $this->data['orders'] = $orderPartnersModel->status($alias[0]);
        }

		// data for partner's items
        $itemModel = new ItemModel();
        $this->data['items'] = $itemModel->getFromPartner();

		// rendering html
        $this->render('partners');
    }

    /*
     * Deletes partner's order
     */
    public function deletePartner($id)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin/partners/', '/admin');

		// deleting partner's order
        $orderPartnersModel = new OrderPartnersModel();
        $orderPartnersModel->delete($id[0]);

        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Edits partner's order status
     */
    public function editPartnerStatus($id)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin/partners/', '/admin');

		// editing status
        $orderPartnersModel = new OrderPartnersModel();
        $orderPartnersModel->editStatus($id);

		// redirecting
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Shows messages
     */
    public function messages($alias)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin', '/admin');

        $contactModel = new ContactModel();

		// starting different methods depending on alias
        if ($alias[0] === 'all') {
            $this->data['messages'] = $contactModel->all();
        } elseif ($alias[0] === 'on') {
            $this->data['messages'] = $contactModel->status($alias[0]);
        } elseif ($alias[0] === 'un') {
            $this->data['messages'] = $contactModel->status($alias[0]);
        }

		// rendering html
        $this->render('messages');
    }

    /*
     * Deletes message
     */
    public function deleteMessage($id)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin/messages/', '/admin');

		// deleting message
        $contactModel = new ContactModel();
        $contactModel->delete($id[0]);

		// redirecting
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Edits message's status
     */
    public function editMessageStatus($id)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin/messages/', '/admin');

		// editing status
        $contactModel = new ContactModel();
        $contactModel->editStatus($id);

		// redirecting
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Shows users
     */
    public function users()
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin', '/admin');

		// data for showing users
        $userModel = new UserModel;
        $this->data['users'] = $userModel->all();

		// rendering html
        $this->render('users');
    }

    /*
     * Deletes user
     */
    public function deleteUser($id)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin/users/', '/admin');

		// deleting user
        $userModel = new UserModel;
        $userModel->delete($id[0]);

		// redirecting
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Show comments
     */
    public function comments()
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin', '/admin');

		// data for showing comments
        $itemCommentModel = new ItemCommentModel();
        $this->data['comments'] = $itemCommentModel->all();

		// rendering html
        $this->render('comments');
    }

    /*
     * Deletes item's comment
     */
    public function deleteItemComment($id)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin/comments/', '/admin');

		// deleting item's comments
        $itemCommentModel = new ItemCommentModel();
        $itemCommentModel->delete($id[0]);

		// redirecting
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Shows items, adds new item, edits item
     */
    public function items($info)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin', '/admin');

		// data for sections
        $sectionModel = new SectionModel;
        $this->data['sections'] = $sectionModel->getSectionsList();

        $itemModel = new ItemModel();

		// if parameter = 'all', geting all items
        if ($info[0] === 'all') {

            $this->data['items'] = $itemModel->all();

            if (isset($_SERVER['HTTP_REFERER']) && !strpos($_SERVER['HTTP_REFERER'], '/admin/items/edit/')) {
                unset($_SESSION['message']);
            }

			// if parameter = 'add'
        } elseif ($info[0] === 'add') {

            if ($_POST) {

				// validating
                $validationResult = $itemModel->validate(($_POST));

				// if validation is OK
                if ($validationResult === true) {

					// inserting item
                    if ($lastId = $itemModel->addItem($_POST)) {

						// clearing cash
                        FileCache::deleteCache();

						// if there is an image - download it
                        if ($this->uploadImage($_FILES['image'], $lastId)) {
                            $this->message = "Товар #{$lastId} и изображение добавлены";
                        } else {
                            $this->message = "Товар #{$lastId} добавлен без изображения";
                        }

                    } else {
                        $this->message = 'Ошибка, попробуйте снова';
                    }

                } else {
                    $this->message = $validationResult;
                }
            }

		// if parameter  = 'edit'
        } elseif ($info[0] === 'edit') {

			// getting item's id
            $this->data['item'] = $itemModel->getById($info[1]);

            if ($_POST) {

				// validating
                $validationResult = $itemModel->validate(($_POST));

				// if validation is OK
                if ($validationResult === true) {

					// updating item's data
                    if ($itemModel->updateItem($_POST)) {

						// clearing cash
                        FileCache::deleteCache();

						// if there is an image
                        if ($_FILES['image']['size']) {

							// deleting existing image
                            if ($file = file_exists('webroot/images/items/' . $_POST['id'] . '.jpg')) {
                                unlink('webroot/images/items/' . $_POST['id'] . '.jpg');
                            }

							// if new image was downloaded
                            if ($this->uploadImage($_FILES['image'], $_POST['id'])) {
                                $_SESSION['message'] = "Товар #{$_POST['id']} и изображение обновлены";
								
                            } else {
								
                                if ($file) {
                                    $_SESSION['message'] = "Товар #{$_POST['id']} обновлен, изображение стало дефолтным";
                                } else {
                                    $_SESSION['message'] = "Товар #{$_POST['id']} обновлен, изображения осталось дефолтным";
                                }
                            }

                        } else {
                            $_SESSION['message'] = "Товар #{$_POST['id']} обновлен, изображения осталось прежним";
                        }

                        header('Location: /admin/items/all/');
                        die();

                    } else {
                        $this->message = 'Ошибка, попробуйте снова';
                    }

                } else {
                    $this->message = $validationResult;
                }
            }
        }

		// rendering html
        $this->render('items');
    }

    /*
     * Deletes item
     */
    public function deleteItem($id)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin/items/', '/admin');

		// deleting item
        $itemModel = new ItemModel();
        $itemModel->delete($id[0]);

		// deleting item's comments
        $itemCommentModel = new ItemCommentModel();
        $itemCommentModel->deleteWhenItem($id[0]);

		// clearing cash
        FileCache::deleteCache();

		// if there is image, deleting it
        if ($file = file_exists('webroot/images/items/' . $id[0] . '.jpg')) {
            unlink('webroot/images/items/' . $id[0] . '.jpg');
        }

		// redirecting
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Uploads image
     */
    private function uploadImage($image, $id)
    {
        $id = (int)$id;

		// checking image's type
        if ($image['type'] == 'image/jpeg') {

            $destination = "webroot/images/items/{$id}.jpg/";

			// uploading image
            if (move_uploaded_file($image['tmp_name'], $destination)) {

                // GD
                $width = 371;
                $height = 421;
                $image_c = imagecreatetruecolor($width, $height);
                $image = imagecreatefromjpeg("webroot/images/items/{$id}.jpg");
                imagecopyresampled($image_c, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));
                imagejpeg($image_c, "webroot/images/items/{$id}.jpg", 100);
                imagedestroy($image_c);
                imagedestroy($image);
                //

                return true;
            }
        }
        return false;
    }
}