<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::truncate();
        for($i=1;$i<=20;$i++){
            Task::create(['title'=>"Task $i", 'is_completed'=> ($i%2 == 0)]);
        }
    }
}
