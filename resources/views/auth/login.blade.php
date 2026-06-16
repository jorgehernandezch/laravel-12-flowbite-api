<x-guest-layout>
    <section class="w-96 p-4 sm:p-4">
        <div class="flex flex-col items-center justify-center lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Flowbite    
            </a>
            <div class="w-full">
                <div class=" space-y-4 md:space-y-6 ">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <x-inputs.text 
                            name="email" 
                            :errors="$errors" 
                            label="Email" 
                            placeholder="name@company.com"
                            icon="fa-envelope"
                            styles="w-full"
                            required
                        />
                        <x-inputs.text 
                            name="password" 
                            :errors="$errors" 
                            label="Password" 
                            type="password"
                            placeholder="••••••••"
                            icon="fa-lock"
                            styles="w-full"
                            required
                        />
                        <div class="flex items-center justify-between">
                            <a href={{ route('register') }} class="text-sm font-medium text-gray-500 hover:underline">Create an account</a>
                            <a href="#" class="text-sm font-medium text-gray-500 hover:underline">Forgot password?</a>
                        </div> 
                        <x-buttons.submit class="w-full" text="Sign in">
                        </x-buttons.submit>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
