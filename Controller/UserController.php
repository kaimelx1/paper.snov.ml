<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.11.2016
 * Time: 7:52
 */

namespace Controller;

use Model\UserModel;

class UserController extends BaseController
{
    protected $name = 'user';


    /*
     * Authentication
     */
    public function login()
    {
        if ($_POST) {

            $userModel = new UserModel();

			// authenticating
            if ($user = $userModel->login($_POST)) {
				// setting user's sessions
                $_SESSION['user'] = $user['name'];
                $_SESSION['userEmail'] = $user['email'];
                $_SESSION['userRole'] = $user['role'];
                $_SESSION['userPassword'] = $user['password'];

				// if this is admin - redirecting into admin's panel
                if ($_SESSION['userRole'] == 'admin') {
                    header('Location: /admin/index/');
                    die();
                }

				// if this is user - redirecting into user's cabinet
                header('Location: /cabinet/index/');
                die();

            } else {
                $_SESSION['message'] = 'Неверные данные';
            }
        }
		
		// redirecting
		header('Location: /');
    }

    /*
     * Registration
     */
    public function register()
    {
        if ($_POST) {

            $userModel = new UserModel();

            if (!$userModel->checkUser($_POST)) {

                $validationResult = $userModel->validate($_POST);

				// if validation is OK
                if ($validationResult === true) {

					// registering new user
                    if ($userModel->register($_POST)) {
						// setting user's sessions
                        $_SESSION['user'] = htmlspecialchars($_POST['name']);
                        $_SESSION['userEmail'] = htmlspecialchars($_POST['email']);
                        $_SESSION['userRole'] = 'user';
                        $_SESSION['userPassword'] = md5(SALT . htmlspecialchars($_POST['password']));
                        header('Location: /');
                        die();
						
                    } else {
                        $_SESSION['message'] = 'Произошла ошибка регистрации';
                    }
					
                } else {
                    $_SESSION['message'] = $validationResult;
                }

            } else {
                $_SESSION['message'] = 'Пользователь с таким email уже существует';
            }
        }
		
		// redirecting
		header('Location: /');
    }

    /*
     * Logout
     */
    public function logout()
    {
        if ($_SESSION['user']) {
			// unsetting user's sessions
            unset($_SESSION['user']);
            unset($_SESSION['userEmail']);
            unset($_SESSION['userPassword']);
        }
        header('Location: /');
        die();
    }
}