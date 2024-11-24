<?php
class TodoUpdateService {
    public function handle(array $taskList, int $index, null|string $title = null, null|string $status = null ): array
    {
        if ($title === null && $status === null) {
            throw new Exception('Title or status must be provided');
        }

        if (is_string($title) && trim($title) === '') {
            throw new Exception('Title cannot be empty');
        }

        if (is_string($status) && !in_array(trim($status), ['to_do', 'progress', 'done'])) {
            throw new Exception('Status not valid');
        }

        if (!isset($taskList[$index])) {
            throw new Exception('Task not found');
        }

        $taskCurrent = $taskList[$index];

        $taskList[$index] = [
            'index' => $taskCurrent['index'],
            'title' => $title ?? $taskCurrent['title'],
            'status' => $status ?? $taskCurrent['status']
        ];

        return $taskList;
    }
}