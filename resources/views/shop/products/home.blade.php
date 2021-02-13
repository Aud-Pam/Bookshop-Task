@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <!-- ... -->
    <h1 class="text-center text-5xl my-8 mx-8 ">Book Shop</h1>
    <div class="grid grid-cols-5 gap-4 ">



        @foreach($items as $item)

                <div class="border-solid border-4 border-light-blue-500 rounded-lg px-3 py-2 md:py-2 md:px-3 hover:border-gray-500 hover:shadow-2xl">
                    <img src="{{ asset('/storage/images/'.$item->file) }}" alt="">

                    <span class="w-full block overflow-ellipsis overflow-hidden  whitespace-nowrap  text-2xl text-center">

                        {{$item->title}}</span>
                    <div class="w-full inline-block overflow-ellipsis overflow-hidden  whitespace-nowrap ">
                    <label class="font-semibold" for="author">Authors :</label>

                    @foreach($item->author->take(2) as $authors)

                            <span class="text-base " >{{$authors->name}}</span>

                    @endforeach

                    </div>
                    <label class="font-semibold" for="price">Price:</label>
                    <span class="text-lg">{{$item->price}} €</span>
                </div>



        @endforeach


    </div>
    <div class="float-right mt-20">{{ $items->links() }}</div>
</div>

{{--Paginator--}}





    @endsection