p

@extends('layouts.public')

@section('content')


        <section class="main-about">
            <div class="about-bg">
                <div class="container">
                    <h1>-	<span class="about-color">welcome</span></h1>
                </div>
            </div>

        </section>


        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="title">welcome to surovi</h1>
                    <img src="{{$slogandata->file}}" class="img-fluid box-img-2" alt="">

                </div>

                <div class="col-md-8">



                    <p class="border-ot mt-2 textp">

                        {!! nl2br($slogandata->slogan) !!}

                    </p>
                </div>



            </div>
        </div>







@endsection
