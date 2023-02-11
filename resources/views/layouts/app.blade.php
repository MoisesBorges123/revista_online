<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-layout.admin.head :title="$title ?? ''"></x-layout.admin.head>        
    </head>
    <body class="font-sans antialiased">
       
        <x-layout.admin.header></x-layout.admin.header> 
        <x-layout.admin.aside></x-layout.admin.aside> 
        <x-jet-banner />
            <main id="main" class="main">
                {{ $slot }}
                <!--<div class="modal-backdrop fade show"></div>-->
            </main>
       

        @stack('modals')

       <!-- <x-layout.admin.footer></x-layout.admin.footer> -->
        <x-layout.admin.script></x-layout.admin.script>
    </body>
</html>
