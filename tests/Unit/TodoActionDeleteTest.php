<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../../app/Todo.php';

class TodoActionDeleteTest extends TestCase
{
    public function testDeleteTaskNotExist()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Task not found');

        $todo = new Todo(['task 1']);
        $todo->deleteTask(1);
    }

    /**
     * @throws Exception
     */
    public function testDeleteSuccess()
    {
        $todo = new Todo(['task 1']);
        $result = $todo->deleteTask(0);

        $this->assertTrue($result);
    }
}