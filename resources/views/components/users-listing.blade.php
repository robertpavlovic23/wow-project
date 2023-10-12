@props(['user'])

<tr class="hover:bg-base-300">
    <th>{{ $user->id }}</th>
    <td>{{ $user->name }}</td>
    <td>{{ $user->role }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->email_verified_at }}</td>
    <td>{{ $user->created_at }}</td>
    <td>{{ $user->updated_at }}</td>
    <form method="POST" action="/admin/destroy/{{ $user->id }}">
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
