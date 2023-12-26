<x-layout >
  <div class="w-4/12 mx-auto">
    
    <x-card class="py-8 px-16 mt-16 mb-8">
      <div class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase">
           Welcome back!
      </div>
        <form action="{{route('auth.store')}}" method="POST">
            @csrf
            <div class="mt-8 mb-8 text-center">
                <x-label for="email" :required="true">Email</x-label>
                <x-text-input name="email" class="w-full" />
            </div>

            <div class="mb-8 text-center">
                <x-label for="password" :required="true">
                    Password
                </x-label>
                <x-text-input class="w-full" name="password" type="password"/>
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div>
                  <div class="flex items-center space-x-2">
                    <input type="checkbox" name="remember"
                      class="rounded-sm border border-slate-400">
                    <label for="remember">Remember me</label>
                  </div>
                </div>
                <div>
                  <a href="{{route('register')}}" class="text-indigo-600 hover:underline">
                    Register?
                  </a>
                </div>
              </div>   
              <x-button class="w-full bg-blue-50">Login</x-button>
        </form>
    </x-card>
  </div>
</x-layout>