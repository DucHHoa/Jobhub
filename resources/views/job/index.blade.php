    
 <x-layout >
        <div class="mt-16 mb-8 max-w-5xl mx-auto ">
            <x-nav-arrow class="mb-4"
            :links="['jobs' => route('jobs.index')]"/>
            <x-card class="mb-4 text-sm" x-data="">
                <form x-ref="filters" id="Fillter-from" action="{{route('jobs.index')}}" method="GET">
                    <div class="mb-4 grid grid-cols-2 gap-2">
                        <div>
                            <p class="mb-1 font-medium">Search</p>
                            <x-text-input class="w-3/4" name="search" value="{{request('search')}}" placeholder="Search for job title" form-ref="filters"/>
                        </div>
                        <div>
                            <p class="mb-1 font-medium">Salary</p>
                            <div class="flex gap-3">
                                <x-text-input  name="min_salary" value="{{request('min_salary')}}" placeholder="Form" form-ref="filters"/>
                                <x-text-input  name="max_salary" value="{{request('max_salary')}}" placeholder="To" form-ref="filters"/>      
                            </div>
                        </div>
                        <div>
                            <p class="mb-1 font-medium">Experience</p>
                            <x-radio-group name="experience" :options="\App\Models\Job::$experience"/>
                        </div>

                        <div>
                            <p class="mb-1 font-medium">Category</p>
                            <x-radio-group name="category" :options="\App\Models\Job::$category"/>
                        </div>
                    </div>
                    <x-button type="submit" class="w-full">Filter</x-button>
                </form>
            </x-card>

            <div class="grid grid-cols-2 gap-3" >
                @foreach ($jobs as $job)
                    <x-job-card class="mb-4" :$job>
                        
                    </x-job-card>      
                @endforeach
            </div>
            <div>   
                {{ $jobs -> links() }}     
            </div>
        </div>
  </x-layout>