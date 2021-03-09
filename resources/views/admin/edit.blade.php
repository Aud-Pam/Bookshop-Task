<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--{{ $user->name .' lets create new Book' }}--}}
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
                                Book edited successfully
                            </p>
                            <p class="text-xs">
                                {{$message}}
                            </p>
                        </div>

                    </div>
            @endif
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
                        <form action="{{ route('admin.dashboard.book.update',$book->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
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
                                    value="{{$book->title}}"
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
                                    value="{{$book->authorList($book->author)}}"
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
                        <input type="checkbox" class="rounded text-pink-500" name="genres[]" {{ $book->checkGenre($genre->id,$book->genre)}} value="{{$genre->id}}" />

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
                                    value="{{$book->description}}"
                            />{{$book->description}}</textarea>
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
                                        value="{{$book->price}}"
                                />
                                <label
                                        class="block text-gray-600 text-sm font-semibold mb-2"
                                        for="price"
                                >
                                    Discount
                                </label>
                                <input
                                        class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="price"
                                        type="text"
                                        name="price_discount"
                                        placeholder=""
                                        value="{{$book->price_discount}}"
                                />
                            </div>
                            <img class="h-16 w-16 rounded-full" src="{{ asset('/storage/images/'.$book->file) }}" alt="">
                            <input name="file" type="file" class="form-control" placeholder="Select cover" value="{{$book->file}}">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Update Book
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
