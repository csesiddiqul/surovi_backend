@php

    $logoData = \App\Models\websiteSetting::first();
@endphp

<aside class="main-sidebar sidebar-light-danger elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{$logoData->logo}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Surovi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->




        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item {{ request()->routeIs('home') ? 'menu-open' : '' }}">
                    <a href="{{asset('/home')}}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>




                <li class="nav-item {{ request()->routeIs('users.create')  || request()->routeIs('users') || request()->routeIs('users.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('users.create') || request()->routeIs('users') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>
                            User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.create')}}" class="nav-link  {{ request()->routeIs('users.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users')}}" class="nav-link  {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-item {{ request()->routeIs('slider.create')  || request()->routeIs('slider.index') || request()->routeIs('slider.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('slider.create') || request()->routeIs('slider.index') || request()->routeIs('slider.edit') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-images"></i>
                        <p>
                            Slider
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('slider.create')}}" class="nav-link {{ request()->routeIs('slider.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>upload</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('slider.index')}}" class="nav-link {{ request()->routeIs('slider.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>

                 <li class="nav-item {{ request()->routeIs('achievement.create')  || request()->routeIs('achievement.index') || request()->routeIs('achievement.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('achievement.create') || request()->routeIs('achievement.index') || request()->routeIs('achievement.edit') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-images"></i>
                        <p>
                             Achievements
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('achievement.create')}}" class="nav-link {{ request()->routeIs('achievement.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>upload</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('achievement.index')}}" class="nav-link {{ request()->routeIs('achievement.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('advisoryCommittee.create')  || request()->routeIs('advisoryCommittee.index') || request()->routeIs('advisoryCommittee.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('advisoryCommittee.create') || request()->routeIs('advisoryCommittee.index') || request()->routeIs('advisoryCommittee.edit') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-images"></i>
                        <p>
                             Advisory Committee
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('advisoryCommittee.create')}}" class="nav-link {{ request()->routeIs('advisoryCommittee.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>upload</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('advisoryCommittee.index')}}" class="nav-link {{ request()->routeIs('advisoryCommittee.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>


                 <li class="nav-item {{ request()->routeIs('sponsorChild.create')  || request()->routeIs('sponsorChild.index') || request()->routeIs('sponsorChild.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('sponsorChild.create') || request()->routeIs('sponsorChild.index') || request()->routeIs('sponsorChild.edit') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-images"></i>
                        <p>
                             SponsorChild
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('sponsorChild.create')}}" class="nav-link {{ request()->routeIs('sponsorChild.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>upload</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sponsorChild.index')}}" class="nav-link {{ request()->routeIs('sponsorChild.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>




                 <li class="nav-item {{ request()->routeIs('sdg.create')  || request()->routeIs('sdg.index') || request()->routeIs('sdg.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('sdg.create') || request()->routeIs('sdg.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-newspaper"></i>
                        <p>
                            SDG
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('sdg.create')}}" class="nav-link {{ request()->routeIs('sdg.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sdg.index')}}" class="nav-link {{ request()->routeIs('sdg.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>

                </li>



                <li class="nav-item {{ request()->routeIs('account.create')  || request()->routeIs('account.index') || request()->routeIs('account.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('account.create') || request()->routeIs('account.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-newspaper"></i>
                        <p>
                            Account
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('account.create')}}" class="nav-link {{ request()->routeIs('account.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('account.index')}}" class="nav-link {{ request()->routeIs('account.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item {{ request()->routeIs('donate_info.index') || request()->routeIs('donations.create')  || request()->routeIs('donations.index') || request()->routeIs('donations.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('donate_info.index') || request()->routeIs('donations.index') || request()->routeIs('donations.create')  ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-newspaper"></i>
                        <p>
                            Donations
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('donate_info.index') }}" class="nav-link {{ request()->routeIs('donate_info.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Donate Info</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('donations.create')}}" class="nav-link {{ request()->routeIs('donations.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('donations.index')}}" class="nav-link {{ request()->routeIs('donations.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>

                </li>





                <li class="nav-item {{ request()->routeIs('updateNews.create')  || request()->routeIs('updateNews.index') || request()->routeIs('updateNews.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('updateNews.create') || request()->routeIs('updateNews.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-repeat"></i>
                        <p>
                            Scroll News
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('updateNews.create')}}" class="nav-link {{ request()->routeIs('updateNews.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>upload</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('updateNews.index')}}" class="nav-link  {{ request()->routeIs('updateNews.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item {{ request()->routeIs('slogan.create')  || request()->routeIs('slogan.index') || request()->routeIs('slogan.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link  {{ request()->routeIs('slogan.create') || request()->routeIs('slogan.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-hand-fist"></i>
                        <p>
                            welcome

                        </p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('notice.create')  || request()->routeIs('notice.index') || request()->routeIs('notice.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('notice.create') || request()->routeIs('notice.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-file-lines"></i>
                        <p>
                            Notice Board
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('notice.create')}}" class="nav-link {{ request()->routeIs('notice.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('notice.index')}}" class="nav-link {{ request()->routeIs('notice.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item {{ request()->routeIs('card.create')  || request()->routeIs('card.index') || request()->routeIs('card.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('card.create') || request()->routeIs('card.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-id-badge"></i>
                        <p>
                            Executive Committee
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('card.create')}}" class="nav-link {{ request()->routeIs('card.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('card.index')}}" class="nav-link {{ request()->routeIs('card.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{request()->routeIs('importantLink.create') || request()->routeIs('importantLink.index') || request()->routeIs('importantLink.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('importantLink.create') || request()->routeIs('importantLink.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-paperclip"></i>
                        <p>
                            Important link
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('importantLink.create')}}" class="nav-link {{ request()->routeIs('importantLink.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('importantLink.index')}}" class="nav-link {{ request()->routeIs('importantLink.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{request()->routeIs('event.create') || request()->routeIs('event.index') || request()->routeIs('event.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('event.create') || request()->routeIs('event.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-calendar-check"></i>
                        <p>
                            Event & News
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('event.create')}}" class="nav-link {{ request()->routeIs('event.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>upload</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('event.index')}}" class="nav-link {{ request()->routeIs('event.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- <li class="nav-item {{request()->routeIs('news.create') || request()->routeIs('news.index') || request()->routeIs('news.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('news.create') || request()->routeIs('news.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-newspaper"></i>
                        <p>
                            News
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('news.create')}}" class="nav-link {{ request()->routeIs('news.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('news.index')}}" class="nav-link {{ request()->routeIs('news.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>

                </li> --}}


                <li class="nav-item {{request()->routeIs('photogroup.create')
                || request()->routeIs('photogroup.index')
                || request()->routeIs('photogroup.edit')

                || request()->routeIs('photo_admin.create')
                || request()->routeIs('photo_admin.index')
                || request()->routeIs('photo_admin.edit')

                || request()->routeIs('videogal.create')
                ||  request()->routeIs('videogal.index')
                ||  request()->routeIs('videogal.edit')
                ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('photogroup.create')
                    || request()->routeIs('photogroup.index')
                    || request()->routeIs('photogroup.edit')

                    || request()->routeIs('photo_admin.create')
                    || request()->routeIs('photo_admin.index')
                    || request()->routeIs('photo_admin.edit')

                    || request()->routeIs('videogal.create')
                    || request()->routeIs('videogal.index')
                    || request()->routeIs('videogal.edit')

                     ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-photo-film"></i>
                        <p>
                            Gallery
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>




                       <ul class="nav nav-treeview">
                        <li class="nav-item {{request()->routeIs('photogroup.create') || request()->routeIs('photogroup.index') || request()->routeIs('photogroup.edit') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('photogroup.create') || request()->routeIs('photogroup.index') || request()->routeIs('photogroup.edit') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-image"></i>
                                <p>
                                     photo Group
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('photogroup.create')}}" class="nav-link {{ request()->routeIs('photogroup.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('photogroup.index')}}" class="nav-link {{ request()->routeIs('photogroup.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>list</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>


                    <ul class="nav nav-treeview">
                        <li class="nav-item {{request()->routeIs('photo_admin.create') || request()->routeIs('photo_admin.index') || request()->routeIs('photo_admin.edit') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('photo_admin.create') || request()->routeIs('photo_admin.index') || request()->routeIs('photo_admin.edit') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-image"></i>
                                <p>
                                    Photo
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('photo_admin.create')}}" class="nav-link  {{ request()->routeIs('photo_admin.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Upload</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('photo_admin.index')}}" class="nav-link  {{ request()->routeIs('photo_admin.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>list</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item {{request()->routeIs('videogal.create') || request()->routeIs('videogal.index') || request()->routeIs('videogal.edit') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link  {{ request()->routeIs('videogal.create') || request()->routeIs('videogal.index') || request()->routeIs('videogal.index')  ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-video"></i>
                                <p>
                                    video
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('videogal.create')}}" class="nav-link {{ request()->routeIs('videogal.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>upload</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('videogal.index')}}" class="nav-link {{ request()->routeIs('videogal.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>list</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>


                </li>




                  <li class="nav-item  {{request()->routeIs('JobApplication.create')
                || request()->routeIs('JobApplication.index')
                || request()->routeIs('JobApplication.edit')

              || request()->routeIs('project.create')
                || request()->routeIs('project.index')
                || request()->routeIs('project.edit')

              || request()->routeIs('documents.create')
                || request()->routeIs('documents.index')
                || request()->routeIs('documents.edit')

                ? 'menu-open' : '' }}">



                    <a href="#" class="nav-link
                    {{ request()->routeIs('JobApplication.create')
                    || request()->routeIs('JobApplication.index')

                    || request()->routeIs('project.create')
                    || request()->routeIs('project.index')

                    || request()->routeIs('documents.create')
                    || request()->routeIs('documents.index')


                    ? 'active' : '' }}">
                        <i class="nav-icon fa-brands fa-pix"></i>
                        <p>
                            Other Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>



                    <!--<ul class="nav nav-treeview">-->
                    <!--    <li class="nav-item">-->
                    <!--        <a href="{{route('developinter.index')}}" class="nav-link">-->

                    <!--            <i class="nav-icon fa-solid fa-note-sticky"></i>-->
                    <!--            <p>-->
                    <!--                 WORKING APPROAC-->
                    <!--            </p>-->
                    <!--        </a>-->
                    <!--    </li>-->
                    <!--</ul>-->

                    <!--<ul class="nav nav-treeview">-->
                    <!--    <li class="nav-item">-->
                    <!--        <a href="{{route('missionVision.index')}}" class="nav-link">-->

                    <!--            <i class="nav-icon fa-solid fa-note-sticky"></i>-->
                    <!--            <p>-->
                    <!--                Mission & Vision-->
                    <!--            </p>-->
                    <!--        </a>-->
                    <!--    </li>-->
                    <!--</ul>-->






                    <ul class="nav nav-treeview">
                        <li class="nav-item  {{request()->routeIs('JobApplication.create') || request()->routeIs('JobApplication.index') || request()->routeIs('JobApplication.edit') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('JobApplication.create') || request()->routeIs('JobApplication.index') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-file-pen"></i>
                                <p>
                                    Career
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('JobApplication.create')}}" class="nav-link {{ request()->routeIs('JobApplication.create') ? 'active' : '' }}">
                                        <i class="far fa-ciJobApplicationrcle nav-icon"></i>
                                        <p>upload</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('JobApplication.index')}}" class="nav-link {{ request()->routeIs('viJobApplicationeogal.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>list</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>



                    <ul class="nav nav-treeview">
                        <li class="nav-item {{request()->routeIs('project.create') || request()->routeIs('project.index') || request()->routeIs('project.edit') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link  {{ request()->routeIs('project.create') || request()->routeIs('project.index') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-file-pen"></i>
                                <p>
                                     Projects
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('project.create')}}" class="nav-link  {{ request()->routeIs('project.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>upload</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('project.index')}}" class="nav-link  {{ request()->routeIs('project.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>list</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item {{request()->routeIs('documents.create') || request()->routeIs('documents.index') || request()->routeIs('documents.edit') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('documents.create') || request()->routeIs('documents.index') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-file-lines"></i>
                                <p>
                                    Publications
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('documents.create')}}" class="nav-link {{ request()->routeIs('documents.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>upload</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('documents.index')}}" class="nav-link {{ request()->routeIs('documents.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>list</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>


                </li>

                <li class="nav-item {{request()->routeIs('websetting.create') || request()->routeIs('websetting.index') || request()->routeIs('websetting.edit') ? 'menu-open' : '' }}">
                    <a href="{{route('websetting.index')}}" class="nav-link {{ request()->routeIs('websetting.create') || request()->routeIs('websetting.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-gears"></i>
                        <p>
                            Site Settings

                        </p>
                    </a>

                </li>
                <li class="nav-item {{request()->routeIs('manu.create') || request()->routeIs('manu.index') || request()->routeIs('manu.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link  {{ request()->routeIs('manu.create') || request()->routeIs('manu.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-list-check"></i>
                        <p>
                            Menu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('manu.create')}}" class="nav-link {{ request()->routeIs('manu.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('manu.index')}}" class="nav-link {{ request()->routeIs('manu.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item {{request()->routeIs('page.create') || request()->routeIs('page.index') || request()->routeIs('page.edit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link  {{ request()->routeIs('page.create') || request()->routeIs('page.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-file-circle-plus"></i>
                        <p>
                            Content
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('page.create')}}" class="nav-link  {{ request()->routeIs('page.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('page.index')}}" class="nav-link  {{ request()->routeIs('page.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
