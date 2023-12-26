<x-layout>
    <div class= "mt-8 mb-8 max-w-5xl mx-auto">      
        <x-nav-arrow :links="['My Job' => route('my-jobs.index'), $job->title=>'#']" class="mb-4"/>
        
        <div>       
            <x-job-card :$job>
                {!! nl2br($job->description) !!}      
            </x-job-card>   
        </div>
        <div class="ml-5 text-lg text-black hover:text-gray-500 font-bold ">
            All job application 
        </div>
        <div>
            @forelse ($job->jobApplications as $application )
                <x-card class="mb-4">
                    <div>
                        Name: {{$application->user->name}}
                    </div>
                    <div>
                        Email: {{$application->user->email}}
                    </div>
                    <div>
                        Applied: {{$application->created_at->diffForHumans()}}
                    </div>
                    <div>
                        <a href="{{ asset('storage/' . $application->cv_path) }}" download>
                            Download CV
                    </div>
                    <div>
                        Salary: {{number_format($application->expected_salary)}} 
                    </div>
                   

                </x-card>
            @empty
                <div class="rounded-sm border border-dashed p-8">
                    <div class="text-center font-medium">
                        No job application now!
                    </div>
                    {{-- <div class="text-center">
                        Click <a href="{{route('jobs.index')}}" class="text-indigo-600">here</a> to find Jobs
                    </div> --}}
                </div>
            @endforelse        
                
            
        </div>
    
            
        
        
        
    </div>
</x-layout>