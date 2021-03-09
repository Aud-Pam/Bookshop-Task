@extends('layouts.base')
<link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
<link href="{{ asset('css/stripe.css') }}" rel="stylesheet">
@section('content')


    <div class="checkout max-w-wp-pusher mx-auto">
    <div class="panel flex flex-col md:flex-row mb-8 shadow-lg">
        <div class="panel-left w-full md:w-2/3 bg-white rounded-l">
            <form action="{{route('book.purchase',$book->id)}}" method="POST" class="card-form" enctype="multipart/form-data" id="payment-form" >
                {{--@method('PUT')--}}
                @csrf
                <input type="hidden" name="payment_method" class="payment-method">
                <h1 class="text-3xl font-normal p-10 border-b border-solid border-grey-light">Checkout</h1>
                <div class="p-10 pt-8 border-b border-solid border-grey-light">
                    <div class="flex items-center mb-4">
                        <div class="border-2 border-solid border-blue-wp-pusher py-2 px-3 rounded-full font-bold mr-2 text-blue-wp-pusher">1</div>
                        <h2 class="text-lg">Your Basic Information</h2>
                    </div>

                    <div class="flex flex-wrap">
                        <div class="w-3/4 md:w-1/2-almost mb-4 md:mb-0">
                            <label for="first_name" class="block text-sm mb-2">First Name</label>
                            <input id="first_name" name="first_name" type="text" class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0">
                        </div>
                        <div class="w-3/4 md:w-1/2-almost mb-4 ml-0 md:ml-4">
                            <label for="last_name" class="block text-sm mb-2">Last Name</label>
                            <input id="last_name" name="last_name" type="text" class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0">
                        </div>
                        <div class="w-3/4">
                            <label for="email" class="block text-sm mb-2">E-mail</label>
                            <input id="email" type="email" class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0">
                        </div>
                        <div class="flex items-center mb-4 py-4">
                            <div class="border-2 border-solid border-blue-wp-pusher py-2 px-3 rounded-full font-bold mr-2 text-blue-wp-pusher">2</div>
                            <h2 class="text-lg">Credit Card information</h2>
                        </div>

                        <div class="w-full">
                            <label for="payment" class="block text-sm mb-2" for="card-element">Credit Card</label>
                            <div>
                                <div id="card-element">
                                    <!-- a Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-10 pt-8">
                    <button type="submit" class="bg-green-wp-pusher text-white w-full rounded px-4 py-4 mb-6 text-lg hover:bg-green-dark pay">Buy </button>
                    <div class="flex items-center justify-center mb-8">
                        <svg class="mr-2" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>Mask</title>
                            <desc>Created with Sketch.</desc>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-386.000000, -863.000000)" fill="#548BC5" fill-rule="nonzero">
                                    <g transform="translate(262.000000, 186.000000)">
                                        <g transform="translate(49.000000, 602.000000)">
                                            <g transform="translate(75.000000, 75.000000)">
                                                <path d="M10,20 C4.4771525,20 0,15.5228475 0,10 C0,4.4771525 4.4771525,0 10,0 C15.5228475,0 20,4.4771525 20,10 C20,15.5228475 15.5228475,20 10,20 Z M10,18 C14.418278,18 18,14.418278 18,10 C18,5.581722 14.418278,2 10,2 C5.581722,2 2,5.581722 2,10 C2,14.418278 5.581722,18 10,18 Z M8.58578644,6.58578644 C8.19526215,6.97631073 7.56209717,6.97631073 7.17157288,6.58578644 C6.78104858,6.19526215 6.78104858,5.56209717 7.17157288,5.17157288 C8.73367004,3.60947571 11.26633,3.60947571 12.8284271,5.17157288 C14.3905243,6.73367004 14.3905243,9.26632996 12.8279866,10.8288674 L10.7066662,12.9475468 C10.3158988,13.3378278 9.6827339,13.3374334 9.29245293,12.946666 C8.90217195,12.5558985 8.90256633,11.9227337 9.29333378,11.5324527 L11.4142136,9.41421356 C12.1952621,8.63316498 12.1952621,7.36683502 11.4142136,6.58578644 C10.633165,5.80473785 9.36683502,5.80473785 8.58578644,6.58578644 Z M10,16 C9.44771525,16 9,15.5522847 9,15 C9,14.4477153 9.44771525,14 10,14 C10.5522847,14 11,14.4477153 11,15 C11,15.5522847 10.5522847,16 10,16 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <div>
                            <span class="font-bold">Need any help?</span>
                            <span class="text-grey-darker">Don't hesitate to <a href="#" class="text-grey-darker underline">contact support</a>!</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/wppusher_powered_by_stripe.png" alt="stripe">
                    </div>
                </div>
            </form>




                    {{--<div id="card-element">--}}
                        {{--<!-- a Stripe Element will be inserted here. -->--}}
                    {{--</div>--}}



        </div> <!-- end panel-left -->

        <div class="panel-right w-full md:w-1/3 bg-blue-wp-pusher text-white rounded-r">
            <h1 class="text-3xl font-normal p-10 border-b border-solid border-grey-light">Book</h1>
            <div class="p-10">

                <h2 class="font-bold text-3xl mb-4">{{$book->title}}</h2>
                <div class="mb-4">

                    <span class="text-5.5xl font-light lh-fix">{{$book->price}}</span>
                    <span class="text-5xl ">€</span>
                </div>


                <div class="mb-10 pb-2">
                    <div class="mb-2">You<span class="font-bold"> have</span> account?</div>
                    <a href="/login" class="text-white font-bold border-b-2 border-solid border-blue-light">Login page</a>
                </div>

                <div class="border-b border-solid border-blue-light"></div>

                <div class="testimonial pt-10 text-lg italic leading-normal mb-4">
                    Secure paymant with stripe.
                </div>


            </div>
        </div>
    </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/stripe.js') }}" defer></script>

@endsection