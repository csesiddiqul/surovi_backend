@extends('layouts.public')

@section('content')

    @foreach($devlopment as $key=> $devlopment)
        <section class="main-about" style="margin-top:5%">
            <div class="about-bg">
                <div class="container">
                    <h1><span class="about-color">Mission & Vision</span></h1>
                </div>
            </div>

        </section>


        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="title">{{$devlopment->title_one}} </h1>
                    <div class="row">
                        <div class='col-md-4'><img src="{{$devlopment->img}}" class="img-fluid" style="margin-top: 25px;"  alt=""></div>
                        <div class='col-md-8'> <p class="textp mt-2 ">
                        {!! nl2br($devlopment->description_one) !!}
                    </p></div>
                    </div>
                    
                    
                    
                    
                   
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title">{{$devlopment->title_tow}}</h1>


                            <p class="border-ot mt-2 textp">

                                {!! nl2br($devlopment->description_tow) !!}

                            </p>
                        </div>


                        <div class="col-md-12">
                            <h1 class="title">{{$devlopment->title_three}}</h1>


                            <p class="border-ot mt-2 textp">


                                {!! nl2br($devlopment->description_three) !!}

                            </p>
                        </div>

                    </div>
                </div>



            </div>
        </div>





        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title">{{$devlopment->title_four}}</h1>
                    <p class="textp mt-2 border-ot">
                        {{$devlopment->description_four}}


                    </p>
                </div>




            </div>
        </div>

    @endforeach

@endsection
