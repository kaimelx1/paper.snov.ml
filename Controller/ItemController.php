<?php

namespace Controller;


use Model\ItemModel;
use Model\ItemCommentModel;
use Model\UserModel;
use Model\OrderPartnersModel;
use Common\Pagination;

class ItemController extends BaseController
{
    protected $name = 'item';

    /*
     * Shows items by categories
     */
    public function all($id)
    {
        $this->nav();
        $this->ifNot($id[0]);

        if (!isset($id[1])) {
            $id[1] = 1;
        }

        $this->data['id'][] = (int)$id[0];
        $this->data['id'][] = (int)$id[1];

        $itemModel = new ItemModel();
        $this->data['items'] = $itemModel->getAll($id[0], $id[1]);
        $this->ifNot($this->data['items']);

        //PAGINATION
        $amount = $itemModel->getAllCount($id[0]);
        $this->data['pagination'] = new Pagination($amount, (int)$id[1], PAGINATION);
        $this->render('items');
    }

    /*
     * Shows certain item $ sends item's comment
     */
    public function show($id)
    {
        $this->nav();
        $itemCommentModel = new ItemCommentModel();

        if ($_POST) {

            $validationResult = $itemCommentModel->validate($_POST);

            if ($validationResult === true) {

                if (!$itemCommentModel->putItemComment($_POST)) {
                    $this->message = 'Произошла ошибка, попытайтесь снова';
                } else {
                    $this->message = 'Комментарий добавлен';
                }

            } else {
                $this->message = $validationResult;
            }
        }

        $this->data['comments'] = $itemCommentModel->getComments($id[0]);
        $itemModel = new ItemModel();
        $item = $itemModel->getById($id[0]);
        $this->data['id'] = $id[0];

        //FOR WIDGET
        if ($item) {
            $this->data['items'] = $itemModel->getAll($item['section_id']);
        }

        $this->ifNot($item);
        $this->data['item'] = $item;
        $video = explode(PHP_EOL, $item['video']);
        $this->data['item']['video'] = $video;

        $this->render('item');
    }

    /*
     * Shows items in XML or JSON format
     */
    public function format($info)
    {
        $this->isAdmin();
        $this->refer('/admin', '/admin');

        $itemModel = new ItemModel();
        $format = $info[0];

        if ($format == 'xml' || $format == '') {
            $result = $itemModel->displayXML();
            header("Content-Type: text/xml");
            echo $result;

        } elseif ($format == 'json') {
            $result = $itemModel->displayJSON();
            header('Content-Type: application/json');
            echo $result;

        } else {
            $this->render404();
            die();
        }
    }

    /*
     * Shows partner's items
     */
    public function partners()
    {
        $this->nav();
        $itemModel = new ItemModel();
        $this->data['items'] = $itemModel->getFromPartner();
        $this->ifNot($this->data['items']);

        $this->render('partners');
    }

    /*
     * Shows certain partner's item & sends item's comment
     */
    public function partner($id)
    {
        $this->nav();
        $itemCommentModel = new ItemCommentModel();

        if ($_POST) {

            if (isset($_POST['action']) && $_POST['action'] == 'comment') {

                $validationResult = $itemCommentModel->validate($_POST);

                if ($validationResult === true) {

                    if (!$itemCommentModel->putItemComment($_POST)) {
                        $this->message = 'Произошла ошибка, попытайтесь снова';
                    } else {
                        $this->message = 'Комментарий добавлен';
                    }

                } else {
                    $this->message = $validationResult;
                }
            }
        }

        $this->data['comments'] = $itemCommentModel->getComments('111' . $id[0]);

        $itemModel = new ItemModel();
        $items = $itemModel->getFromPartner();
        $this->data['items'] = $items;

        $item = array();
        foreach ($items as $value) {

            if ((int)$value['id'] == (int)$id[0]) {
                $item = $value;
                break;
            } else {
                $item = false;
            }
        }

        $this->ifNot($item);
        $this->data['id'] = (int)$id[0];
        $this->data['item'] = $item;
        $this->render('partner');

        if (isset($_SESSION['message'])) {
            unset($_SESSION['message']);
        }
    }

    /*
     * Makes partner's item order
     */
    public function order()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'buy') {

            $userModel = new UserModel();
            $id = $userModel->getUserId($_POST['email']);

            if ($id) {
                $_POST['id'] = $id;
            } else {
                $_POST['id'] = 0;
            }

            $orderPartnersModel = new OrderPartnersModel();
            $validationResult = $orderPartnersModel->validate($_POST);

            if ($validationResult === true) {

                if ($lastId = $orderPartnersModel->order($_POST)) {

                    //$this->mailer($_POST['price'] * $_POST['quantity'], $lastId, date('Y-m-d H:i:s'), 'Партнёрский');
                    $_SESSION['message'] = "Заказ #{$lastId} выполнен, ожидайте нашего звонка";

                } else {
                    $_SESSION['message'] = 'Произошла ошибка, попробуйте снова';
                }

            } else {
                $_SESSION['message'] = $validationResult;
            }
        }

        header("Location: /item/partner/{$_POST['itemId']}");
        die();
    }
}
