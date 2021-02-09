<!doctype html>
<head>
    <!-- ... --->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="text-xl pl-10 pr-10">

    <nav class="border-b border-gray-800">
        <div class="container font-sans bg-gray-100 max-w-full text-white p-5 table clear-both">
            <div class="float-left">
                <input type="text" class="border rounded-lg border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Search...">
            </div>

                <ul class="float-right list-none">
                    <li class="inline-block">
                        <a class="p-3 bg-yellow-500 rounded-lg hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50" href="#" >Sign Up</a>
                    </li>
                    <li class="inline-block">
                        <a  class="p-3 bg-yellow-700 rounded-lg hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50" href="#" >Sign in</a>
                    </li>

                </ul>


        </div>



    </nav>


@yield('content')
</body>
</html>