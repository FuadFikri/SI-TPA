<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TPA Al-Kariim</title>
  <link rel="stylesheet" href="{{asset('polished/polished.min.css')}}">
  <link rel="stylesheet" href="{{asset('polished/iconic/css/open-iconic-bootstrap.min.css')}}">
  <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
 

  <style>
    .grid-highlight {
      padding-top: 1rem;
      padding-bottom: 1rem;
      background-color: #5c6ac4;
      border: 1px solid #202e78;
      color: #fff;
    }

    hr {
      margin: 6rem 0;
    }

    hr+.display-3,
    hr+.display-2+.display-3 {
      margin-bottom: 2rem;
    }
    .myfooter:hover{
      color:grey;
    }
    .myfooter{
      color:lightgray;
    }
    #myname{
      color:lightgray;
    }
    #myname:hover{
      color:grey;
    }
  </style>
  <script type="text/javascript">
    document.documentElement.className = document.documentElement.className.replace('no-js', 'js') + (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
  </script>
</head>

<body>

    <nav class="navbar navbar-expand p-0">
     <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="index.html">TPA Al-Kariim </a>
      <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button" >
        <span class="oi oi-menu"></span>
      </button>

      <span class="border-light bg-success-lighter  d-none d-md-block w-50 ml-6 mr-2" >
      <marquee behavior="slow" direction="">Assalamu'alaikum  {{Auth::user()->name}}</marquee>
      </span>
      <div class="dropdown d-none d-md-block">
        @if(\Auth::user())
        <button class="btn btn-link btn-link-success dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
          {{Auth::user()->name}}
        </button>
        @endif 
        <div class="dropdown-menu dropdown-menu-right" id="navbar-dropdown">
          {{-- <a href="#" class="dropdown-item">Profile</a> --}}
          <div class="dropdown-divider"></div>
          <li>
            <form action="{{route("logout")}}" method="POST">
              @csrf
              <button class="dropdown-item" style="cursor:pointer">Sign Out</button>
            </form>
          </li>
        </div>
      </div>
    </nav>

  <div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">
        <div class="polished-sidebar bg-light col-12 col-md-3 col-lg-2 p-0 collapse d-md-inline" id="sidebar-nav">

            <ul class="polished-sidebar-menu ml-0 pt-4 p-0 d-md-block">
              {{-- <input class="border-dark form-control d-block d-md-none mb-4" type="text" placeholder="Search" aria-label="Search" /> --}}

              <li><a href="{{route('dashboard')}}"><span class="oi oi-home"></span> Home</a></li>
              @if (Auth::user()->role=="admin")
              <li ><a href="{{url('data-master')}}"><span class="oi oi-folder"></span>Data Master</a></li>
              <li><a href="{{route('ujian.index')}}"><span class="oi oi-book"></span> Ujian</a></li>
              @endif
            <li><a href="{{url('santri')}}"><span class="oi oi-list"></span>Data Santri</a></li>
            <li><a href="{{url('ustadz')}}"><span class="oi oi-task"></span>Penilaian Ujian</a></li>
            {{-- <li><a href="{{url('ruang-srawung')}}"><span class="oi oi-chat"></span> Ruang Srawung</a></li> --}}

            </ul>
           
        </div>
        <div class="col-lg-10 col-md-9 p-4">
            <div class="row ">
              <div class="col-md-12 pl-3 pt-2">
                  <div class="pl-3">
                      <h3>@yield("pageTitle")</h3>
                      <br/
                  </div>
              </div>
            </div>

            @yield("content")
            
        </div>
      </div>

    </div>
        <div class="footer text-center bottom text-white-darkest myfooter">
            &copy; <b>2019</b> Make With <span class="oi oi-heart"></span> by <a href="https://www.linkedin.com/in/fuadfikrisyamsudin/" target="_blank" id="myname">Fuad Fikri Syamsudin</a>
        </div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/popper.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/Chart.bundle.min.js')}}" crossorigin="anonymous"></script>
  
{{-- <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
crossorigin="anonymous"></script>
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
crossorigin="anonymous"></script> --}}
@yield('footer-scripts')
</body>
</html>