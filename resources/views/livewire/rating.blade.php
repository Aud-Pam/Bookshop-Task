<div class="w-full max-w-7xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
    @if($success)
        <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
            <div slot="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-check-circle w-5 h-5 mx-2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="text-xl font-normal  max-w-full flex-initial">
                Thanks for your rate
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500 block rounded-sm">
            @foreach ($errors->all() as $error)
                <p class="text-xs text-center font-bold ">
                    {{ $error }}
                </p>
            @endforeach
        </div>
    @endif
{{--Review Form--}}
    @if(Auth::user())
        <form wire:submit.prevent="createRate('{{$book->id}}')" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg mb-10">
                <div class="px-12 py-5">
                    <h2 class="text-gray-800 text-3xl font-semibold">Your opinion matters to us!</h2>
                </div>
                <div class="bg-gray-200 w-full flex flex-col items-center" id="review">
                    <div class="flex flex-col items-center py-6 space-y-3">
                        <span class="text-lg text-gray-800">Please rate this book from 1 to 5 ?</span>
                        {{$rating}}
                        <div class="flex space-x-3">
                            <label class="inline-flex items-center mt-3">
                                <input wire:model="rating" type="radio"
                                       class="form-checkbox h-5 w-5 text-gray-600" name="rating" value="1"><span
                                        class="ml-2 text-gray-700">1</span>
                            </label>
                            <label class="inline-flex items-center mt-3">
                                <input wire:model="rating" type="radio"
                                       class="form-checkbox h-5 w-5 text-gray-600" name="rating" value="2"><span
                                        class="ml-2 text-gray-700">2</span>
                            </label>
                            <label class="inline-flex items-center mt-3">
                                <input wire:model="rating" type="radio"
                                       class="form-checkbox h-5 w-5 text-gray-600" name="rating" value="3"><span
                                        class="ml-2 text-gray-700">3</span>
                            </label>
                            <label class="inline-flex items-center mt-3">
                                <input wire:model="rating" type="radio"
                                       class="form-checkbox h-5 w-5 text-gray-600" name="rating" value="4"><span
                                        class="ml-2 text-gray-700">4</span>
                            </label>
                            <label class="inline-flex items-center mt-3">
                                <input wire:model="rating" type="radio"
                                       class="form-checkbox h-5 w-5 text-gray-600" name="rating" value="5"><span
                                        class="ml-2 text-gray-700">5</span>
                            </label>
                        </div>
                    </div>
                    <div class="w-3/4 flex flex-col">
                                <textarea wire:model="description" rows="3"
                                          class="p-4 text-gray-500 rounded-xl resize-none"
                                          name="description"></textarea>
                        <button class="py-3 my-8 text-lg bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white">
                            Rate now
                        </button>
                    </div>

                </div>

            </div>
            @else
                <p class="text-lg text-gray-800 text-center mb-10" id="review">If You want to leave comment
                    please <a href="/login">login</a></p>
        </form>
    @endif
        {{--Reviews--}}
    @foreach($reviews as $item)
        <div class="flex items-start mb-10">
            <div class="flex-shrink-0">
                <div class="inline-block relative">
                    <div class="relative w-16 h-16 rounded-full overflow-hidden">
                        <img class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover"
                             src="https://picsum.photos/id/646/200/200" alt="Profile picture">
                        <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner"></div>
                    </div>
                    <svg class="fill-current text-white bg-green-600 rounded-full p-1 absolute bottom-0 right-0 w-6 h-6 -mx-1 -my-1"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M19 11a7.5 7.5 0 0 1-3.5 5.94L10 20l-5.5-3.06A7.5 7.5 0 0 1 1 11V3c3.38 0 6.5-1.12 9-3 2.5 1.89 5.62 3 9 3v8zm-9 1.08l2.92 2.04-1.03-3.41 2.84-2.15-3.56-.08L10 5.12 8.83 8.48l-3.56.08L8.1 10.7l-1.03 3.4L10 12.09z"/>
                    </svg>
                </div>
            </div>
            <div class="ml-6">
                <p class="flex items-baseline">

                    <span class="text-gray-600 font-bold">{{$item->user->name}}</span>
                    <span class="ml-2 text-green-600 text-xs">Verified Buyer</span>
                </p>
                <div class="flex items-center mt-1">
                    @for($i=1;$i<=5;$i++)
                        @if($i<=($item->rating))
                            <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        @else
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        @endif
                    @endfor
                </div>
                <div class="mt-3">
                    <p class="mt-1">{{$item->description}}</p>
                </div>
                <div class="flex items-center justify-between mt-4 text-sm text-gray-600 fill-current">

                    <span class="ml-2">{{$item->created_at}}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>