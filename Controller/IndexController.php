<?php

namespace Controller;

use Model\ItemModel;
use Model\SubscribeModel;

class IndexController extends BaseController
{
    protected $name = 'index';

    /*
     * Shows main page & sends subscriber's data
     */
    public function index()
    {
		// index's method verification
        $this->ifIndex('/', '/');
		// data for menu
        $this->nav();

		// getting discounted items
        $itemModel = new ItemModel();
        $this->data['items'] = $itemModel->getDiscount();

        if ($_POST) {

            $subscribeModel = new SubscribeModel();
            $validationResult = $subscribeModel->validate(($_POST));

			// if subscrible validation is OK
            if ($validationResult === true) {

				// checking if this is not unique email
                if ($subscribeModel->checkUser($_POST)) {
                    $this->message = 'Вы ранее уже были подписаны на рассылку';
				// putting email into db	
                } elseif ($subscribeModel->subscribe($_POST)) {
                    $this->message = 'Вы подписались на рассылку';
                } else {
                    $this->message = 'Ошибка, вы не подписались, попробуйте еще раз';
                }

            } else {
                $this->message = $validationResult;
            }
        }

		// rendering html
        $this->render("main");
    }
}