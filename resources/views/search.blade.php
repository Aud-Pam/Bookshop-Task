@extends('layouts.base')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="container mx-auto">
            <!-- ... -->
            <h1 class="text-center text-5xl my-8 mx-8 ">Search term before:{{$value}} </h1>
            <div class="grid grid-cols-5 gap-4 ">
                {{--///////////////////--}}
                @foreach($items as $item)
                    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                        <a href="{{'show/'.$item->id}}">
                            <div class="bg-cover bg-center h-56 p-4"
                                 style="background-image: url({{ asset('/storage/images/'.$item->file) }})">
                                <div class="inline-block justify-start bg-white">
                                    @if($item->price_discount)
                                        -{{$item->price_discount}}%
                                    @endif
                                </div>
                                <div class="inline-block float-right bg-white">
                                    {{$item->data_difference}}
                                </div>
                            </div>
                        </a>
                        <div class="p-4">
                            <p class="uppercase tracking-wide text-sm font-bold text-gray-700 overflow-ellipsis overflow-hidden  whitespace-nowrap ">{{$item->title}}</p>
                            @if(($item->price_discount))
                                <p class="text-3xl text-gray-900 ">
                                    <span class="line-through text-2xl">{{$item->price}} €</span>
                                    <span>{{$item->discounted_price}} €</span>
                                </p>
                            @else
                                <p class="text-3xl text-gray-900 ">
                                    {{$item->price}}€
                                </p>
                            @endif
                        </div>
                        <div class="flex p-4 border-t border-gray-300 text-gray-700">
                            <div class="flex-1 inline-flex items-center">
                                <p><label class="font-semibold" for="author">Authors :</label>
                                    @foreach($item->author->take(2) as $authors)
                                        <span class="text-base ">{{$authors->name}}</span>
                                    @endforeach</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{------------------}}
                @foreach($items as $item)
                    <span><a href="{{'show/'.$item->id}}">
                @endforeach
            </div>
            <div class="float-right mt-20">{{ $items->links() }}</div>
        </div>
    </div>
@endsection