@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex">
    @foreach ($tags as $tag)
        @if(stripos($tag, "warrior")!== false)
        <li class="inline-block bg-amber-900 rounded-full px-3 py-1 text-sm font-semibold text-slate-200 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "hunter")!== false)
        <li class="inline-block bg-green-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "mage")!== false)
        <li class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "rogue")!== false)
        <li class="inline-block bg-yellow-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "priest")!== false)
        <li class="inline-block bg-white rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "warlock")!== false)
        <li class="inline-block bg-indigo-500 rounded-full px-3 py-1 text-sm font-semibold text-slate-200 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "paladin")!== false)
        <li class="inline-block bg-pink-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "druid")!== false)
        <li class="inline-block bg-orange-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "shaman")!== false)
        <li class="inline-block bg-blue-700 rounded-full px-3 py-1 text-sm font-semibold text-slate-200 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "monk")!== false)
        <li class="inline-block bg-emerald-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "demon")!== false)
        <li class="inline-block bg-violet-900 rounded-full px-3 py-1 text-sm font-semibold text-slate-200 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "death")!== false)
        <li class="inline-block bg-red-900 rounded-full px-3 py-1 text-sm font-semibold text-slate-200 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @elseif(stripos($tag, "evoker")!== false) 
        <li class="inline-block bg-green-700 rounded-full px-3 py-1 text-sm font-semibold text-slate-200 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @else
        <li class="inline-block bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-4 mt-8">
            <a href="/forms/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
        @endif
    @endforeach
</ul>

{{-- <span class="inline-block bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-4 mt-8">{{ $form->class }}</span> --}}
