<x-layout>
    <div class="hero min-h-screen bg-base-200">
        {{-- @foreach ($playerQuery as $player) --}}
        <div class="hero-content flex-col w-3/4">
            <form>
                <div class="text-center lg:text-top mt-24">
                    <h1 class="text-5xl font-bold">{{ $player->name }}</h1>
                    {{-- <p class="py-4">Thank you for considering Fysikbasserne as your future home! Make sure you have
                        made
                        yourself familiar with our wowprogress post before applying.</p> --}}
                </div>
            </form>

            <div class="card flex-shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
                <form action="/dashboard/form/{{ $player->id }}">
                    <div class="card-body">

                        @foreach ($player->characters as $character)

                            <div class="border-b-2 border-gray-700 px-6 py-3 text-opacity-80 font-medium leading-tight">
                                <ul class="-mb-[2px] flex flex-row flex-wrap justify-between">
                                    <li class="-mt-[5px] mr-auto flex flex-row gap-1.5">
                                        <div class="text-2xl text-gray-400 font-semibold">{{ $character->name }}</div>
                                        <div class="text-lg text-gray-400 font-semibold mt-[4px]">({{ $character->class }})</div>
                                    </li>
                                    <li class="mt-[1px] ml-auto flex flex-row gap-2">
                                        <a href="https://worldofwarcraft.blizzard.com/en-gb/character/eu/tarren-mill/{{ $character->name }}">
                                            <img src="{{ asset('images/wowarmory.png') }}">
                                        </a>
                                        <a href="https://raider.io/characters/eu/tarren-mill/{{ $character->name }}">
                                            <img src="{{ asset('images/raiderio.png') }}">
                                        </a>
                                        <a href="https://www.warcraftlogs.com/character/eu/tarren-mill/{{ $character->name }}">
                                            <img src="{{ asset('images/wlogs.png') }}">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            

                            {{-- <div class="divider"></div> --}}
                        @endforeach

                        {{-- Submit --}}
                        <table class="mt-6">
                            <tr>
                                <td class=" w-56">
                                    <div class="form-control">
                                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                                    </div>
                                </td>
                                <td class="w-56">
                                    <form method="POST" action="/dashboard/form/{{ $player->id }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-control">
                                            <button class="btn btn-primary w-auto">Update</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </table>

                    </div>
            </div>
            {{-- @endforeach --}}
        </div>

</x-layout>
