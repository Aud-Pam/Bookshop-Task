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
                            Book Updated successfully
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
                                        <i class="fas fa-cog text-base mr-1"></i>  Settings
                                    </a>
                                </li>
                                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-pink-600 bg-white" onclick="changeAtiveTab(event,'tab-options')">
                                        <i class="fas fa-briefcase text-base mr-1"></i>  Options
                                    </a>
                                </li>
                            </ul>
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                <div class="px-4 py-5 flex-auto">
                                    <div class="tab-content tab-space">
                                        <div class="block" id="tab-profile">
                                            {{--form--}}
                                            <!-- component -->
                                                {{--<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">--}}
                                                    <div class="-mx-3 md:flex mb-6">
                                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                                                First Name
                                                            </label>
                                                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Jane">
                                                            <p class="text-red text-xs italic">Please fill out this field.</p>
                                                        </div>
                                                        <div class="md:w-1/2 px-3">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                                                                Last Name
                                                            </label>
                                                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Doe">
                                                        </div>
                                                    </div>
                                                    <div class="-mx-3 md:flex mb-6">
                                                        <div class="md:w-full px-3">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                                                Password
                                                            </label>
                                                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="password" placeholder="******************">
                                                            <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like</p>
                                                        </div>
                                                    </div>
                                                    <div class="-mx-3 md:flex mb-2">
                                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
                                                                City
                                                            </label>
                                                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-city" type="text" placeholder="Albuquerque">
                                                        </div>
                                                        <div class="md:w-1/2 px-3">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                                                                State
                                                            </label>
                                                            <div class="relative">
                                                                <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                                                    <option>New Mexico</option>
                                                                    <option>Missouri</option>
                                                                    <option>Texas</option>
                                                                </select>
                                                                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="md:w-1/2 px-3">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
                                                                Zip
                                                            </label>
                                                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-zip" type="text" placeholder="90210">
                                                        </div>
                                                    </div>
                                                {{--</div>--}}
                                            {{--form end--}}
                                        </div>
                                        <div class="hidden" id="tab-settings">
                                            <p>
                                                Completely synergize resource taxing relationships via
                                                premier niche markets. Professionally cultivate one-to-one
                                                customer service with robust ideas.
                                                <br />
                                                <br />
                                                Dynamically innovate resource-leveling customer service for
                                                state of the art customer service.
                                            </p>
                                        </div>
                                        <div class="hidden" id="tab-options">
                                            <p>
                                                Efficiently unleash cross-media information without
                                                cross-media value. Quickly maximize timely deliverables for
                                                real-time schemas.
                                                <br />
                                                <br />
                                                Dramatically maintain clicks-and-mortar solutions
                                                without functional solutions.
                                            </p>
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
                    {{--You're logged in!--}}
                </div>
            </div>
        </div>
    </div>

{{--<div class="bg-grey-lighter min-h-screen flex flex-col">--}}
    {{--<div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">--}}
        {{--<div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">--}}
            {{--<h1 class="mb-8 text-3xl text-center">Sign up</h1>--}}
            {{--<input--}}
                    {{--type="text"--}}
                    {{--class="block border border-grey-light w-full p-3 rounded mb-4"--}}
                    {{--name="fullname"--}}
                    {{--placeholder="Full Name" />--}}

            {{--<input--}}
                    {{--type="text"--}}
                    {{--class="block border border-grey-light w-full p-3 rounded mb-4"--}}
                    {{--name="email"--}}
                    {{--placeholder="Email" />--}}

            {{--<input--}}
                    {{--type="password"--}}
                    {{--class="block border border-grey-light w-full p-3 rounded mb-4"--}}
                    {{--name="password"--}}
                    {{--placeholder="Password" />--}}
            {{--<input--}}
                    {{--type="password"--}}
                    {{--class="block border border-grey-light w-full p-3 rounded mb-4"--}}
                    {{--name="confirm_password"--}}
                    {{--placeholder="Confirm Password" />--}}

            {{--<button--}}
                    {{--type="submit"--}}
                    {{--class="w-full text-center py-3 rounded bg-green text-white hover:bg-green-dark focus:outline-none my-1"--}}
            {{-->Create Account</button>--}}

            {{--<div class="text-center text-sm text-grey-dark mt-4">--}}
                {{--By signing up, you agree to the--}}
                {{--<a class="no-underline border-b border-grey-dark text-grey-dark" href="#">--}}
                    {{--Terms of Service--}}
                {{--</a> and--}}
                {{--<a class="no-underline border-b border-grey-dark text-grey-dark" href="#">--}}
                    {{--Privacy Policy--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="text-grey-dark mt-6">--}}
            {{--Already have an account?--}}
            {{--<a class="no-underline border-b border-blue text-blue" href="../login/">--}}
                {{--Log in--}}
            {{--</a>.--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

</x-app-layout>