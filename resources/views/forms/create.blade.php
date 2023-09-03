<x-layout>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col w-3/4">
            <div class="text-center lg:text-top mt-24">
                <h1 class="text-5xl font-bold">Fysikbasserne Application Form</h1>
                <p class="py-4">Thank you for considering Fysikbasserne as your future home! Make sure you have made
                    yourself familiar with our wowprogress post before applying.</p>
            </div>
            <div class="card flex-shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
                <div class="card-body">
                    <form action="/form/create" method="POST">
                        @csrf
                        {{-- Country , Age --}}
                        <table>
                            <tr>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Country</span>
                                        </label>
                                        <input type="text" name="country" value="{{ old('country') }}"
                                            class="input input-bordered" />
                                        @error('country')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Age</span>
                                        </label>
                                        <input type="text" name="age" value="{{ old('age') }}"
                                            class="input input-bordered" />
                                        @error('age')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
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
                                        <input type="text" name="battle_net_tag" value="{{ old('battle_net_tag') }}"
                                            class="input input-bordered" />
                                        @error('battle_net_tag')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Discord
                                                tag</span>
                                        </label>
                                        <input type="text" name="discord_tag" value="{{ old('discord_tag') }}"
                                            class="input input-bordered " />
                                        @error('discord_tag')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                        </table>

                        {{-- Character name --}}
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Character name - Realm</span>
                            </label>
                            <input type="text" name="character_name" placeholder="Example: Zmaito-TarrenMill"
                                value="{{ old('character_name') }}"
                                class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                            @error('character_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Class --}}
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Class + Spec</span>
                            </label>
                            <input type="text" name="role" value="{{ old('role') }}"
                                class="input input-bordered" />
                            @error('role')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

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
                                    <input type="checkbox" name="altToggle" id="altToggle"
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
                            <input type="text" name="ui_vod" value="{{ old('ui_vod') }}"
                                class="input input-bordered" />
                            @error('ui_vod')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
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
                                        <input type="text" name="warcraftlogs_main" value="{{ old('warcraftlogs_main') }}" placeholder="Main"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                        @error('warcraftlogs_main')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    {{-- Alt Logs --}}
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-0">Link to your
                                                current tier logs</span>
                                        </label>
                                        <input type="text" name="warcraftlogs_alt" value="{{ old('warcraftlogs_alt') }}" placeholder="Alt"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                        @error('warcraftlogs_alt')
                                            <p class="text-red-500 text-xs mt-1 ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{-- Main Raiderio --}}
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Link to your raiderio page</span>
                                        </label>
                                        <input type="text" name="raiderio_main" value="{{ old('raiderio_main') }}" placeholder="Main"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                        @error('raiderio_main')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    {{-- Alt Raiderio --}}
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-0">Link to your raiderio page</span>
                                        </label>
                                        <input type="text" name="raiderio_alt" value="{{ old('raiderio_alt') }}" placeholder="Alt"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                        @error('raiderio_alt')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{-- Main Armory --}}
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-80">Link to your WoW Armory</span>
                                        </label>
                                        <input type="text" name="wow_armory_main" value="{{ old('wow_armory_main') }}" placeholder="Main"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                        @error('wow_armory_main')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    {{-- Alt Armory --}}
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-[16px] text-white opacity-0">Link to your WoW Armory</span>
                                        </label>
                                        <input type="text" name="wow_armory_alt" value="{{ old('wow_armory_alt') }}" placeholder="Alt"
                                            class="input input-bordered placeholder:text-sm placeholder-gray-500" />
                                        @error('wow_armory_alt')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
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
                                <input type="text" name="warcraftlogs" value="{{ old('warcraftlogs') }}"
                                    class="input input-bordered" />
                                @error('warcraftlogs')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- No Alt Raiderio --}}
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text text-[16px] text-white opacity-80">Link to your raiderio
                                        page</span>
                                </label>
                                <input type="text" name="raiderio" value="{{ old('raiderio') }}"
                                    class="input input-bordered" />
                                @error('raiderio')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- No Alt Armory --}}
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text text-[16px] text-white opacity-80">Link to your WoW Armory</span>
                                </label>
                                <input type="text" name="wow_armory" value="{{ old('wow_armory') }}"
                                    class="input input-bordered" />
                                @error('wow_armory')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="divider"></div>


                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Are there any planned events
                                    or anything that we need to know about that can prevent you from raiding in the
                                    foreseeable future?</span>
                            </label>
                            <input type="text" name="plans" value="{{ old('plans') }}"
                                class="input input-bordered" />
                            @error('plans')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">What is your raid and guild
                                    history and reasons for leaving? Why did you choose us?</span>
                            </label>
                            <input type="text" name="history" value="{{ old('history') }}"
                                class="input input-bordered" />
                            @error('history')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Why should we pick you? How
                                    do you stand out from other applicants?</span>
                            </label>
                            <input type="text" name="pick" value="{{ old('pick') }}"
                                class="input input-bordered" />
                            @error('pick')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Anything else you'd like us
                                    to know?</span>
                            </label>
                            <input type="text" name="additional" value="{{ old('additional') }}"
                                class="input input-bordered" />
                            @error('additional')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-control mt-6">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
