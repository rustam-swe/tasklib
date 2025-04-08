<?php
declare(strict_types=1);

namespace App\Controllers;

class Task{
    public function addTask ($title, $description, $difficulty, $deadline, $requiredKnowledge, $requirements, $active = false, $status = 'drafted'){

        $task = new \App\Models\Task();
    
        $task_id = $task->addTask($title, $description, $difficulty, $deadline, $active, $status);
    
        foreach ($requiredKnowledge as $x => $y){
            $task->addRequiredKnowledge($task_id, $x, $y);
        }
        foreach ($requirements as $x => $y){
            $task->addRequirement($task_id, $x, $y);
        }
    }
    
    public function getTask ($id){
        $task = new \App\Models\Task();
        $justTask = $task->find($id);
        $requirements = $task->findRequirements($id);
        $requiredKnowledges = $task->findRequiredKnowledge(($id));
        return [$justTask, $requirements, $requiredKnowledges];
    } 
}
