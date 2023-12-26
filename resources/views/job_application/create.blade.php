<x-layout>
    <div class= "mt-8 mb-8 max-w-5xl mx-auto" >
        <x-nav-arrow class="mb-4"
        :links="['jobs' => route('jobs.index'), $job->title=>route( 'jobs.show',$job),'Apply'=>'#']"/>
        <x-job-card :job="$job"/>
             
        <x-card>
            <h2 class="mb-4 text-lg font-serif ">
                Application</h2>
            <form action="{{route('jobs.application.store',$job)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <x-label for="expected_salary" :required="true" > Expected Salary </x-label>
                    <input type="number" name="expected_salary" id="expected_salary" value="{{old('expected_salary')}}"
                        class="w-1/6 rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-500 focus:ring-2">  
                        @error('expected_salary')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                <div class="mb-4">
                    <x-label for="cv" :required="true" > Upload cv </x-label>
                    <input type="file" name="cv" id="cv" 
                        class="w-1/6 rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-500 focus:ring-2">               
                    @error('cv')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    </div>
                <x-button>Apply</x-button>
            </form>
        </x-card>
    </div>
</x-layout>