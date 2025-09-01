@php
    $webdata = \App\Models\websiteSetting::first();
@endphp
<section class="activitis">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1 class="title">Get in touch!</h1>
                <div class="contacts-form">
                    <form action="{{route('send.email')}}" method="post">
                    @csrf
                        <input type="name" name="name" placeholder="Name" class="form-label contact-input">

                        <input type="email" name="email" placeholder="Email" class="form-label contact-input">

                        <textarea name="message" placeholder="Message..." class="form-label contact-input"></textarea>
                      
                        <!--<input type="submit" name="" value="Send!" class="button">-->
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <h1 class="title">Address</h1>
                <div class="tweets testimonials">
                    <ul>
                        <li>
                            <i class="fa-solid fa-location-dot" style="color:#9bbff8; float: left; margin: 10px 8px 30px 0px;"></i> 

                            <span>
                                
                                    <p style="line-height: 31px;">
                                        
                                        
                                         
                                         <span> {{$webdata->address}}<br></span>
                                    </p>
                                    
                               

                            </span>
                        </li>
                        
                          <li>

                            <span>
                                    <p>
                                       
                                    
                                         <i class="fa-solid fa-phone" style="color:#9bbff8"></i>  {{$webdata->phone}} <br>
                                        
                                    
                                    </p>
                                    
                               


                            </span>
                        </li>
                        
                          <li>

                            <span>
                                    <p>
                                       
                                    
                                         <i class="fa-solid fa-envelope" style="color:#9bbff8"></i> {{$webdata->email}}<br>
                                    
                                    </p>
                                    
                               


                            </span>
                        </li>

                        <li></li>

                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <h1 class="title">MAP</h1>
                <div class="flickr">
                    <iframe class="map" src="{{$webdata->mapUrl}}"></iframe>
                </div>
            </div>
        </div>
    </div>

</section>


<footer class="all_contant">
    <div class="container">

        <div class="row">

            <div class="clo-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <h1 class="title ">Contact Info</h1>

                        <p class="fottoerp"><i class="fa-solid fa-phone"></i> {{$webdata->phone}} </p>

                        <p class="fottoerp"><i class="fa-solid fa-envelope"></i> {{$webdata->email}}</p>

                        <p class="fottoerp">
                            <i class="fa-solid fa-globe"></i>
                            {{$webdata->websiteLink}}
                        </p>

                    </div>


                    <div class="col-md-4">

                        <img src="{{asset($webdata->logo)}}" class="fotterimgm"  style = 'margin-left: 40px;' alt="">
                        
                        <p class="fottoerp" style = 'font-size: 23px;
text-transform: uppercase;'>{{$webdata->logo_name}}</p>
                        <div class="footera">
                            <!-- <ul>
                                <li><a href="#">Ipsum dolor sit amet.</a></li>
                                <li><a href="#">Lorem ipsum dolor sit amet con</a></li>
                            </ul> -->
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h1 class="title deom-title">About Website</h1>

                        <div class="footera">
                            <ul>
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('development')}}">About Us</a></li>
                                <li><a href="{{route('ongoing')}}">Projects</a></li>
                                <li><a href="{{route('mission')}}">Mission Vission</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </div>

                    </div>



                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="clearfix">
                    <div class="social-icon  footer-icon">
                        <ul>

                            <input class="f-input" type="text" placeholder="Search the Site">
                            <li><a href="{{$webdata->facbookLink}}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>

                            <li><a href="{{$webdata->twitter}}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>

                            <li><a href="{{$webdata->instagram}}" target="_blank" title="Instagram"><i class="fab fa-brands fa-instagram"></i></a></li>


                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-item float-start">
                            <p> © 2022 Surovi , All Rights Reserved.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="footer-item">
                            <p>Developed By: <a href="https://www.ipsitasoft.com/" target="_blank">Ipsita Computers Pte Ltd.</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="border-2"></div>



    </div>
</footer>

<script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script><script>
    AOS.init();
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script><script>
    AOS.init();
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
