<?php

namespace App\Console\Commands;

use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectWorker;
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

//        $project = Project::find(1);
//        $workers = $project->workers->toArray();

//        $worker = Worker::find(4);
//        $projects = $worker->projects->toArray();

        $project = Project::find(1);
        $worker5 = Worker::find(5);
        $worker2 = Worker::find(2);
        $worker3 = Worker::find(3);
        $worker4 = Worker::find(4);

        $project->workers()->toggle([$worker5->id, $worker2->id]);

        dd($worker5->toArray());
        return 0;
    }

    private function prepareData()
    {
        $position1 = Position::create([
            'title' => 'Developer'
        ]);
        $position2 = Position::create([
            'title' => 'Manager'
        ]);
        $position3 = Position::create([
            'title' => 'Kaban Kabanych'
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
            'worker_id' => $worker1->id,
            'city' => 'Chelyabinsk',
            'skill' => 'Blowjobs',
            'experience' => 3,
            'finished_study_at' => '2016-06-23',
        ];

        $profileData2 = [
            'worker_id' => $worker2->id,
            'city' => 'Chelyabinsk',
            'skill' => 'Terror',
            'experience' => 24,
            'finished_study_at' => '2007-06-23',
        ];

        $profileData3 = [
            'worker_id' => $worker3->id,
            'city' => 'Ust-podzalupinsk',
            'skill' => 'Obedience',
            'experience' => 4,
            'finished_study_at' => '2017-06-23',
        ];

        $profileData4 = [
            'worker_id' => $worker4->id,
            'city' => 'Ust-muhosransk',
            'skill' => 'Violence',
            'experience' => 4,
        ];

        $profileData5 = [
            'worker_id' => $worker5->id,
            'city' => 'Moscow',
            'skill' => 'JS-makaka',
            'experience' => 3,
            'finished_study_at' => '2017-06-23',
        ];

        $profileData6 = [
            'worker_id' => $worker6->id,
            'city' => 'St-Petersburg',
            'skill' => 'PHP-Slonyara',
            'experience' => 8,
            'finished_study_at' => '2017-06-23',
        ];

        $profile1 = Profile::create($profileData1);
        $profile2 = Profile::create($profileData2);
        $profile3 = Profile::create($profileData3);
        $profile4 = Profile::create($profileData4);
        $profile5 = Profile::create($profileData5);
        $profile6 = Profile::create($profileData6);
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

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $worker1->id
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $worker3->id
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $manager->id
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $kaban->id
        ]);



        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $worker5->id
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $worker6->id
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $manager->id
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $kaban->id
        ]);
    }
}
