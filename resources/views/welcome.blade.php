<x-layout>
    <body class="antialiased">
        <x-flash-message/>
        {{--if the user is logged in, and all the links we need--}}
        <ul>
            @auth{{--if we are logged in, show this content--}}
                <li>
                    <span>
                        {{--to access to logged user name, we need to use the auth() helper--}}
                        Welcome {{auth()->user()->userName}}
                    </span>
                </li>
                <li>
                    <a href="/users/manage">
                        Manage Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">See Profile and History</a>
                </li>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button>
                            Logout        
                        </button>
                    </form>
                </li>
            @else {{--if we are not logged in, show that content instead--}}
                <li>
                    <a href="/register">Register</a>
                </li>
                <li>
                    <a href="/login">Login</a>
                </li>
            @endauth
        </ul>
        {{--end of the exemple links to see if works--}}
    </body>
</html>
</x-layout>