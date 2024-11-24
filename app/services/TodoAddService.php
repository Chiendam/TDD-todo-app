<?php
class TodoAddService {
    public function addTask(array $taskList, string $title): array
    {
        if (trim($title) === '') {
            throw new Exception('Title cannot be empty');
        }

        $task = [
            'index' => count($taskList) + 1,
            'title' => $title,
            'status' => 'to_do'
        ];

        $taskList[] = $task;

        return $taskList;
    }
}