<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Settings') }}

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
                            Update successfully
                        </p>
                        <p class="text-xs">
                            {{$message}}
                        </p>
                    </div>

                </div>
            </div>
        @endif

                @if ($errors->any())
                    <div class="flex bg-red-200 p-4">
                        <div class="mr-4">
                            <div class="h-10 w-10 text-white bg-red-600 rounded-full flex justify-center items-center">
                                <i class="material-icons">report</i>
                            </div>
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="text-red-600">
                                <p class="mb-2 font-bold">
                                    Varning alert
                                </p>
                                @foreach ($errors->all() as $error)
                                <p class="text-xs">
                                {{ $error }}
                                </p>
                                @endforeach
                            </div>
                            <div class="text-sm text-gray-500">
                                <p>x</p>
                            </div>
                        </div>
                    </div>

            {{--warning--}}

        @endif

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--You're logged in!--}}
                    <div class="flex flex-wrap" id="tabs-id">
                        <div class="w-full">
                            <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-pink-600" onclick="changeAtiveTab(event,'tab-profile')">
                                        <i class="fas fa-space-shuttle text-base mr-1"></i>  Profile
                                    </a>
                                </li>
                                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-pink-600 bg-white" onclick="changeAtiveTab(event,'tab-settings')">
                                        <i class="fas fa-cog text-base mr-1"></i>  Password
                                    </a>
                                </li>

                            </ul>
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                <div class="px-4 py-5 flex-auto">
                                    <div class="tab-content tab-space">
                                        <div class="block" id="tab-profile">
                                            <form action="{{ route('shop.settings.update',$items->id) }}" method="post" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            {{--form--}}
                                            <!-- component -->
                                                {{--<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">--}}
                                                    <div class="-mx-3 md:flex mb-6">
                                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                                                Name
                                                            </label>
                                                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" name="name"
                                                                   placeholder="{{old('name')}}" value="{{$items->name}}">
                                                            <p class="text-red text-xs italic">Please fill out this field if you want change user name.</p>
                                                        </div>
                                                        <div class="md:w-1/2 px-3">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
                                                                Email
                                                            </label>
                                                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="email" name="email" type="text"
                                                                   value="{{$items->email}}" placeholder="{{old('email')}}">
                                                        </div>
                                                    </div>

                                                    <div class="-mx-3 md:flex mb-2">
                                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
                                                                Date Format YYYY-MM-DD
                                                            </label>
                                                            <div class="mt-4">
                                                                {{--<x-label for="date" :value="__('Date Formaat dd/mm/yyyy')" />--}}
                                                                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="birth_day" name="birth_day" type="text" value="{{$date}}">


                                                            </div>
                                                        </div>
                                                        <div class="md:w-1/2 px-3">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">

                                                            </label>
                                                            <div class="relative">

                                                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-8 rounded focus:outline-none focus:shadow-outline"  type="submit">
                                                                    Update
                                                                </button>

                                                            </div>
                                                        </div>
                                                        <div class="md:w-1/2 px-3">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">

                                                            </label>

                                                        </div>
                                                    </div>
                                                {{--</div>--}}
                                            </form>
                                            {{--form end--}}
                                        </div>
                                        <div class="hidden" id="tab-settings">
                                            <form action="{{ route('shop.password.update') }}" method="post" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            {{--form--}}
                                            <!-- component -->
                                                {{--<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">--}}
                                                <div class="-mx-3 md:flex mb-6">
                                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                                            Password
                                                        </label>
                                                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" name="password"
                                                               placeholder="" value="{{old('password')}}">
                                                        <p class="text-red text-xs italic">Please fill out this field if you want change user password.</p>
                                                    </div>
                                                    <div class="md:w-1/2 px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
                                                            Confirm Password
                                                        </label>
                                                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="email" name="confirmed" type="text"
                                                               value="" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="-mx-3 md:flex mb-2">

                                                    <div class="md:w-1/2 px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">

                                                        </label>
                                                        <div class="relative">

                                                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-8 rounded focus:outline-none focus:shadow-outline"  type="submit">
                                                                Update
                                                            </button>

                                                        </div>
                                                    </div>
                                                    <div class="md:w-1/2 px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">

                                                        </label>

                                                    </div>
                                                </div>
                                                {{--</div>--}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function changeAtiveTab(event,tabID){
                            let element = event.target;
                            while(element.nodeName !== "A"){
                                element = element.parentNode;
                            }
                            ulElement = element.parentNode.parentNode;
                            aElements = ulElement.querySelectorAll("li > a");
                            tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
                            for(let i = 0 ; i < aElements.length; i++){
                                aElements[i].classList.remove("text-white");
                                aElements[i].classList.remove("bg-pink-600");
                                aElements[i].classList.add("text-pink-600");
                                aElements[i].classList.add("bg-white");
                                tabContents[i].classList.add("hidden");
                                tabContents[i].classList.remove("block");
                            }
                            element.classList.remove("text-pink-600");
                            element.classList.remove("bg-white");
                            element.classList.add("text-white");
                            element.classList.add("bg-pink-600");
                            document.getElementById(tabID).classList.remove("hidden");
                            document.getElementById(tabID).classList.add("block");
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>