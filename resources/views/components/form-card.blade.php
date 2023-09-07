@props(['form'])

<div class="block rounded-2xl bg-base-100 shadow-xl ">
    {{-- Title --}}
    <div class="border-b-2 border-gray-700 px-6 py-3 text-opacity-80 font-medium leading-tight">
        <ul class="-mb-[2px] flex flex-row flex-wrap justify-between">
            <li class="-mt-[5px] mr-auto flex flex-row gap-1.5">
                <div class="text-2xl text-gray-400 font-semibold">{{ $form->character_name }}</div>
                <div class="text-lg text-gray-400 font-semibold mt-[4px]">({{ $form->battle_net_tag }})</div>
            </li>
            <li class="mt-[1px] ml-auto flex flex-row gap-2">
                <a href="{{ $form->wow_armory }}">
                    <img src="{{ asset('images/wowarmory.png') }}">
                </a>
                <a href="{{ $form->raiderio }}">
                    <img src="{{ asset('images/raiderio.png') }}">
                </a>
                <a href="{{ $form->warcraftlogs }}">
                    <img src="{{ asset('images/wlogs.png') }}">
                </a>
            </li>
        </ul>
    </div>


    <div class="p-6">
        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
            {{ $form->history }}
        </h5>

        <div>
            <ul class="-mb-[2px] flex flex-row flex-wrap justify-between">
                <li class="justify-start">
                    <x-form-tags :tagsCsv="$form->class" />
                </li>
                <li class="justify-end mt-3">
                    <a href="/forms/{{ $form->id }}" class="btn btn-primary shadow-xl opacity-90">See
                        more</a>
                </li>
            </ul>
        </div>
    </div>
</div>

{{-- <div tabindex="0" class="collapse bg-base-200">
    <div class="collapse-title text-xl font-medium">
        Focus me to see content
    </div>
    <div class="collapse-content">
        <p>tabindex="0" attribute is necessary to make the div focusable</p>
    </div>
</div> --}}
