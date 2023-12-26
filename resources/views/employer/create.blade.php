<x-layout>
  <div class="mt-8 mb-8 max-w-5xl mx-auto">
      
          @if(auth()->user() && auth()->user()->employer)
            <div class="rounded-sm border border-dashed p-8">
              <div class="text-center font-medium">
                You are already registered as an employer.
              </div>
              <div class="text-center">
                  Click <a href="{{route('my-jobs.index')}}" class="text-indigo-600">here</a> to my job
              </div>
            </div>
          @else
          <x-card>
              <form method="POST" action="{{ route('employer.store') }}">
                  @csrf
                  <div class="mb-2">
                      <x-label for="company_name" :required="true">Company name</x-label>
                      <x-text-input name="company_name" class="w-1/4"></x-text-input>
                      @error('error')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                      @enderror
                  </div>
                  <x-button>Create</x-button>
              </form>
            </x-card>
          @endif
      
  </div>
</x-layout>
