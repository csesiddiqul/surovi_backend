@php
    $menudata = \App\Models\menu::all();
    $logo = \App\Models\websiteSetting::first();
    $webdata = \App\Models\websiteSetting::first();
@endphp


<header>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">

            <div class=" social-icon  float-end">
                <ul>
                    <li><a href="{{$webdata->facbookLink}}" target="_blank" title="Facebook" style="background: #5578bf;"><i class="fab fa-facebook-f" ></i></a></li>
                    <li><a href="{{$webdata->twitter}}" target="_blank" title="Twitter" style="background: #1da1f2;"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{$webdata->instagram}}" target="_blank" title="Instagram" style="background-image: linear-gradient(#a82fb7, #f7c24e);"><i class="fab fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>

            <div class="justify-content-end" >
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}" target="_blank">Login</a></li>

                    <li class="nav-item"><a class="nav-link" style=" border-radius: 2px; background: rgb(4, 129, 4);" href="{{route('donate_now')}}" >DONATE NOW</a></li>
                </ul>
            </div>


        </div>
    </nav>




    <nav class="navbar navbar-expand-lg navbar-light fixed-top haderMargin">
        <div class="container">
            <div class="h-logo">
                <img src="{{$webdata->logo}}" alt="">
            </div>
            @php
                $first = strtok($logo->logo_name," ");
                $last = substr(strstr($logo->logo_name," "),1);
            @endphp
            <a class="navbar-brand d-md-block" href=""><span class="fastdata">{!! $first !!}&nbsp;{{$last}}</span><span style="font-size: 18px"> </span></a>
            <div class=" social-icon  float-end">
                <ul>

                </ul>
            </div>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menudata">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="menudata">
                <ul class="navbar-nav">


                    @if($menus->count())

                        @foreach($menus[0] as $key => $menu)
                            <li class="{{!empty($menus[$menu->id]) ? 'dropdown' : ''}}">
                                <a class="nav-link {{!empty($menus[$menu->id]) ? 'dropdown-toggle' : ''}} {{ \Request::url() == url($menu->slug) ? '' : '' }}"
                                   href="{{$menu->menu_type == 1 ? url( $menu->slug) : route('pages',$menu->slug)}}" id="menu_{{$key}}"
                                   role="button" @if(!empty($menus[$menu->id])) role="button" data-bs-toggle="dropdown" aria-expanded="false" @endif>
                                    {{$menu->name}}
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
            </div>
        </div>
    </nav>





</header>

<style>
    ul li:hover > ul,
    ul li ul:hover {
        visibility: visible;
        opacity: 1;
        display: block;
    }
</style>
