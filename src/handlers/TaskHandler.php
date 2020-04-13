<?php
namespace src\handlers;

use \src\models\Task;

class TaskHandler {

    public static function getTasks() {
        $tasks = [];
        $data = Task::select()->get();


        if($data) {
            foreach($data as $task) {

                $newTask = new Task();
                $newTask->message = $task['message'];
                $newTask->read = $task['read'];

                $tasks[] = $newTask;

            }
        }

        return $tasks;
    }

}
