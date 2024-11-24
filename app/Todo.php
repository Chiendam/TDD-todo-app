<?php

require_once __DIR__ . '/services/TodoAddService.php';
require_once __DIR__ . '/services/TodoUpdateService.php';
class Todo {

    private array $tasks = [];

    public function __construct(
        array $tasks,
    ) {
        $index = 0;
        $this->tasks = array_map(function ($task) use (&$index) {
            return [
                'index' => $index++,
                'title' => $task,
                'status' => 'to_do'
            ];
        }, $tasks);
    }

    /**
     * @throws Exception
     */
    public function addTask(string $title): array
    {
        $todoAddService = new TodoAddService();
        $this->tasks = $todoAddService->addTask($this->getTasks(), $title);
        return end($this->tasks);
    }

    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @throws Exception
     */
    public function getTask($index) {
        if (!isset($this->tasks[$index])) {
            throw new Exception('Task not found');
        }
        return $this->tasks[$index];
    }

    /**
     * @throws Exception
     */
    public function updateTask(int $index, null|string $title = null, null|string $status = null ): array
    {
        $taskUpdateService = new TodoUpdateService();
        $this->setTasks($taskUpdateService->handle($this->getTasks(), $index, $title, $status));

        return $this->getTask($index);
    }

    public function deleteTask(int $index): bool
    {
        if (!isset($this->tasks[$index])) {
            throw new Exception('Task not found');
        }
        unset($this->tasks[$index]);
        return true;
    }

    public function setTasks(array $tasks): void
    {
        $this->tasks = $tasks;
    }
}