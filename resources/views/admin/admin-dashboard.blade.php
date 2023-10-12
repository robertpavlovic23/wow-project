<x-layout>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            <div class="w-full">
                <h1 class="text-5xl font-bold">User accounts</h1>
                <div class="overflow-x-auto py-32">
                    <table class="table table-xs">
                        @unless (count($users) == 0)
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>name</th>
                                    <th>role</th>
                                    <th>email</th>
                                    <th>email_verified_at</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- rows -->
                                @foreach ($users as $user)
                                    <x-users-listing :user="$user" />
                                @endforeach
                            @else
                                <!-- if null -->
                                <tr>
                                    <th>No users found</th>
                                </tr>
                            </tbody>
                        @endunless
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>