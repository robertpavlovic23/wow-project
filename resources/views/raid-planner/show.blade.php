<x-layout>
    <div class="w-full bg-base-200 min-h-screen">
        <div class="grid grid-cols-1 2xl:grid-cols-12 gap-4 space-y-4 lg:space-y-0 lg:p-36">
            <div class="overflow-x-auto 2xl:col-span-9 ">
                {{-- Table --}}
                <table class="table w-max text-xl">
                    @unless (count($characters) == 0)
                        <!-- head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Spec</th>
                                <th>user_ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- rows -->
                            @foreach ($characters as $character)
                                <x-character-table-listing :character="$character" />
                            @endforeach
                        @else
                            <!-- if null -->
                            <tr>
                                <th>No characters found</th>
                            </tr>
                        </tbody>
                    @endunless
                </table>
            </div>
            
            <div class="collapse collapse-open bg-base-100 2xl:col-span-3">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium">
                    Create a new character
                </div>
                <div class="collapse-content">
                    <form action="/character/create" method="POST">
                        @csrf
                        
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Name</span>
                            </label>
                            <input type="text" name="character_name" value="{{ old('character_name') }}"
                                class="input input-bordered" />
                            @error('character_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-classSpecSelect />

                        <div class="form-control mt-6">
                            <button class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
