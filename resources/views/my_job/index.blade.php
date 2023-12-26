<x-layout>
    <div class= "mt-8 mb-8 max-w-5xl mx-auto">      
        <x-nav-arrow :links="['My Job' => route('my-jobs.index')]" class="mb-4"/>
        
            {{-- @if ($jobs->jobApplications->contains('user_id', auth()->id()))             --}}
                <div class="text-right mb-2 ">
                    <x-link-button href="{{route('my-jobs.create')}}">New Job</x-link-button>
                </div>
            {{-- @endif --}}
        @forelse ($jobs as $job )

            <x-job-card :$job>
                <b class="text-lg font-medium ">Description</b><br>
                {!! nl2br($job->description) !!}
                @if ($job->deleted_at == null)
                    
                    <div class="mt-2 flex gap-3">
                        <x-link-button  :href="route('my-jobs.show',$job)">
                            Show
                        </x-link-button>

                        <x-link-button :href="route('my-jobs.edit',$job)">
                            Edit
                        </x-link-button>
                        <form action="{{route('my-jobs.destroy', $job)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button>Delete</x-button>
                        </form>
                    </div>
                @endif
                {{-- <div class="mt-2 mb-2">
                    Other offer {{$application->job->job_applications_count - 1}}
                    {{Str::plural('offer', $application->job->job_applications_count -1)}}
                            
                </div>          --}}
            </x-job-card>
        @empty
            <div class="rounded-sm border border-dashed p-8">
                <div class="text-center font-medium">
                    No job now!
                </div>
                <div class="text-center">
                    Click <a href="{{route('my-jobs.create')}}" class="text-indigo-600">here</a> to create new Jobs
                </div>
            </div>   
        @endforelse
        
        
    </div>
</x-layout>