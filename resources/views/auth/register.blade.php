<x-layout >
    <div class="w-4/12 mx-auto">
      
      <x-card class="py-8 px-16 mt-16 mb-8">
        <div class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase">
             Register
        </div>
          <form action="{{route('registerPost')}}" method="POST">
            @csrf
            
            <div class="mt-8 mb-8 ">
                <x-label for="name" :required="true">Name</x-label>
                <x-text-input name="name" class="w-full" Placeholder="You name"/>
            </div>
            <div class="mt-8 mb-8 ">
                <x-label for="email" :required="true">Email</x-label>
                <x-text-input name="email" class="w-full" Placeholder="You email"/>
                @error('email')
                    <div class="text-sm text-red-500">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-8 ">
                <x-label for="password" :required="true">
                    Password
                </x-label>
                <x-text-input class="w-full" name="password" type="password" Placeholder="Passwrod"/>
                @error('password')
                    <div class="text-sm text-red-500">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-8 ">
                <x-label for="repassword" :required="true">
                     Re-enter password
                </x-label>
                <x-text-input class="w-full" name="repassword" type="password" Placeholder="Re-enter password"/>
                @error('repassword')
                    <div class="text-sm text-red-500">{{$message}}</div>
                @enderror
            </div>
            
              <div class="mb-8 text-right text-sm font-medium">
                 
                  <div>
                    <a href="{{route('auth.create')}}" class="text-indigo-600 hover:underline">
                      Login?
                    </a>
                  </div>
                </div>   
                <x-button class="w-full bg-blue-50">Register</x-button>
          </form>
      </x-card>
    </div>
  </x-layout>