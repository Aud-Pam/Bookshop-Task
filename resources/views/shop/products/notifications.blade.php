<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

        </h2>
        @if ($message = Session::get('success'))
            <div class="flex bg-green-200 p-4">
                <div class="mr-4">
                    <div class="h-10 w-10 text-white bg-green-600 rounded-full flex justify-center items-center">
                        <i class="material-icons">done</i>
                    </div>
                </div>
                <div class="flex justify-between w-full">
                    <div class="text-green-600">
                        <p class="mb-2 font-bold">
                            Successfully
                        </p>
                        <p class="text-xs">
                            {{$message}}
                        </p>
                    </div>

                </div>
        @endif

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>

                        @foreach($notifications as $notification)
                            @if($notification->type=='App\Notifications\ReportBook')

                            <li>
                                {{$notification->title}}
                                {{$notification->text}}
                            </li>

                            @endif
                        @endforeach

                    </ul>



                    {{--/////-----////--}}
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
