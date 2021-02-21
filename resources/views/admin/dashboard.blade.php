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

                    <!-- This example requires Tailwind CSS v2.0+ -->


                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">

                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Title
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ON/OFF
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{--<input type="text" class="h-14 w-64 pr-8 pl-5 rounded z-0 focus:shadow focus:outline-none" placeholder="Search anything...">--}}

                                                </th>

                                            </tr>


                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @if(!empty($items))
                                                @foreach($items as $item)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full" src="{{ asset('/storage/images/'.$item->file) }}" alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="max-w-xs text-xm font-medium text-gray-900 font-bold ">
                                                                <span class="block overflow-ellipsis overflow-hidden  whitespace-nowrap  text-xl text-center">{{$item->title}} </span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <label for="date" class="font-semibold">Created At</label>
                                                    <div class="text-sm text-gray-900">{{$item->created_at}}</div>
                                                    <label for="date" class="font-semibold">Activated At</label>
                                                    <div class="text-sm text-gray-900">{{$item->active_at}}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($item->active!==0)
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Active
                </span>                             @else
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-green-800">
                  Not active
                </span>
                                                        @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <form action="{{ route('admin.dashboard.activate', $item->id)}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="bg-red-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="submit">Activate</button>
                                                    </form>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{'dashboard/book/edit/'.$item->id}}" class="p-6 bg-blue">Edit</a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <form action="{{ route('shop.books.destroy', $item->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Delete book?');" type="submit">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
                                                @endforeach
                                            @endif
                                            <!-- More items... -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="float-right mt-20">{{ $items->links() }}</div>
                        {{--/////-----////--}}
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
