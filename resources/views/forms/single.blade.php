<x-layout>

    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col w-3/4">
            <form action="/forms/{{ $form->id }}">
                <div class="text-center lg:text-top mt-24">
                    <h1 class="text-5xl font-bold">{{ $form->character_name . ' - ' . $form->character_realm }}</h1>
                    {{-- <p class="py-4">Thank you for considering Fysikbasserne as your future home! Make sure you have
                        made
                        yourself familiar with our wowprogress post before applying.</p> --}}
                </div>
            </form>

            <div class="card flex-shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
                <form action="/dashboard/form/{{ $form->id }}">
                    <div class="card-body">

                        {{-- Country , Age --}}
                        <table>
                            <tr>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Country</span>
                                        </label>
                                        <input type="text" readonly name="country" value="{{ $form->country }}"
                                            class="input input-bordered" />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Age</span>
                                        </label>
                                        <input type="text" readonly name="age" value="{{ $form->age }}"
                                            class="input input-bordered" />
                                    </div>
                                </td>
                            </tr>
                        </table>

                        {{-- Battle-net , Discord --}}
                        <table>
                            <tr>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Battle-net
                                                tag</span>
                                        </label>
                                        <input type="text" readonly name="battle_net_tag"
                                            value="{{ $form->battle_net_tag }}" class="input input-bordered" />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Discord
                                                tag</span>
                                        </label>
                                        <input type="text" readonly name="discord_tag"
                                            value="{{ $form->discord_tag }}" class="input input-bordered " />
                                    </div>
                                </td>
                            </tr>
                        </table>

                        {{-- Character name , realm --}}
                        <table>
                            <tr>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Character
                                                name</span>
                                        </label>
                                        <input type="text" readonly name="character_name"
                                            value="{{ $form->character_name }}" class="input input-bordered" />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Realm</span>
                                        </label>
                                        <input type="text" readonly name="character_realm"
                                            value="{{ $form->character_realm }}" class="input input-bordered" />
                                    </div>
                                </td>
                            </tr>
                        </table>


                        {{-- Class , Spec --}}
                        <table>
                            <tr>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Class</span>
                                        </label>
                                        <input type="text" readonly name="class" placeholder="Example: Warrior"
                                            value="{{ $form->class }}"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Spec</span>
                                        </label>
                                        <input type="text" readonly name="spec" placeholder="Example: Arms/Fury"
                                            value="{{ $form->spec }}"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div class="divider"></div>

                        {{-- Alt Toggle Checkbox --}}
                        <table>
                            <div class="form-control">
                                <td>
                                    <label class="label">
                                        <span class="label-text text-[16px] text-white opacity-80">Do you have an alt
                                            suitable for mythic?</span>
                                    </label>
                                </td>
                                <td>
                                    <input type="checkbox" readonly name="altToggle" id="altToggle"
                                        class="toggle toggle-success ml-7 mt-2" />
                                </td>
                            </div>
                        </table>

                        <div class="divider"></div>

                        {{-- UI --}}
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Link to your UI
                                    in a raid
                                    encounter or VOD of you playing</span>
                            </label>
                            <input type="text" readonly name="ui_vod" value="{{ $form->ui_vod }}"
                                class="input input-bordered" />
                        </div>

                        {{-- Alt Display --}}
                        <table id="tableAltToggle">
                            <tr>
                                <td>
                                    {{-- Main Logs --}}
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Link to your
                                                current tier logs</span>
                                        </label>
                                        <input type="text" readonly name="warcraftlogs_main"
                                            value="{{ $form->warcraftlogs_main }}" placeholder="Main"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                    </div>
                                </td>
                                <td>
                                    {{-- Alt Logs --}}
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-0">Link to your
                                                current tier logs</span>
                                        </label>
                                        <input type="text" readonly name="warcraftlogs_alt"
                                            value="{{ $form->warcraftlogs_alt }}" placeholder="Alt"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{-- Main Raiderio --}}
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Link to your
                                                raiderio page</span>
                                        </label>
                                        <input type="text" readonly name="raiderio_main"
                                            value="{{ $form->raiderio_main }}" placeholder="Main"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                    </div>
                                </td>
                                <td>
                                    {{-- Alt Raiderio --}}
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-0">Link to your
                                                raiderio page</span>
                                        </label>
                                        <input type="text" readonly name="raiderio_alt"
                                            value="{{ $form->raiderio_alt }}" placeholder="Alt"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{-- Main Armory --}}
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Link to your WoW
                                                Armory</span>
                                        </label>
                                        <input type="text" readonly name="wow_armory_main"
                                            value="{{ $form->wow_armory_main }}" placeholder="Main"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                    </div>
                                </td>
                                <td>
                                    {{-- Alt Armory --}}
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-0">Link to your WoW
                                                Armory</span>
                                        </label>
                                        <input type="text" readonly name="wow_armory_alt"
                                            value="{{ $form->wow_armory_alt }}" placeholder="Alt"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                            </tr>
                        </table>

                        {{-- No Alt Display --}}
                        <div id="divNoAltToggle">
                            {{-- No Alt Logs --}}
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text text-[16px] text-white opacity-80">Link to your current
                                        tier
                                        logs</span>
                                </label>
                                <input type="text" readonly name="warcraftlogs" value="{{ $form->warcraftlogs }}"
                                    class="input input-bordered" />
                            </div>

                            {{-- No Alt Raiderio --}}
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text text-[16px] text-white opacity-80">Link to your raiderio
                                        page</span>
                                </label>
                                <input type="text" readonly name="raiderio" value="{{ $form->raiderio }}"
                                    class="input input-bordered" />
                            </div>

                            {{-- No Alt Armory --}}
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text text-[16px] text-white opacity-80">Link to your WoW
                                        Armory</span>
                                </label>
                                <input type="text" readonly name="wow_armory" value="{{ $form->wow_armory }}"
                                    class="input input-bordered" />
                            </div>
                        </div>

                        <div class="divider"></div>

                        {{-- Plans --}}
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Are there any planned events
                                    or anything that we need to know about that can prevent you from raiding in the
                                    foreseeable future?</span>
                            </label>
                            <textarea readonly class="textarea textarea-bordered text-base" placeholder="Bio"> {{ $form->plans }}</textarea>
                        </div>

                        {{-- History --}}
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">What is your raid and guild
                                    history and reasons for leaving? Why did you choose us?</span>
                            </label>
                            <textarea readonly class="textarea textarea-bordered text-base" placeholder="Bio"> {{ $form->history }}</textarea>
                        </div>

                        {{-- Why --}}
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Why should we pick you? How
                                    do you stand out from other applicants?</span>
                            </label>
                            <textarea readonly class="textarea textarea-bordered text-base" placeholder="Bio"> {{ $form->pick }}</textarea>
                        </div>

                        {{-- Additional --}}
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Anything else you'd like us
                                    to know?</span>
                            </label>
                            <textarea readonly class="textarea textarea-bordered text-base" placeholder="Bio"> {{ $form->additional }}</textarea>
                        </div>
                </form>
                <table class="mt-6">
                    <tr>
                        <td class=" w-56">
                            <div class="form-control">
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            </div>
                        </td>
                        <td class="w-56">
                            <form method="POST" action="/dashboard/form/{{ $form->id }}">
                                @csrf
                                @method('DELETE')
                                <div class="form-control">
                                    <button class="btn btn-primary bg-red-700 bg-opacity-90 hover:bg-red-600 w-auto">Delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

    </div>
    </div>

</x-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get references to the checkbox and the div
        var checkbox = document.getElementById("altToggle");

        var tableAltToggle = document.getElementById("tableAltToggle");
        tableAltToggle.style.display = this.checked ? "block" : "none";

        var divNoAltToggle = document.getElementById("divNoAltToggle");
        divNoAltToggle.style.display = this.checked ? "none" : "block";

        // Add an event listener to the checkbox
        checkbox.addEventListener("change", function() {
            // Toggle the div's visibility based on the checkbox state
            tableAltToggle.style.display = this.checked ? "block" : "none";
            divNoAltToggle.style.display = this.checked ? "none" : "block";

        });

        // Initial state: hide the div if the checkbox is unchecked
        // if (checkbox.checked) {
        //     tableAltToggle.style.display = "block";
        //     tableNoAltToggle.style.display = "none";
        // }
    });
</script>
