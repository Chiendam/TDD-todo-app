<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../../app/Todo.php';

class TodoActionAddTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAddTask()
    {
        $todo = new Todo(['task 1']);
        $title = 'task 2';
        $task = $todo->addTask($title);

        $this->assertEquals($title, $task['title']);
        $this->assertCount(2, $todo->getTasks());
    }

    public function testAddTaskWhenTodoEmpty()
    {
        $todo = new Todo([]);
        $todo->addTask('task 2');

        $this->assertCount(1, $todo->getTasks());
    }

    public function testAddTaskEmpty()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Title cannot be empty');

        $todo = new Todo([]);
        $todo->addTask('');

        $this->assertCount(0, $todo->getTasks());
    }

    public function testAddTaskEmptyInToDoHasTask()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Title cannot be empty');
        $todo = new Todo(['task 1']);
        $todo->addTask('');
    }
}