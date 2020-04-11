<?php
namespace src\controllers;
use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\PostHandler;

class ProfileController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();

        if(UserHandler::checkLogin() == false) {
            $this->redirect('/login');
        }
    }

    public function index($atts = []) {
        $id = $this->loggedUser->id;

        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        $user = UserHandler::getUser($id, true);

        if(!$user) {
            $this->redirect('/');
        }

        $dateFrom = new \DateTime($user->birthdate);
        $dateTo = new \DateTime('today');
        $user->ageYears = $dateFrom->diff($dateTo)->y;

        $this->render('profile', [
            'loggedUser' => $this->loggedUser,
            'user' => $user
        ]);
    }

}
