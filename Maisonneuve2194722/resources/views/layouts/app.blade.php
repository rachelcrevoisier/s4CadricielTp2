<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Flags-->
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
 <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
         @php $lang = session('locale') @endphp
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="navbar-brand" href="#">@lang('lang.hello') {{Auth::user() ? Auth::user()->name : 'Visiteur'}}</a>
                    
                    
                    @guest
                    
                    <a class="nav-link" href="{{route('login')}}">@lang('lang.login')</a>
                    @else
                    <a class="nav-link" href="{{route('site.index')}}">Blogs</a>
                    <a class="nav-link" href="{{route('site.createArticle')}}">@lang('lang.addArticle')</a>
                    <a class="nav-link" href="{{route('user.registration')}}">@lang('lang.register_user')</a>
                    <a class="nav-link" href="{{route('logout')}}">@lang('lang.logout')</a>
                    <a class="nav-link" href="{{route('site.listeDocs')}}">Documents</a>
                    @endguest
                    
                    <a class="nav-link @if($lang == 'fr') text-info @endif" href="{{route('lang', 'fr')}}">Francais <i class='flag flag-france'></i></a>
                    <a class="nav-link @if($lang == 'en') text-info @endif" href="{{route('lang', 'en')}}">English <i class='flag flag-united-states'></i></a>
            </div>
               
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-6 mt-5">
                    @yield('titleHeader')
                </h1>
            </div>
        </div>
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>