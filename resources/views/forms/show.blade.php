<x-layout>
    <div class="hero hero-content w-10/12 min-h-screen bg-base-200 grid-cols-4">
        @unless (count($forms) == 0)
            @foreach ($forms as $form)                     
                <x-form-card :form="$form" />
            @endforeach
        @else
            <p>No forms found</p>
        @endunless
    </div>
</x-layout>
