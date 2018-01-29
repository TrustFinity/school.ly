<?php

use App\Models\Kanban;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class KanbanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Teacher::all() as $teacher) {
            for ($i = 0; $i < 10; $i++) {
                $kanban = factory(Kanban::class)->make();
                $kanban->school_id = $teacher->school_id;
                $kanban->teacher_id = $teacher->id;
                // $kanban->subject_id = $teacher->subject ? $teacher->subject->id : null;
                $kanban->class_group_id = $teacher->classgroup->id;
                $kanban->save();
            }
        }
    }
}
