<x-layout>
    <div class="w-full bg-base-200 min-h-screen">
        <div class="grid grid-cols-1 2xl:grid-cols-12 gap-4 space-y-4 lg:space-y-0 lg:p-36">
            <div class="2xl:col-span-9">
                <livewire:raid-planner />
            </div>

            {{-- Right Side of the Page --}}
            <div class="2xl:col-span-3">
                {{-- Add a Player --}}
                <div class="collapse collapse-open bg-base-100 h-[240px]">
                    <input type="checkbox" />
                    <div class="collapse-title text-xl font-medium">
                        Add a new player
                    </div>
                    <div class="collapse-content">
                        <form action="/player/create" method="POST">
                            @csrf

                            <div class="form-control">
                                <table>
                                    <tr>
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Name</span>
                                        </label>
                                    </tr>
                                    <tr>
                                        <td>

                                            <input type="text" name="name" value="{{ old('player_name') }}"
                                                class="input input-bordered" />
                                            @error('player_name')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <select id="playerRank" name="rank" class="select">
                                                <option value="Raider">Raider</option>
                                                <option value="Trial">Trial</option>
                                                <option value="Social">Social</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            {{-- <x-classSpecSelect /> --}}

                            <div class="form-control mt-6">
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

                <br>

                {{-- Add a Character --}}
                <div class="collapse collapse-open bg-base-100 h-[345px]">
                    <input type="checkbox" />
                    <div class="collapse-title text-xl font-medium">
                        Create a new character
                    </div>
                    <div class="collapse-content">
                        <form action="/character/create" method="POST">
                            @csrf

                            <table>
                                <tr>
                                    <td>
                                        For player:
                                    </td>
                                    <td>
                                        <select name="player_id" class="select ml-2 mt-[1px]">
                                            @foreach ($playersQuery as $player)
                                                <option value="{{ $player->id }}">{{ $player->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </table>

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
    </div>
</x-layout>
