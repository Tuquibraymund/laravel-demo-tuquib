<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/regular.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/solid.min.css">
</head>
<body class="bg-gray-100 font-sans">

    @if(session('success'))
        <x-sweetalert type="success" :message="session('success')"/>
    @endif    

    @if(session('info'))
        <x-sweetalert type="info" :message="session('info')"/>
    @endif  
    
    @if(session('error'))
        <x-sweetalert type="error" :message="session('error')"/>
    @endif    


    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        @if(Auth::user()->hasRole('admin'))
        <h1 class="text-2xl font-bold text-center mb-5">Welcome ADMIN: <span class="text-red-500">{{Auth::user()->name}}</span></h1>

        <div x-data="{open: false}" class="text-center">
            <button @click="open = true" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                Add Event
            </button>
            <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black opacity-100 z-50">
                <div class="bg-black p-6 rounded-lg shadow-lg max-w-lg border border-gray-500">
                    <div class="flex justify-between items-center mb-4">
                        <p class="text-xl font-bold text-white">Add Event</p>
                        <button @click="open = false" class="text-black">X</button>
                    </div>
                    <div>
                        <form action="{{ route('admin.add_event')}}" method="POST" class="mt-5">
                            @csrf
                            <div class="mb-4">
                                <label for="event_name" class="block text-sm font-medium text-white">Event Name</label>
                                <input type="text"
                                       name="event_name"
                                       id="event_name"
                                       value="{{old('event_name')}}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required> 
                            </div>
                            <div class="mb-4">
                                <label for="event_description" class="block text-sm font-medium text-white">Event Description</label>
                                <input type="text"
                                       name="event_description"
                                       id="event_description"
                                       value="{{old('event_description')}}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required> 
                            </div>
                            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                                ADD EVENT
                            </button>
                        </form>
                    </div>
                </div>                        
            </div>
        </div>

        <div class="overflow-hidden rounded-lg shadow-lg mt-6">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="border border-black px-4 py-2 text-left">ID</th>
                        <th class="border border-black px-4 py-2 text-left">Event Name</th>
                        <th class="border border-black px-4 py-2 text-left">Event Description</th>
                        <th class="border border-black px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($events->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center border border-black py-2 text-gray-500 italic">No data available</td>
                        </tr>
                    @else
                        @foreach($events as $event)
                            <tr class="border border-black hover:bg-gray-100 transition duration-200">
                                <td class="border border-black px-4 py-2">{{ $event->id }}</td>
                                <td class="border border-black px-4 py-2">{{ $event->event_name }}</td>
                                <td class="border border-black px-4 py-2">{{ $event->event_description }}</td>
                                <td class="border border-black px-4 py-2 text-center">
                                    
                                    
                                    {{-- <a href=""> </a>  |   <i class="fa-solid fa-trash-can"></i> --}}


                                    <div x-data="{open: false}" class="text-center">
                                        <button @click="open = true" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black opacity-100 z-50">
                                            <div class="bg-black p-6 rounded-lg shadow-lg max-w-lg border border-gray-500"> <!-- Added border class here -->
                                                <div class="flex justify-between items-center mb-4">
                                                    <p class="text-xl font-bold text-white">Edit Event</p>
                                                    <button @click="open = false" class="text-white">X</button>
                                                </div>
                                                <div>
                                                    <form action="{{ route('admin.update_event', $event->id)}}" method="POST" class="mt-5">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-4">
                                                            <label for="event_name" class="block text-sm font-medium text-gray-300">Event Name</label>
                                                            <input type="text"
                                                                name="event_name"
                                                                id="event_name"
                                                                value="{{ $event->event_name }}"
                                                                class="mt-1 block w-full border border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required> 
                                                        </div>
                                                        <div class="mb-4">
                                                            <label for="event_description" class="block text-sm font-medium text-gray-300">Event Description</label>
                                                            <input type="text"
                                                                name="event_description"
                                                                id="event_description"
                                                                value="{{ $event->event_description }}"
                                                                class="mt-1 block w-full border border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required> 
                                                        </div>
                                                        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                                                            EDIT EVENT
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>                        
                                        </div>
                                    </div>
                                    
                                    

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        @elseif(Auth::user()->hasRole('faculty'))
            <h1 class="text-2xl font-bold mb-5">Welcome FACULTY: <span class="text-red-500">{{Auth::user()->name}}</span></h1>
        @else
            <h1 class="text-2xl font-bold mb-5">Welcome REGISTRAR: <span class="text-red-500">{{Auth::user()->name}}</span></h1>
        @endif

        <form method="POST" action="{{route('logout')}}" class="mt-6">
            @csrf
            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();" class="text-blue-500 hover:underline">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </div>


























<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>