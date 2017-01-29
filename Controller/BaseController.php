<?php

namespace Controller;

use Model\SectionModel;

class BaseController
{
    protected $name = 'index';

    protected $layout = 'default';

    protected $data;

    protected $message;


    /*
     * Renders pages
     */
    protected function render($templateName)
    {
        $data = $this->data;
        $message = $this->message;

        ob_start();
        include SITE_DIR . DS . "View" . DS . $this->name . DS . $templateName . '.php';
        $content = ob_get_clean();
        include SITE_DIR . DS . "View" . DS . "layout" . DS . $this->layout . '.php';
    }

    /*
     * Renders 404 page
     */
    protected function render404()
    {
        $data = $this->data;
        $message = $this->message;

        ob_start();
        include SITE_DIR . DS . "View" . DS . '404.php';
        $content = ob_get_clean();
        include SITE_DIR . DS . "View" . DS . "layout" . DS . $this->layout . '.php';
    }

    /*
     * Controller's action by default
     */
    public function index()
    {
        $this->render404();
    }

    /*
     * Producing data for navbar
     */
    protected function nav() {
        $sectionModel = new SectionModel();
        $this->data['categories'] = $sectionModel->getCategoriesList();
        $this->data['sections'] = $sectionModel->getSectionsList();
    }

    /*
     * Checks if it is admin
     */
    protected function isAdmin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['userRole'] != 'admin') {
            header('Location: /');
            die;
        }
    }

    /*
     * Checks if it is user
     */
    protected function isUser() {
        if(!isset($_SESSION['user'])) {
            header ('Location: /');
            die;
        }
    }

    /*
     * Checks if certain http_referrer is set
     */
    protected function refer($string, $link) {
        if(!isset($_SERVER['HTTP_REFERER']) || !strpos($_SERVER['HTTP_REFERER'], $string)) {
            header("Location: {$link}");
            die();
        }
    }

    /*
     * Checks if it is index page queried
     */
    protected function ifIndex($string, $link) {
        if($_SERVER['REQUEST_URI'] != $string) {
            header("Location: {$link}");
            die();
        }
    }

    /*
     * Checks if any http_referrer is set
     */
    protected function hasReferrer() {
        if(!isset($_SERVER['HTTP_REFERER'])) {
            header('Location: /');
        }
    }

    /*
     * Renders 404 if parameter is empty
     */
    protected function ifNot($info) {
        if (!$info) {
            $this->render404();
            die;
        }
    }
}