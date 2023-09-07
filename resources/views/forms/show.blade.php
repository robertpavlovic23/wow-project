<x-layout>
    <div class="w-full bg-base-200 min-h-screen">
        <div class="p-20 h-0">
            @include('/partials/_search')
        </div>
        <div class="grid grid-cols-1 2xl:grid-cols-4 gap-4 space-y-4 lg:space-y-0 lg:p-36">

            @unless (count($forms) == 0)
                @foreach ($forms as $form)
                    <x-form-card :form="$form" />
                @endforeach
            @else
                <p>No forms found</p>
            @endunless
        </div>
        <div class="mt-64 p-4 bottom-0">
            {{$forms->links('pagination::mypagination')}}
        </div>
    </div>
</x-layout>


{{-- <div class="grid grid-cols-4 gap-4 w-full space-y-4 md:space-y-0 p-36 min-h-screen"> --}}