<div class="divider divider-vertical">Options</div>
<ul class="flex flex-col border-l border-gray-700 pl-1">
    <li class="flex hover:bg-gray-800 hover:rounded-lg text-base cursor-pointer">
        <a class="w-full ml-2">Edit</a>
    </li>
    <li class="flex text-red-400 hover:bg-gray-800 hover:rounded-lg text-base cursor-pointer">
        <a class="w-full ml-2" wire:click.prevent="deletePlayer({{ $player->id }})">Delete</a>
    </li>
</ul>
