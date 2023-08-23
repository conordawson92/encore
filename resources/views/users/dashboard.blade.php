<a href="/"> Back
</a>

    <header class="text-center rounded-xl bg-red-500">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Private Profile and History
        </h2>
    </header>

        <h3>Profile informations</h3>
        <div class="mb-6">
            <label for="userImage" class="inline-block text-lg mb-2">
                Profile Photo:
            </label>
            <img class="w-48 mr-6" src="{{$user->userImage ? asset('storage/' . $user->userImage):asset('images/no-image.png')}}" alt="Profile Image">
        </div>

        <div class="mb-6">
            <label for="userName" class="inline-block text-lg mb-2 text-red-500">Name:</label>
            <p>{{$user->userName}}</p>
        </div>
        
        <div class="mb-6">
            <label for="userLocation" class="inline-block text-lg mb-2 text-red-500">Location:</label>
            <p>{{$user->userLocation}}</p>
        </div>

        <div class="mb-6">
            <label for="userPhone" class="inline-block text-lg mb-2 text-red-500">Phone Number</label>
            <p>{{$user->userPhone}}</p>
        </div>

        <div class="mb-6">
            <label for="paymentInfo">Payment Method:</label>
            <p>{{$user->paymentInfo}}</p>
        </div>

        <hr>

        <h3>My selling items:</h3>    
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($items->isEmpty())
                    @foreach ($items as $item)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/items/{{$item->id}}">
                                    {{$item->itemName}}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-grey-300">
                        <td class="px-4 py8 border-t border-b border-grey-300 text-lg">
                            <p class="text-center">No Items found</p>
                        </td>
                    </tr>
                @endunless                
            </tbody>
        </table>