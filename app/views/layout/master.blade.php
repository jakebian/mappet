<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width">
    <title>@yield("page-title")</title>
    @yield("dependencies")
    @include('util.dependencies')

</head>
<body  id=@yield("page-id") >
    <div class="hidden-welcome">welcome</div>
    <div id="page-bg" class=@yield("page-bg")></div>
    
    <div class="left-nav column off-canvas-wrap">
        <div class="inner-wrap">
             <a class="left-off-canvas-toggle" >Menu</a> 
            <aside class="left-off-canvas-menu">
                @include('nav.side')
            </aside>
             <a class="exit-off-canvas"></a>
        </div>
    </div>

    <div class="main">
        @yield("header")
    	<div class="content">
             @if (isset($message))
            <div class="message"> {{$message}}</div>
            @endif
       		@yield("content")
        </div>
    </div>
    @include('footer.main')
    {{HTML::script('dependencies/foundation/foundation.min.js')}}
    {{HTML::script('dependencies/foundation/modernizr.js')}}

</body>
</html>
