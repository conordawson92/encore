<head>
    <title>Encore | Flash Message</title>
</head>


{{--session() is the helper that gives access to the $_SESSION--}}
{{--not only that but it also provides useful functions like has()--}}

@if (session()->has('message'))
<div x-data="{show:true}" x-init="setTimeout(()=> show = false, 5000)" x-show="show" class="fixed z-[99999] top-0 left-1/2 transform -translate-x-1/2 bg-orange-500 max-w-xs w-full sm:max-w-md md:max-w-lg px-4 py-3 text-white text-center">
    {{--x-data: when flash message is triggered, it will be displayed--}}
    {{--x-init: after 3 seconds, the message will go away--}}
    <p>
        {{session('message')}}
    </p>
</div>
@endif