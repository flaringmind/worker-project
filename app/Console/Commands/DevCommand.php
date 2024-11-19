<?php

namespace App\Console\Commands;

use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Worker;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for development purposes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $this->prepareData();
//        $this->prepareManyToMany();

        $position = Position::first();
        dd($position->queryWorker->toArray());

        return 0;
    }

    private function prepareData()
    {
         Client::create([
            'name' => 'sdsfdgrthjhjk'
        ]);

         Client::create([
            'name' => 'sdccxzvxcv'
        ]);

         Client::create([
            'name' => 'fdsfsfds'
        ]);

        $department1 = Department::create([
            'title' => 'Development'
        ]);

        $department2 = Department::create([
            'title' => 'Analytics'
        ]);

        $position1 = Position::create([
            'title' => 'Developer',
            'department_id' => $department1->id
        ]);

        $position2 = Position::create([
            'title' => 'Manager',
            'department_id' => $department1->id
        ]);

        $position3 = Position::create([
            'title' => 'Kaban Kabanych',
            'department_id' => $department1->id
        ]);

        $workerData1 = [
            'first_name' => 'Jack',
            'last_name' => 'Black',
            'email' => 'j@black.com',
            'age' => 34,
            'description' => 'Pohui+pohui',
            'is_married' => false,
            'position_id' => $position1->id
        ];

        $workerData2 = [
            'first_name' => 'Alex',
            'last_name' => 'White',
            'email' => 'a@w.com',
            'age' => 45,
            'description' => 'Pohui+pohui+poebat',
            'is_married' => true,
            'position_id' => $position2->id
        ];

        $workerData3 = [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'j@doe.com',
            'age' => 24,
            'description' => 'sdfghjkl',
            'is_married' => false,
            'position_id' => $position1->id
        ];

        $workerData4 = [
            'first_name' => 'Valera',
            'last_name' => 'Zveroeb',
            'email' => 'v@z.com',
            'age' => 54,
            'description' => 'Voroval i ubival v 90-e',
            'is_married' => true,
            'position_id' => $position3->id
        ];

        $workerData5 = [
            'first_name' => 'wr',
            'last_name' => 'wewq',
            'email' => 'j@dweqeqwe.com',
            'age' => 34,
            'description' => 'sdfgsdhjkl',
            'is_married' => false,
            'position_id' => $position2->id
        ];

        $workerData6 = [
            'first_name' => 'dasdasd',
            'last_name' => 'Dsadads',
            'email' => 'j@dhjhgj.com',
            'age' => 20,
            'description' => 'sdfghjkl',
            'is_married' => false,
            'position_id' => $position1->id
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);

        $profileData1 = [
            'city' => 'Chelyabinsk',
            'skill' => 'Blowjobs',
            'experience' => 3,
            'finished_study_at' => '2016-06-23',
        ];

        $profileData2 = [
            'city' => 'Chelyabinsk',
            'skill' => 'Terror',
            'experience' => 24,
            'finished_study_at' => '2007-06-23',
        ];

        $profileData3 = [
            'city' => 'Ust-podzalupinsk',
            'skill' => 'Obedience',
            'experience' => 4,
            'finished_study_at' => '2017-06-23',
        ];

        $profileData4 = [
            'city' => 'Ust-muhosransk',
            'skill' => 'Violence',
            'experience' => 4,
        ];

        $profileData5 = [
            'city' => 'Moscow',
            'skill' => 'JS-makaka',
            'experience' => 3,
            'finished_study_at' => '2017-06-23',
        ];

        $profileData6 = [
            'city' => 'St-Petersburg',
            'skill' => 'PHP-Slonyara',
            'experience' => 8,
            'finished_study_at' => '2017-06-23',
        ];

        $worker1->profile()->create($profileData1);
        $worker2->profile()->create($profileData2);
        $worker3->profile()->create($profileData3);
        $worker4->profile()->create($profileData4);
        $worker5->profile()->create($profileData5);
        $worker6->profile()->create($profileData6);
    }

    private function prepareManyToMany()
    {
        $worker1 = Worker::find(1);
        $worker3 = Worker::find(3);

        $worker5 = Worker::find(5);
        $worker6 = Worker::find(6);

        $manager = Worker::find(2);
        $kaban = Worker::find(4);

        $project1 = Project::create([
            'title' => 'Shop'
        ]);
        $project2 = Project::create([
            'title' => 'ERP'
        ]);

        $project1->workers()->attach([
            $worker1->id,
            $worker3->id,
            $manager->id,
            $kaban->id
        ]);

        $project2->workers()->attach([
            $worker5->id,
            $worker6->id,
            $manager->id,
            $kaban->id
        ]);

    }
}
