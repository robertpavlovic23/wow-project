<div class="divider divider-vertical">Options</div>
<ul class="flex flex-col border-l border-gray-700 pl-1">
    {{-- <li class="flex hover:bg-gray-800 hover:rounded-lg text-base cursor-pointer">
        <a class="w-full ml-2" wire:click.prevent="showPlayerPanel({{ $player->id }})">Edit</a>

    </li> --}}
    <li class="flex hover:bg-gray-800 hover:rounded-lg text-base cursor-pointer">
        <a class="w-full ml-2" href="/player/{{ $player->id }}">Edit</a>
    </li>
    <li class="flex text-red-400 hover:bg-gray-800 hover:rounded-lg text-base cursor-pointer">
        <a class="w-full ml-2" wire:click.prevent="deletePlayer({{ $player->id }})">Delete</a>
    </li>
</ul>

{{-- onclick="showDialog()" --}}
<script>
    function showDialog() {
        let dialog = document.getElementById('dialog');
        dialog.classList.remove('hidden');
        dialog.classList.add('flex');
        setTimeout(() => {
            dialog.classList.add('opacity-100');
        }, 20);
    }

    function hideDialog() {
        let dialog = document.getElementById('dialog');
        dialog.classList.add('opacity-0');
        dialog.classList.remove('opacity-100');

        setTimeout(() => {
            dialog.classList.add('hidden');
            dialog.classList.remove('flex');
        }, 20);
    }
</script>
