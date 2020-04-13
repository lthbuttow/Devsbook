<?php
namespace src\controllers;
use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\TaskHandler;

class TaskController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();

        if(UserHandler::checkLogin() == false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        // $page = intval(filter_input(INPUT_GET, 'page'));

        // $feed = PostHandler::getHomeFeed(
        //     $this->loggedUser->id,
        //     $page
        // );

        $this->render('tarefas', [
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function get() {
        $tasks = [];

        $tasks = TaskHandler::getTasks();

        echo json_encode($tasks);
    }

}
