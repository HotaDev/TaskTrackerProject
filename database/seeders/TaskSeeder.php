<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([[
                'title'       => 'Задача1',
                'description' => 'Описание к задаче1',
                'due_date'    => '2025-01-20T15:00:00',
                'create_date' => '2025-01-20T15:00:00',
                'priority'    => 'высокий',
                'category'    => 'Работа',
                'status'      => 'не выполнена',
            ],
            [
                'title'       => 'Задача1',
                'description' => 'Дополнение к задаче1',
                'due_date'    => '2025-01-20T20:00:00',
                'create_date' => '2025-01-20T18:00:00',
                'priority'    => 'высокий',
                'category'    => 'Работа',
                'status'      => 'не выполнена',
            ],
            [
                'title'       => 'Задача2',
                'due_date'    => '2025-01-18T15:00:00',
                'create_date' => '2025-01-18T15:00:00',
                'priority'    => 'средний',
                'category'    => 'Личное',
                'status'      => 'выполнена',
            ],
            [
                'title'       => 'Задача3',
                'description' => 'Описание домашней задачи',
                'due_date'    => '2025-01-15T15:00:00',
                'create_date' => '2025-01-14T15:00:00',
                'priority'    => 'низкий',
                'category'    => 'Дом',
                'status'      => 'выполнена',
            ],
            [
                'title'       => 'Задача4',
                'description' => 'Описание к задаче4',
                'due_date'    => '2025-01-21T15:00:00',
                'create_date' => '2025-01-21T15:00:00',
                'priority'    => 'средний',
                'category'    => 'Работа',
                'status'      => 'не выполнена',
            ],
            [
                'title'       => 'Задача5',
                'due_date'    => '2025-01-23T15:00:00',
                'create_date' => '2025-01-22T15:00:00',
                'priority'    => 'низкий',
                'category'    => 'Работа',
                'status'      => 'выполнена',
            ],
        ]);
    }
}
