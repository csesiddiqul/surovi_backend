<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surovi</title>

    <link rel="icon" type="image/png" href="">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    
    

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">


		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
		
		<link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

		<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/all.min.css')}}">
    
    
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style_demo.css')}}">
    
    
    <style>
    
        .deomo-page {
            border: 1px solid;
            padding: 18px;
            background: #e8f7ce;
            margin-bottom: 20px;
            border-radius: 2px;
            text-align: justify;
            
            }
            
            
          
   </style>

</head>

    <div class="container-my">
        <body>

        @include('inc.header')
        
        <section class="main-about">
            <div class="about-bg" style="margin-top:8%; color:#d00b01;">
                <div class="container">
                    <h1 style="text-transform: capitalize">{{ $page->title}}</h1>
                </div>
            </div>
        
        </section>
        
        
        <div class="container">
            
            <div class='deomo-page'>
                
                <div class="row">
                
                @if($page->img)
               <div class="col-md-4">
        
                       <div class="row">
                           <img src="{{$page->img}}" class="w-75 mb-3" alt="">
                       </div>
        
        
               </div>
                @endif
        
                <div class="{{$page->img? 'col-md-8' : 'col-md-12'}}">
                  
                     {!!\Illuminate\Support\Str::limit(substr($page->description,0),650) !!}
                </div>
        
                <div class="row">
                    
                    <div class="{{$page->img? 'col-md-12' : 'col-md-12'}}">
                    {!!\Illuminate\Support\Str::limit(substr($page->description,650),64000) !!}
                    </div>
                </div>
        
            </div>
            </div>
        
        
        
            
        </div>
        
        @include('inc.footer')
        
        </body>
    <div>


</html>