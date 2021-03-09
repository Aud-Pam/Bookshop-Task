@extends('layouts.base')
<link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
<link href="{{ asset('css/stripe.css') }}" rel="stylesheet">

@section('content')


    <div class="checkout max-w-wp-pusher mx-auto">
    <div class="panel flex flex-col md:flex-row mb-8 shadow-lg">
        <div class="panel-left w-full md:w-2/3 bg-white rounded-l">
            <form action="/charge" method="post" id="payment-form">
                <div class="form-row">
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                        <!-- a Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors -->
                    <div id="card-errors" role="alert"></div>
                </div>

                <input type="submit" class="submit" value="Submit Payment">
            </form>
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