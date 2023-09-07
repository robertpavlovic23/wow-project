<x-layout>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col w-3/4">
            <div class="text-center lg:text-top mt-8">
                <h1 class="text-5xl font-bold">Sign in</h1>
                <p class="py-6"></p>
            </div>
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <form action="/users/authenticate" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input type="email" name="email" placeholder="Example: test@gmail.com" value="{{ old('email') }}"
                                class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                            @error('email')
                                <p class="text-red-500 text-cs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input type="password" name="password" value="{{ old('email') }}" class="input input-bordered" />
                            @error('password')
                                <p class="text-red-500 text-cs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-control mt-6">
                            <button class="btn btn-primary">Login</button>
                        </div>
                        <label class="label flex-col">
                            <a href="/register" class="label-text-alt link link-hover">Don't have an account?</a>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
