<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<title>Login ludwin</title>

<meta charset="utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="    " />
<meta property="og:url" content="" />
<meta property="og:site_name" content="" />
<link rel="canonical" href="" />
<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.png')}}" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <div class="app-navbar-item position-fixed" style="right:5px">
        <a href="#" class="btn btn-icon btn-custom btn-icon-muted  btn-active-color-primary" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            @if(app()->getLocale()== 'fr')
            <img src="{{asset('assets/media/flags/fr.png')}}" alt="fr">
            @elseif (app()->getLocale()== 'en')
            <img src="{{asset('assets/media/flags/en.png')}}" alt="en">
            @endif
         </a>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
          <div class="menu-item px-3 my-0">
            <a  href="{{ route('changer.langue', ['lang' => 'fr'])}}" class="menu-link px-3 py-2">
              <span class="menu-icon" data-kt-element="icon">
                <img src="{{asset('assets/media/flags/fr.png')}}" alt="fr">
              </span>
              <span class="menu-title">
                Français
              </span>
            </a>
          </div>
          <div class="menu-item px-3 my-0">
            <a href="{{ route('changer.langue', ['lang' => 'en']) }}"  class="menu-link px-3 py-2">
              <span class="menu-icon" data-kt-element="icon">
                <img src="{{asset('assets/media/flags/en.png')}}" alt="fr">
             </span>
              <span class="menu-title">
               Anglais
              </span>
            </a>
          </div>
        </div>
  </div>

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-100 w-lg-500px p-md-10">
            @yield("content")
                    </div>
                </div>
            </div>


            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url({{asset('assets/media/misc/auth-bg.png')}})">



                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <a href="javascript:;" class="my-8">
                        <img alt="Logo" src="{{asset('assets/media/logos/logo-whit.png')}}" />
                    </a>

                    <h1 class="d-none d-md-block text-white fs-2qx fw-bolder text-center mb-7">
                        {{__('messages.Viewing BI reports')}}
                    </h1>
                    <div class="d-none d-md-block text-white fs-base text-center">
                        {{__('messages.Our Business Intelligence (BI) report visualization application')}}
                        {{-- <a href="#" class="opacity-75-hover text-warning fw-bold me-1"> rapports BI (Business Intelligence)</a> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>

</body>
</html>
