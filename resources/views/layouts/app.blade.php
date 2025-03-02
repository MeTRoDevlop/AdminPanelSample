<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">-->

        <!-- Styles -->
        @stack('styles')
        <!--<link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">-->
        <link rel="stylesheet" href="{{ asset('libs/css/fontawesome-v5.15.4-all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Flexible Datepicker Widget -->
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />-->
        <!-- Minimalistic but Perfect Scrollbar-->
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />-->


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @stack('scripts')

        <!-- Flash Export -->
        <!--<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.flash.min.js"></script>-->
        <!-- Classic Text Editor -->
        <!--<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>-->
        <!-- Time Format -->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>-->
        <!-- Flexible Datepicker Widget -->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>-->
        <!-- Minimalistic but Perfect Scrollbar-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>-->

    </head>
    <body class="font-sans antialiased flex h-screen" dir="{{(App::isLocale('fa') ? 'rtl' : 'ltr')}}">

        @isset ($menu)
            {{ $menu }}
        @endisset

        <div class="min-h-screen bg-gray-100 flex-1 flex flex-col overflow-hidden">

            @isset ($header)
            {{ $header }}
            @endisset

            <!-- Page Content -->
            <main class="overflow-x-hidden overflow-y-auto">
                {{ $slot }}
            </main>
        </div>



    </body>
</html>
