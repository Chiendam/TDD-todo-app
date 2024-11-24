<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../../app/Todo.php';

class TodoActionGetTest extends TestCase
{
    public function testGetTasks()
    {
        $tasks = ['task 1', 'task 2'];
        $todo = new Todo($tasks);
        $this->assertEquals($tasks, array_map(fn($task) => $task['title'], $todo->getTasks()));
    }

    public function testGetTasksEmpty(): void
    {
        $tasks = [];
        $todo = new Todo($tasks);
        $this->assertCount(0, $todo->getTasks());
    }

    /**
     * @throws Exception
     */
    public function testGetTask(): void
    {
        $tasks = ['task 1', 'task 2'];
        $todo = new Todo($tasks);
        $this->assertEquals($tasks[0], $todo->getTask(0)['title']);
    }

    public function testGetTaskNotExist()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Task not found');

        $tasks = ['task 1', 'task 2'];
        $todo = new Todo($tasks);
        $todo->getTask(2);
    }
}