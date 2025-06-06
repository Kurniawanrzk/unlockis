<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("assets/css/init.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield("css")
    @livewireStyles
    <title>@yield("title")</title>
</head>
<body>
    @include("content.Main.header.header")
    @include("content.Main.sidebar")
    @include("content.Main.chat")
    <div class="chatbot-container" id="btn-chat">
    </div>
    <div class="loading-layer" id="loading-layer">
        <div class="logo-loading">
            <img id="logo-nav" src="{{asset("assets/img/logo-unlock.png")}}" alt="logo unlock studio">
        </div>
    </div>
    <main>
        @yield("content")
    </main>
     @include("content.Main.footer.footer")
    <script>
        var headerStatus;
        var scrolls = true;
        
        function hiddenFooter() {
            document.querySelector("footer").style.display = "none"
        }
    </script>
    <script src="{{asset("assets/js/scroll.js")}}"></script>
    <script src="{{asset("assets/js/sidebar.js")}}"></script>
    <script src="{{asset("assets/js/chat.js")}}"></script>
    @livewireScripts
    @yield("js")
</body>
</html>