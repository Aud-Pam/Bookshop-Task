<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name .' lets create new Book' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                        @if ($errors->any())
                        <div class="mr-4">
                            <div class="h-10 w-10 text-white bg-orange-600 rounded-full flex justify-center items-center">
                                <i class="material-icons">warning</i>
                            </div>
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="text-orange-600">
                                <p class="mb-2 font-bold">
                                    Warning alert
                                </p>
                                @foreach ($errors->all() as $error)
                                <p class="text-xs">
                                    {{ $error }}
                                </p>
                                @endforeach
                            </div>
                            <div class="text-sm text-gray-500">
                                <span>x</span>
                            </div>
                        </div>
                    @endif


                        <form action="{{ route('shop.books.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-4">

                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="title">
                                Title
                            </label>
                            <input
                                    class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="title"
                                    type="text"
                                    placeholder="Book Title"
                                    name="title"
                                    value="{{old('title')}}"
                            />
                        </div>
                        <div class="mb-4">
                            <label
                                    class="block text-gray-600 text-sm font-semibold mb-2"
                                    for="author"
                            >
                                Author
                            </label>
                            <input
                                    class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="author"
                                    type="text"
                                    name="author"
                                    placeholder="Add authors with comma"
                                    value="{{old('author')}}"
                            />
                        </div>
                        <div class="mb-4">
                            <label
                                    class="block text-gray-600 text-sm font-semibold mb-2"
                                    for="genres"
                            >
                                Book Genres
                            </label>
                            @foreach($genres as $genre)
                        <input type="checkbox" class="rounded text-pink-500" name="genres[]" value="{{$genre->id}}"/>
                                {{$genre->name}}
                                @endforeach
                        </div>

                        <div class="mb-4">
                            <label
                                    class="block text-gray-600 text-sm font-semibold mb-2"
                                    for="description"

                            >Description
                            </label>
                            <textarea
                                    rows="4"
                                    cols="50"
                                    class="bg-gray-100 p-1 appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="description"
                                    type="text"
                                    name="description"
                                    value="{{old('description')}}"
                            /></textarea>
                        </div>
                        <div class="mb-4">


                            <div class="mb-4">
                                <label
                                        class="block text-gray-600 text-sm font-semibold mb-2"
                                        for="price"
                                >
                                    Price
                                </label>
                                <input
                                        class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="price"
                                        type="text"
                                        name="price"
                                        placeholder=""
                                        value="{{old('price')}}"
                                />
                            </div>
                            <input name="file" type="file" class="form-control" placeholder="Select cover" value="{{old('file')}}">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Create Book
                            </button>
                            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                                cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>









{{--@extends('layouts.app')--}}
{{--@section('content')--}}

{{--<div class="container mx-auto">--}}


    {{--<div class="w-full max-w-xs">--}}
        {{--<form class="" method="POST" action="{{ action('App\Http\Controllers\Shop\BookShopController@store') }}" enctype="multipart/form-data" >--}}
            {{--<form action="{{ action('App\Http\Controllers\Shop\BookShopController@store') }}" method="POST" enctype="multipart/form-data">--}}

        {{--@csrf--}}
            {{--<div class="mb-4">--}}
                {{--<input type="text" name="user_id"/>--}}
                {{--<label class="block text-gray-600 text-sm font-semibold mb-2" for="title">--}}
                    {{--Title--}}
                {{--</label>--}}
                {{--<input--}}
                        {{--class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
                        {{--id="title"--}}
                        {{--type="text"--}}
                        {{--placeholder="Book Title"--}}
                        {{--name="title"--}}
                {{--/>--}}
            {{--</div>--}}
            {{--<div class="mb-4">--}}
                {{--<label--}}
                        {{--class="block text-gray-600 text-sm font-semibold mb-2"--}}
                        {{--for="author"--}}
                {{-->--}}
                    {{--Author--}}
                {{--</label>--}}
                {{--<input--}}
                        {{--class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
                        {{--id="author"--}}
                        {{--type="text"--}}
                        {{--name="author"--}}
                        {{--placeholder="Add authors with comma"--}}
                {{--/>--}}
            {{--</div>--}}
            {{--<div class="mb-4">--}}
                {{--<label--}}
                        {{--class="block text-gray-600 text-sm font-semibold mb-2"--}}
                        {{--for="description"--}}
                {{-->--}}
                   {{--Book Description--}}
                {{--</label>--}}
                {{--<textarea--}}
                        {{--rows="4"--}}
                        {{--cols="50"--}}
                        {{--class="bg-gray-100 p-1 appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
                        {{--id="description"--}}
                        {{--type="text"--}}
                        {{--name="description"--}}
                {{--/>--}}
                {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="mb-4">--}}
                {{--<label class="w-34 flex flex-col items-center px-2 py-4 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue--}}
                 {{--cursor-pointer hover:text-blue-800">--}}
                    {{--<svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
                        {{--<path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />--}}
                    {{--</svg>--}}
                    {{--<span class="mt-2 text-base leading-normal">Select a cover</span>--}}
                    {{--<input name="cover" type='file' class="hidden" />--}}
                {{--</label>--}}
                {{--<input name="cover" type="file" class="form-control" placeholder="Select cover">--}}
           {{--</div>--}}
            {{--<div class="flex items-center justify-between">--}}
                {{--<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">--}}
                    {{--Create post--}}
                {{--</button>--}}
                {{--<a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">--}}
                    {{--cancel--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</form>--}}
        {{--<p class="text-center text-gray-500 text-xs">--}}
            {{--&copy;2020 BT-7274. All rights reserved.--}}
        {{--</p>--}}
    {{--</div>--}}


{{--</div>--}}
{{--@endsection--}}