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
		// data for menu
        $this->nav();
		// if there is no item - rendering 404
        $this->ifNot($id[0]);

        if (!isset($id[1])) {
            $id[1] = 1;
        }

        $this->data['id'][] = (int)$id[0];
        $this->data['id'][] = (int)$id[1];

		// getting all items (with pagination offset)
        $itemModel = new ItemModel();
        $this->data['items'] = $itemModel->getAll($id[0], $id[1]);
        $this->ifNot($this->data['items']);

        //PAGINATION
        $amount = $itemModel->getAllCount($id[0]);
        $this->data['pagination'] = new Pagination($amount, (int)$id[1], PAGINATION);
		
		// rendering html
        $this->render('items');
    }

    /*
     * Shows certain item $ sends item's comment
     */
    public function show($id)
    {
		// data for menu
        $this->nav();
        $itemCommentModel = new ItemCommentModel();

        if ($_POST) {

            $validationResult = $itemCommentModel->validate($_POST);

			// if item's comment validation is OK
            if ($validationResult === true) {

				// putting comment
                if (!$itemCommentModel->putItemComment($_POST)) {
                    $this->message = 'Произошла ошибка, попытайтесь снова';
                } else {
                    $this->message = 'Комментарий добавлен';
                }

            } else {
                $this->message = $validationResult;
            }
        }

		// getting item's comments
        $this->data['comments'] = $itemCommentModel->getComments($id[0]);
        $itemModel = new ItemModel();
        $item = $itemModel->getById($id[0]);
        $this->data['id'] = $id[0];

        //FOR WIDGET
        if ($item) {
            $this->data['items'] = $itemModel->getAll($item['section_id']);
        }

		// if there are no items - rendering 404
        $this->ifNot($item);
        $this->data['item'] = $item;
		
		// video
        $video = explode(PHP_EOL, $item['video']);
        $this->data['item']['video'] = $video;

		// rendering html
        $this->render('item');
    }

    /*
     * Shows items in XML or JSON format
     */
    public function format($info)
    {
		// verifications
        $this->isAdmin();
        $this->refer('/admin', '/admin');

        $itemModel = new ItemModel();
        $format = $info[0];

		// xml
        if ($format == 'xml' || $format == '') {
            $result = $itemModel->displayXML();
            header("Content-Type: text/xml");
            echo $result;

		// json
        } elseif ($format == 'json') {
            $result = $itemModel->displayJSON();
            header('Content-Type: application/json');
            echo $result;

        } else {
			// rendering 404
            $this->render404();
            die();
        }
    }

    /*
     * Shows partner's items
     */
    public function partners()
    {
		if there is no item - rendering 404
        $this->nav();
        $itemModel = new ItemModel();
        $this->data['items'] = $itemModel->getFromPartner();
		// if there are no items - rendering 404
        $this->ifNot($this->data['items']);

		// rendering html
        $this->render('partners');
    }

    /*
     * Shows certain partner's item & sends item's comment
     */
    public function partner($id)
    {
		if there is no item - rendering 404
        $this->nav();
        $itemCommentModel = new ItemCommentModel();

        if ($_POST) {

            if (isset($_POST['action']) && $_POST['action'] == 'comment') {

                $validationResult = $itemCommentModel->validate($_POST);

				// if comment validation is OK
                if ($validationResult === true) {

					// putting comment
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

		// getting comments
        $this->data['comments'] = $itemCommentModel->getComments('111' . $id[0]);

        $itemModel = new ItemModel();
		// getting partner's data
        $items = $itemModel->getFromPartner();
        $this->data['items'] = $items;

		// getting items' ids
        $item = array();
        foreach ($items as $value) {

            if ((int)$value['id'] == (int)$id[0]) {
                $item = $value;
                break;
            } else {
                $item = false;
            }
        }

		// if there are no items - rendering 404
        $this->ifNot($item);
		
        $this->data['id'] = (int)$id[0];
        $this->data['item'] = $item;
		// rendering html
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
			// getting user's id by email
            $id = $userModel->getUserId($_POST['email']);

            if ($id) {
                $_POST['id'] = $id;
            } else {
                $_POST['id'] = 0;
            }

            $orderPartnersModel = new OrderPartnersModel();
            $validationResult = $orderPartnersModel->validate($_POST);

			// if validation is OK
            if ($validationResult === true) {

				// making order
                if ($lastId = $orderPartnersModel->order($_POST)) {
                    $_SESSION['message'] = "Заказ #{$lastId} выполнен, ожидайте нашего звонка";

                } else {
                    $_SESSION['message'] = 'Произошла ошибка, попробуйте снова';
                }

            } else {
                $_SESSION['message'] = $validationResult;
            }
        }

		// redirecting
        header("Location: /item/partner/{$_POST['itemId']}");
        die();
    }
}
