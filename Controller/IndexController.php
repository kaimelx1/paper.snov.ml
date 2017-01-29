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
        $this->ifIndex('/', '/');
        $this->nav();

        $itemModel = new ItemModel();
        $this->data['items'] = $itemModel->getDiscount();

        if ($_POST) {

            $subscribeModel = new SubscribeModel();
            $validationResult = $subscribeModel->validate(($_POST));

            if ($validationResult === true) {

                if ($subscribeModel->checkUser($_POST)) {
                    $this->message = 'Вы ранее уже были подписаны на рассылку';
                } elseif ($subscribeModel->subscribe($_POST)) {
                    $this->message = 'Вы подписались на рассылку';
                } else {
                    $this->message = 'Ошибка, вы не подписались, попробуйте еще раз';
                }

            } else {
                $this->message = $validationResult;
            }
        }

        $this->render("main");
    }
}