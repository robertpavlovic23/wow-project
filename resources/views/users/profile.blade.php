<x-layout>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col w-3/4]">
            <div class="text-center lg:text-top mt-8">
                <h1 class="text-5xl font-bold">Profile</h1>
                <p class="py-6">Change your user information here</p>
            </div>
            <div class="card flex-shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
                <div class="card-body">
                    <form action="/user/update" method="POST">
                        @csrf
                        @method('PUT')
                        <table>
                            <tr>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Username</span>
                                        </label>
                                        <input type="text" name="name" value="{{ $user->name }}"
                                            class="input input-bordered" />
                                        @error('name')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Email</span>
                                        </label>
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="input input-bordered" />
                                        @error('email')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">New password</span>
                            </label>
                            <input type="password" name="password" value="{{ old('username') }}"
                                class="input input-bordered" />
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Confirm Password</span>
                            </label>
                            <input type="password" name="password_confirmation" value="{{ old('email') }}"
                                class="input input-bordered" />
                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Old password</span>
                            </label>
                            <input type="password" name="oldPassword" value="{{ old('email') }}"
                                class="input input-bordered" />
                            @error('oldPassword')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-control mt-6">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    <form method="POST" action="/user/destroy/{{ $user->id }}">
                        @csrf
                        @method('DELETE')
                        <div class="form-control">
                            <button
                                class="btn btn-primary bg-red-700 bg-opacity-90 hover:bg-red-600 w-auto">Delete account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
