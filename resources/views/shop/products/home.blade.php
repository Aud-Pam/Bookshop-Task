@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <!-- ... -->
    <h1 class="">CONTENT</h1>
    <div class="grid grid-cols-5 gap-4 ">



        @foreach($items as $item)

                <div class="border-solid border-4 border-light-blue-500 rounded-lg px-3 py-2 md:py-2 md:px-3 ">
                    <img src="{{ asset('/storage/images/'.$item->file) }}" alt="">
                    <span class="w-full block overflow-ellipsis overflow-hidden  whitespace-nowrap ">{{$item->title}}</span>
                    <ul>
                    @foreach($item->author->take(2) as $authors)
                        <li class="inline-block overflow-ellipsis overflow-hidden  whitespace-nowrap ">
                            <span class="text-xs " >{{$authors->name}}</span>
                        </li>

                    @endforeach

                    </ul>
                </div>



        @endforeach


    </div>

</div>

{{--Paginator--}}
{{ $items->links() }}



    @endsection