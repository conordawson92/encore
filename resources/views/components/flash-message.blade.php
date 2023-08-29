{{--session() is the helper that gives access to the $_SESSION--}}
{{--not only that but it also provides useful functions like has()--}}

@if (session()->has('message'))
    <div x-data="{show:true}" x-init="setTimeout(()=> show = false, 5000)" x-show="show" class="fixed z-[99999] top-0 left-1/2 transform -translate-x-1/2 bg-orange-500 px-48 py-3 text-white">
        {{--x-data: when flash message is triggered, it will be displayed--}}
        {{--x-init: after 3 seconds, the message will go away--}}
        <p>
            {{session('message')}}
        </p>
    </div>
@endif