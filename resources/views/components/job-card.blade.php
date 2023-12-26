
    <x-card class="mb-4">
        <div class=" mb-4 flex justify-between">
            <a href="{{route('jobs.show',$job)}}"
                class="text-lg font-medium">{{$job->title}}
            </a>
            <h2 class="text-slate-500">
                ${{number_format($job->salary) }}
            </h2>
        </div>

        <div class="mb-4 flex justify-between text-slate-500">
            <div class="flex space-x-4">
                <div>{{$job->employers->company_name}}</div>
                <div> {{$job->location}} </div>
                <div>
                    @if ($job->deleted_at)
                        <p class="tetx-sm text-red-600">Deleted</p>
                    @endif
                </div>
            </div>
            <div class="flex space-x-3 text-xs">
                <x-tag>      
                    <a href="{{route('jobs.index',['experience'=>$job->experience])}}">
                        {{Str::ucfirst($job->experience)}}</a>
                </x-tag>
                <x-tag>
                    <a href="{{route('jobs.index',['category'=>$job->category])}}">
                    {{$job->category}}
                    </a>
                </x-tag>   
                
            </div>
        </div>
       
        {{$slot}}
    </x-card>
