<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.01.2017
 * Time: 1:07
 */

namespace Controller;

use Model\ContactModel;

class ContactController extends BaseController
{
    protected $name = 'contact';

    /*
     * Shows contact page & sends message
     */
    public function index()
    {
        $this->nav();

        if ($_POST) {

            $contactModel = new ContactModel();
            $validationResult = $contactModel->validate(($_POST));

            if ($validationResult === true) {

                if ($contactModel->putMessage($_POST)) {
                    $this->message = $_POST['name'] . ', ваше сообщение отправлено, мы пришлём ответ на вашу электронную почту';
                } else {
                    $this->message = $_POST['name'] . ', сообщение не отправлено, попробуйтн снова';
                }

            } else {
                $this->message = $validationResult;
            }
        }

        $this->render("contact");
    }
}