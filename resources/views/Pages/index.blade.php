@extends('layouts.frontend')

@section('content')

<!-- <div class="col-md-10 bg-dark text-light offset-1 py-5">
    <center>
<h1>
  Welcome to Leave Application Website
</h1>
<p>
  This is home page
</p>
</center>
</div> -->
<div class="col-md-10 offset-1">
    @include('layouts.inc.slider')
</div>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-8 offset-2">
                    <h2 class=" section-title text-center">
                        <span class="text-red"> Designed System </span> for online application
                    </h2>
                    <p class=" section-subtitle text-center">
                        WE ARE WORKING CLOSELY TO REACH YOU AS SOON AS POSSIBLE
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row ">
                <div class="col-md-4  border-rounded">
                    <div class="card">
                        <!-- <img src="assets/images/slider/card1.jpg" class="card-img-top" alt="..." height="150px" width="150px"> -->
                        <div class="card-body">
                            <h2 class="card-title text-colden">Our Vision</h2>
                            <p class="card-text">To ensure ease application anywhere,anytime.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  border-rounded ">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-colden">Our Mission</h2>
                            <p class="card-text">To ensure smooth running of application. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  border-rounded">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-colden ">Our Values</h2>
                            <p class="card-text">Improved user support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection