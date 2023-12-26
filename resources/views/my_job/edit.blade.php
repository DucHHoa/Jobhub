<x-layout>
    <div class= "mt-8 mb-8 max-w-4xl mx-auto">
        <x-nav-arrow :links="['My Job' => route('my-jobs.index'),'Edit Job' => '#' ]" class="mb-4"/>
        <x-card>
            <form action="{{ route('my-jobs.update', $job) }}" method="POST">
                @csrf
                @method('PUT')
                <div class=" max-w-full mb-4 grid grid-cols-3 gap-4">
                    <div>
                        <x-label for="title" :required="true" >Job title</x-label>
                        <x-text-input name="title" :value="$job->title"/>
                        @error('title')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <x-label for="location" :required="true">Location</x-label>
                        <x-text-input name="location" value="{{$job->location}}"/>
                        @error('location')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <x-label for="salary" :required="true">Salary</x-label>
                        <x-text-input name="salary" type="number" :value="$job->salary"/>
                        @error('salary')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-3">
                        <x-label for="description" :required="true">Description</x-label>
                        <textarea name="description" class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm 
                                 ring-1 ring-slate-300 placeholder:text-slate-500 focus:ring-2"
                                 value="{{$job->description}}">
                        </textarea>
                        @error('description')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="col-span-2 pl-16">
                        <x-label for="category" :required="true">Category</x-label>
                        <x-radio-group name="category" 
                            :all-options="false" :value="$job->Category"
                            :options="\App\Models\Job::$category"/>
                        @error('category')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div >
                        <x-label for="experience" :required="true">Experience</x-label>
                        <x-radio-group name="experience" 
                            :all-options="false" :value="$job->Experience"
                            :options="\App\Models\Job::$experience"/>
                        @error('experience')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-3 text-center">
                        <x-button type="submit" class="bg-green-400">Update job</x-button>
                    </div>
                    
                    
                </div>
            </form>
        </x-card>
    </div>
</x-layout>