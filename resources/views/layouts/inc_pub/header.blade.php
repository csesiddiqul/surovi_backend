

  <div class="custom-marque py-2 ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-8 d-flex align-items-center gap-2 mb-2 mb-md-0">
                    <strong class="fs-6 ">Highlight&nbsp;||</strong>
                   <div class="flex-grow-1 overflow-hidden">
                       <div class="flex-grow-1 overflow-hidden">
                            <marquee behavior="scroll" direction="left" scrollamount="5" class="custom-text-warning text-nowrap">
                                @foreach($updateNewsScroll as $news)
                                    <span >{{ $news->news }}</span>
                                @endforeach
                            </marquee>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-4 text-md-end text-center text-md-start">
                    <strong>Hotline : <a style="color: inherit; text-decoration: none;" href="tel:{{$setting->phone}}">{{$setting->phone}}</a></strong>
                </div>

            </div>
        </div>
    </div>

    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg" style="padding-top: 0px;">
            <div class="container bg-white py-2 px-2 shadow-sm rounded-14">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{$setting->logo}}" alt="Logo" height="40"
                        class="d-inline-block align-top"><span style="color:red">&nbsp;&nbsp;{{$setting->logo_name}}</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon bg-light"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @if($menus->count())
                            @foreach($menus[0] as $key => $menu)
                                <li class="nav-item {{!empty($menus[$menu->id]) ? 'dropdown' : ''}}">
                                    <a class="nav-link text-dark {{!empty($menus[$menu->id]) ? 'dropdown-toggle' : ''}} {{ \Request::url() == url($menu->slug) ? '' : '' }}"
                                    href="{{$menu->menu_type == 1 ? url( $menu->slug) : route('pages',$menu->slug)}}" id="menu_{{$key}}"
                                    role="button" @if(!empty($menus[$menu->id])) role="button" data-bs-toggle="dropdown" aria-expanded="false" @endif>
                                        {{$menu->name}}

                                        @if(!empty($menus[$menu->id]))
                                        <i class="bi bi-chevron-down icon-sm-drop-down"></i>
                                        @endif
                                    </a>
                                    @if(!empty($menus[$menu->id]))
                                        <ul class="dropdown-menu" aria-labelledby="menu_{{$key}}">
                                            @foreach($menus[$menu->id] as $menu)
                                                <li class="nav-item"><a
                                                        class="dropdown-item nav-link" href="{{$menu->menu_type == 1 ? url( $menu->slug) : route('pages',$menu->slug)}}">
                                                        {{$menu->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        @endif


                    </ul>
                    <ul class="navbar-nav ms-auto">
                       <li class="nav-item">
    <a class="btn custom-donate-btn rounded-pill px-4 py-2 me-2" href="donate.html">Donate Now</a>
</li>

                        <li class="nav-item">
                            <a class="nav-link text-dark d-flex align-items-center gap-2 px-2" href="#">
                                <img src="https://thalassaemiasamity.org//client/assets/images/icon/user.png"
                                    alt="Login" height="36" width="36" class="rounded-circle shadow-sm">
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
