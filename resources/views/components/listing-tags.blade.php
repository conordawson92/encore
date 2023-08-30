<head>
    <title>Encore | Tags</title>
</head>


{{--Convert the list to an array--}}
@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex justify-start sm:justify-start flex-wrap">
    {{--Display all the tags--}}
    @foreach ($tags as $tag)
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs ">
        <a href="{{ route('listings.index', ['tag' => $tag]) }}">{{ $tag }}</a>
    </li>
    @endforeach
</ul>