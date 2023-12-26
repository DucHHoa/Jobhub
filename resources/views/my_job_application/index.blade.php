<x-layout>
    <div class="mt-16 mb-8 max-w-5xl mx-auto">
        <x-nav-arrow class="mb-4"
            :links="['My Job Application' => '#']" />
    
    @forelse ($applications as $application )
        <x-job-card :job="$application->job">
            <div class="flex items-center justify-between text-sm text-slate-600">

                <div>
                    <div>
                        Submitted {{$application->created_at->diffForHumans()}}
                    </div>
                    <div class="mt-2">
                       You offer salary ${{number_format($application->expected_salary)}}
                    </div>
                    {{-- <div class="mt-2">
                        Average offer salary
                        {{number_format($application->job->job_applications_avg_expected_salary)}}
                    </div>
                    <div class="mt-2 mb-2">
                        Other offer {{$application->job->job_applications_count - 1}}
                        {{Str::plural('offer', $application->job->job_applications_count -1)}}
                                
                    </div> --}}
                </div>

                </div >
                    <form method="POST" action="{{route('my-jobs-application.destroy', $application)}}">
                        @csrf
                        @method('DELETE')
                        <x-button class="mt-3">Cancel</x-button>
                    </form>
                <div>

            </div>
        </x-job-card>
        @empty
            <div class="rounded-sm border border-dashed p-8">
                <div class="text-center font-medium">
                    No job application now!
                </div>
                <div class="text-center">
                    Click <a href="{{route('jobs.index')}}" class="text-indigo-600">here</a> to find Jobs
                </div>
            </div>
    @endforelse

    </div>
</x-layout>