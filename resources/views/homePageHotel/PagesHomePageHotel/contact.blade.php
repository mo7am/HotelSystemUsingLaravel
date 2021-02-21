
@extends('HomePageHotel.LayoutsHomePageHotel.appHomePageHotel')


@section('contentHomePageHotel')
    <div class="hero-wrap" style="background-image: url({{URL::asset('designHomePageHotel/images/bg_1.jpg')}});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{route('indexhome')}}">{{__('pageContent.home')}}</a></span> <span>{{__('pageContent.contactus')}}</span></p>
	            <h1 class="mb-4 bread">{{__('pageContent.contactus')}}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">{{__('pageContent.contactinfo')}}</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>{{__('pageContent.address')}}:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>{{__('pageContent.phone')}}:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>{{__('pageContent.email')}}:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>{{__('pageContent.website')}}</span> <a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="{{__('pageContent.name')}}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="{{__('pageContent.email')}}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="{{__('pageContent.subject')}}">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="{{__('pageContent.message')}}"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="{{__('pageContent.sendmessage')}}" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>


      @endsection
