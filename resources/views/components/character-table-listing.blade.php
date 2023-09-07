@props(['character'])

<tr class="hover:bg-base-300">
    <th>{{ $character->id }}</th>
    <td>{{ $character->character_name }}</td>
    <td>{{ $character->class }}</td>
    <td>{{ $character->spec }}</td>
    <td>{{ $character->user_id }}</td>
    <form method="POST" action="/character/destroy/{{ $character->id }}">
        @csrf
        @method('DELETE')
        {{-- <td><a href="/character/destroy/{{ $character->id }}"> X</a></td> --}}
        <td>
        <div class="form-control">
            <button class="btn btn-ghost w-auto px-4 text-red-400">X</button>
        </div>
        </td>
    </form>
</tr>
