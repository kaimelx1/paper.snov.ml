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
        $this->isAdmin();
        $this->render('index');
    }

    /*
     * Shows orders
     */
    public function orders($alias)
    {
        $this->isAdmin();
        $this->refer('/admin', '/admin');

        $orderModel = new OrderModel();

        if ($alias[0] === 'all') {
            $this->data['orders'] = $orderModel->all();
        } elseif ($alias[0] === 'on') {
            $this->data['orders'] = $orderModel->status($alias[0]);
        } elseif ($alias[0] === 'un') {
            $this->data['orders'] = $orderModel->status($alias[0]);
        }

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

    /*
     * Deletes order
     */
    public function deleteOrder($id)
    {
        $this->isAdmin();
        $this->refer('/admin/orders/', '/admin');

        $orderModel = new OrderModel();
        $orderModel->delete($id[0]);

        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Edits order's status
     */
    public function editOrderStatus($id)
    {
        $this->isAdmin();
        $this->refer('/admin/orders/', '/admin');

        $orderModel = new OrderModel();
        $orderModel->editStatus($id);

        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Shows partner's orders
     */
    public function partners($alias)
    {

        $this->isAdmin();
        $this->refer('/admin', '/admin');

        $orderPartnersModel = new OrderPartnersModel();

        if ($alias[0] === 'all') {
            $this->data['orders'] = $orderPartnersModel->all();
        } elseif ($alias[0] === 'on') {
            $this->data['orders'] = $orderPartnersModel->status($alias[0]);
        } elseif ($alias[0] === 'un') {
            $this->data['orders'] = $orderPartnersModel->status($alias[0]);
        }

        $itemModel = new ItemModel();
        $this->data['items'] = $itemModel->getFromPartner();

        $this->render('partners');
    }

    /*
     * Deletes partner's order
     */
    public function deletePartner($id)
    {
        $this->isAdmin();
        $this->refer('/admin/partners/', '/admin');

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
        $this->isAdmin();
        $this->refer('/admin/partners/', '/admin');

        $orderPartnersModel = new OrderPartnersModel();
        $orderPartnersModel->editStatus($id);

        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Shows messages
     */
    public function messages($alias)
    {
        $this->isAdmin();
        $this->refer('/admin', '/admin');

        $contactModel = new ContactModel();

        if ($alias[0] === 'all') {
            $this->data['messages'] = $contactModel->all();
        } elseif ($alias[0] === 'on') {
            $this->data['messages'] = $contactModel->status($alias[0]);
        } elseif ($alias[0] === 'un') {
            $this->data['messages'] = $contactModel->status($alias[0]);
        }

        $this->render('messages');
    }

    /*
     * Deletes message
     */
    public function deleteMessage($id)
    {
        $this->isAdmin();
        $this->refer('/admin/messages/', '/admin');

        $contactModel = new ContactModel();
        $contactModel->delete($id[0]);

        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Edits message's status
     */
    public function editMessageStatus($id)
    {
        $this->isAdmin();
        $this->refer('/admin/messages/', '/admin');

        $contactModel = new ContactModel();
        $contactModel->editStatus($id);

        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Shows users
     */
    public function users()
    {
        $this->isAdmin();
        $this->refer('/admin', '/admin');

        $userModel = new UserModel;
        $this->data['users'] = $userModel->all();

        $this->render('users');
    }

    /*
     * Deletes user
     */
    public function deleteUser($id)
    {
        $this->isAdmin();
        $this->refer('/admin/users/', '/admin');

        $userModel = new UserModel;
        $userModel->delete($id[0]);

        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Show comments
     */
    public function comments()
    {
        $this->isAdmin();
        $this->refer('/admin', '/admin');

        $itemCommentModel = new ItemCommentModel();
        $this->data['comments'] = $itemCommentModel->all();

        $this->render('comments');
    }

    /*
     * Deletes item's comment
     */
    public function deleteItemComment($id)
    {
        $this->isAdmin();
        $this->refer('/admin/comments/', '/admin');

        $itemCommentModel = new ItemCommentModel();
        $itemCommentModel->delete($id[0]);

        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
        die;
    }

    /*
     * Shows items, adds new item, edits item
     */
    public function items($info)
    {
        $this->isAdmin();
        $this->refer('/admin', '/admin');

        $sectionModel = new SectionModel;
        $this->data['sections'] = $sectionModel->getSectionsList();

        $itemModel = new ItemModel();

        if ($info[0] === 'all') {

            $this->data['items'] = $itemModel->all();

            if (isset($_SERVER['HTTP_REFERER']) && !strpos($_SERVER['HTTP_REFERER'], '/admin/items/edit/')) {
                unset($_SESSION['message']);
            }

        } elseif ($info[0] === 'add') {

            if ($_POST) {

                $validationResult = $itemModel->validate(($_POST));

                if ($validationResult === true) {

                    if ($lastId = $itemModel->addItem($_POST)) {

                        FileCache::deleteCache();

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

        } elseif ($info[0] === 'edit') {

            $this->data['item'] = $itemModel->getById($info[1]);

            if ($_POST) {

                $validationResult = $itemModel->validate(($_POST));

                if ($validationResult === true) {

                    if ($itemModel->updateItem($_POST)) {

                        FileCache::deleteCache();

                        if ($_FILES['image']['size']) {

                            if ($file = file_exists('webroot/images/items/' . $_POST['id'] . '.jpg')) {
                                unlink('webroot/images/items/' . $_POST['id'] . '.jpg');
                                unlink('webroot/images/items/big-' . $_POST['id'] . '.jpg');
                            }

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

        $this->render('items');
    }

    /*
     * Deletes item
     */
    public function deleteItem($id)
    {
        $this->isAdmin();
        $this->refer('/admin/items/', '/admin');

        $itemModel = new ItemModel();
        $itemModel->delete($id[0]);

        $itemCommentModel = new ItemCommentModel();
        $itemCommentModel->deleteWhenItem($id[0]);

        FileCache::deleteCache();

        if ($file = file_exists('webroot/images/items/' . $id[0] . '.jpg')) {
            unlink('webroot/images/items/' . $id[0] . '.jpg');
            unlink('webroot/images/items/big-' . $id[0] . '.jpg');
        }


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

        if ($image['type'] == 'image/jpeg') {

            $destination = "webroot/images/items/{$id}.jpg/";

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