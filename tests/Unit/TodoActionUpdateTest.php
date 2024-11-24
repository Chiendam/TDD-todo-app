<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../../app/Todo.php';

class TodoActionUpdateTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testUpdateStatusTask(): void
    {
        $todo = new Todo(['task 1']);
        $index = 0;
        $task = $todo->updateTask(index: $index, status: 'progress');
        $this->assertEquals('progress', $task['status']);
        $this->assertEquals($index, $task['index']);
    }

    /**
     * @throws Exception
     */
    public function testUpdateTitleTask(): void
    {
        $todo = new Todo(['task 1']);
        $index = 0;
        $task = $todo->updateTask(index: $index, title: 'title update');
        $this->assertEquals('title update', $task['title']);
        $this->assertEquals($index, $task['index']);
    }

    /**
     * @throws Exception
     */
    public function testUpdateTaskNotData()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Title or status must be provided');

        $todo = new Todo(['task 1']);
        $todo->updateTask(index: 0);
    }

    public function testUpdateTaskNoFound()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Task not found');

        $todo = new Todo(['task 1']);
        $todo->updateTask(index: 1, title: 'task 2');
    }

    /**
     * @throws Exception
     */
    public function testUpdateTaskTitle()
    {
        $todo = new Todo(['task 1', 'task 2']);
        $titleUpdate = 'task 2 new';
        $taskUpdated = $todo->updateTask(index: 1, title: $titleUpdate);
        var_dump($taskUpdated['title']);
        $this->assertEquals($titleUpdate, $taskUpdated['title']);
    }

    public function testUpdateTaskStatusNoFound()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Status not valid');

        $todo = new Todo(['task 1']);
        $todo->updateTask(index: 0, status: 'oke');
    }

    public function testUpdateTaskTitleEmpty()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Title cannot be empty');

        $todo = new Todo(['task 1']);
        $todo->updateTask(index: 0, title: '');
    }

    public function testUpdateTaskTitleWhiteSpace()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Title cannot be empty');

        $todo = new Todo(['task 1']);
        $todo->updateTask(index: 0, title: '         ');
    }
}