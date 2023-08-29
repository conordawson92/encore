<head>
    <title>Encore | Card</title>
</head>


<div {{$attributes->merge(['class' => "bg-white-50  border-white-100 rounded p-6" ])}}>
    {{--to insert content inside a component, we need something more--}}
    {{$slot}}
    {{--the $slot variable is the placeholder for all content to be inserted--}}
</div>