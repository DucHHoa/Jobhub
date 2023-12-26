
<x-layout>
    <div class="mt-16 mb-8 max-w-5xl mx-auto">
        <x-nav-arrow class="mb-4"
        :links="['jobs' => route('jobs.index'), $job->title=>'#']"/>
        
        <x-job-card :$job>
            <div>
                <p class="text-sm text-slate-500">
                    {!! nl2br($job->description) !!}
                </p>   
            </div>
            @auth
                @can('apply', $job)
                <div class="mt-5">
                    <x-link-button :href="route('jobs.application.create', $job)">
                        Apply
                    </x-link-button>
                </div>
                    @else
                    <div class="text-center text-sm font-medium text-slate-500">
                        You already applied to this job
                    </div>
                @endcan
            @else
                <div class="mt-5">
                    <x-link-button :href="route('login', $job)">
                        Apply
                    </x-link-button>
                </div> 
            @endauth
            
        
        </x-job-card>

        <x-card :$job class="mb-4">
            <h2 class="mb-4 text-2xl">More {{$job->employers->company_name}} jobs</h2>
            @foreach ($job->employers->jobs as $ortherJob )    
                <div class="mb-4 flex justify-between bg-slate-100 border rounded-md">
                    <div class="mb-4 mt-1 ml-2" >
                        <div>
                            <a href="{{route('jobs.show',$ortherJob)}}">{{$ortherJob->title}}</a>
                            
                        </div>
                        <div class="text-sm text-slate-500">
                            {{$ortherJob->created_at->diffForHumans()}}
                        </div>

                    </div>
                    <div class="mb-4 mt-1 mr-2">
                        <div class="text-end">
                            ${{number_format( $ortherJob->salary)}}
                            <div class="mt-1 text-sm text-slate-500">
                                <x-tag >
                                    {{$ortherJob->category}}
                                </x-tag>
                            </div>
                        </div>
                    </div>
                </div>
            
            @endforeach
        </x-card>
       
    </div>
  </x-layout>
