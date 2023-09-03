@props(['form'])

<form>
    <div class="card w-96 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">{{ $form->character_name }}</h2>

            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <a href="/dashboard/form/{{ $form->id }}" class="btn btn-primary">See more</a>
            </div>
        </div>
    </div>
</form>
