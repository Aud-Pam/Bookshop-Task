@extends('layouts.base')
@section('content')
    <style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
    <div class="min-w-screen min-h-min bg-gray-300 flex items-center p-5 lg:p-10 overflow-hidden relative">
        <div class="w-full max-w-7xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
            <div class="md:flex items-center -mx-10">
                <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                    <div class="relative">
                        <img src="{{ asset('/storage/images/'.$book ->file) }}"
                             class="object-contain max-h-96 w-full  z-10 shadow-2xl" alt="">
                        <div class="border-4 border-gray-200 absolute top-0 bottom-0 left-10 right-10 z-0"></div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-10">
                    <div class="mb-10">
                        <h1 class="font-bold uppercase text-2xl mb-5 break-words">{{$book->title}}</h1>
                        <label for="author" class="font-bold underline">Book Authors</label>
                        <p class="text-sm italic"> {{$book->authorList($book->author)}}</p>
                        <label for="genres" class="font-bold underline">Genres</label>
                        <p class="text-sm italic"> {{$book->genreList($book->genre)}}</p>
                        <label for="description" class="font-bold underline">Description</label>
                        <p class="text-sm"> {{$book->description}}</p>
                    </div>
                    <div>
                        <div class="inline-block align-bottom mr-5">
                            @if(($book->price_discount))
                                <p class="text-3xl text-gray-900 ">
                                    <span class="line-through text-2xl">{{$book->price}} €</span>
                                    <span class="font-bold text-5xl leading-none align-baseline">{{$book->discounted_price}}
                                        €</span>
                                </p>
                            @else
                                <p class="font-bold text-5xl leading-none align-baseline">
                                    {{$book->price}}€
                                </p>
                            @endif
                            <p class="my-8">
                                <a href="{{route('checkout',$book->id)}}" class="px-6 py-2 transition ease-in duration-200 uppercase rounded-full
                             hover:bg-gray-800 hover:text-white border-2 border-gray-900
                              focus:outline-none">Buy now</a>
                            </p>
                        </div>
                        <div class="inline-block align-bottom">
                            {{--rating avg--}}
                            @livewire('rating-average',['book_id' => $book->id])
                        </div>
                    </div>
                </div>
                @if(Auth::user())
                    <form action="{{ route('shop.book.report',$book->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <textarea rows="3" class="p-4 text-gray-500 rounded-xl resize-none" name="text"></textarea>
                        <button class="py-3 mx-4 px-8 text-lg bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white">
                            Report
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div class="min-w-screen min-h-min bg-gray-300 flex items-center p-5 lg:p-10 overflow-hidden relative">
        {{--Review Form--}}
        @livewire('rating',['book' => $book])
    </div>
@endsection