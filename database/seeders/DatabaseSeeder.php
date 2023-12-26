<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Duchoa',
             'email' => 'duchoa@gmail.com',
        ]);

        \App\Models\User::factory(200)->create();

        $users = \App\Models\User::all()->shuffle();

        //lay user dc shuffle -> tao employer voi == users_id -> xoa user -> tao employer
        for($i = 0; $i <= 20; $i++){
            \App\Models\Employers::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = \App\Models\Employers::all();
        // tao jobs voi emplory_id == ramdom(employer.id) 
        for($i = 0; $i < 100; $i++){
            \App\Models\Job::factory()->create([
                'employers_id' => $employers->random()->id
            ]);
        }

        foreach($users as $user){
            $jobs = \App\Models\Job::inRandomOrder()->take(rand(1,4))->get();

            foreach($jobs as $job){
                \App\Models\JobApplication::factory()->create([
                    'job_id' => $job->id,
                    'user_id' => $user->id
                ]);
            }

        }
        

        
    }
}
