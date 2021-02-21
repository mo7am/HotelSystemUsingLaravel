@extends('HomePageHotel.LayoutsHomePageHotel.appHomePageHotel')


@section('contentHomePageHotel')
  <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url({{URL::asset('designHomePageHotel/images/bg_1.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
            <div class="text mb-5 pb-3">
              <h1 class="mb-3">{{__('pageContent.welcometoyoudeluxe')}}</h1>
              <h2>{{__('pageContent.Hotels')}} &amp; {{__('pageContent.Resorts')}}</h2>
            </div>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url({{URL::asset('designHomePageHotel/images/bg_2.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
            <div class="text mb-5 pb-3">
              <h1 class="mb-3">{{__('pageContent.welcometoyouhotel')}}</h1>
              <h2>{{__('pageContent.join')}}</h2>
            </div>
          </div>
        </div>
        </div>
      </div>
  </section>

    <section class="ftco-booking">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <form class="booking-form" action="{{route('SearchAvailableRooms')}}" method="GET">
              <div class="row">
                <div class="col-md d-flex">
                  <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                    <div class="wrap">
                      <label for="#">{{__('pageContent.rooms')}}</label>
                      <div class="form-field">
                        <div class="select-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="roomtype" id="" class="form-control">
                              @foreach($alltyperooms as $typeroom)
                            <option value="{{$typeroom->id}}">{{$typeroom->type}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md d-flex">
                  <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                    <div class="wrap">
                      <label for="#">{{__('pageContent.customer')}}</label>
                      <div class="form-field">
                        <div class="select-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select  name="adult" id="" class="form-control">
                            <option value="1">1 {{__('pageContent.adult')}}</option>
                            <option value="2">2 {{__('pageContent.adult')}}</option>
                            <option value="3">3 {{__('pageContent.adult')}}</option>
                            <option value="4">4 {{__('pageContent.adult')}}</option>
                            <option value="5">5 {{__('pageContent.adult')}}</option>
                            <option value="6">6 {{__('pageContent.adult')}}</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md d-flex">
                  <div class="form-group d-flex align-self-stretch">
                    <input type="submit" value="{{__('pageContent.check_availability')}}" class="btn btn-primary py-3 px-4 align-self-stretch">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  <section class="ftco-section ftc-no-pb ftc-no-pt">
      <div class="container">
          <div class="row">
              <div class="col-md-5 p-md-5 img img-2 img-3 d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('designHomePageHotel/images/bg_2.jpg')}});">
                  <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                      <span class="icon-play"></span>
                  </a>
              </div>
              <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                  <div class="heading-section heading-section-wo-line pt-md-5 pl-md-5 mb-5">
                      <div class="ml-md-0">
                          <span class="subheading">{{__('pageContent.welcometoyoudeluxe')}}</span>
                          <h2 class="mb-4">{{__('pageContent.welcometoyouhotel')}}</h2>
                      </div>
                  </div>
                  <div class="pb-md-5">
                      <p>{{__('pageContent.discription1')}}</p>
                      <p>{{__('pageContent.discription2')}}</p>
                      <ul class="ftco-social d-flex">
                          <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                          <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                          <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                          <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>

    <br><br><br>
  <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url({{URL::asset('designHomePageHotel/images/bg_2.jpg')}});">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="row">
                      <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18 text-center">
                              <div class="text">
                                  <strong class="number" data-number="50000">0</strong>
                                  <span>{{__('pageContent.Happy_Guests')}}</span>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18 text-center">
                              <div class="text">
                                  <strong class="number" data-number="3000">0</strong>
                                  <span>{{__('pageContent.Rooms')}}</span>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18 text-center">
                              <div class="text">
                                  <strong class="number" data-number="1000">0</strong>
                                  <span>{{__('pageContent.Staffs')}}</span>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18 text-center">
                              <div class="text">
                                  <strong class="number" data-number="100">0</strong>
                                  <span>{{__('pageContent.Destination')}}</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>


    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 ftco-animate">
            <div class="row ftco-animate">
              <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                  <div class="item">
                    <div class="testimony-wrap py-4 pb-5">
                      <div class="user-img mb-4" style="background-image: url({{URL::asset('designHomePageHotel/images/person_1.jpg')}})">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text text-center">
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p class="name">Nathan Smith</p>
                        <span class="position">Guests</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4 pb-5">
                      <div class="user-img mb-4" style="background-image: url({{URL::asset('designHomePageHotel/images/person_2.jpg')}})">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text text-center">
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p class="name">Nathan Smith</p>
                        <span class="position">Guests</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4 pb-5">
                      <div class="user-img mb-4" style="background-image: url({{URL::asset('designHomePageHotel/images/person_3.jpg')}})">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text text-center">
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p class="name">Nathan Smith</p>
                        <span class="position">Guests</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4 pb-5">
                      <div class="user-img mb-4" style="background-image: url({{URL::asset('designHomePageHotel/images/person_1.jpg')}})">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text text-center">
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p class="name">Nathan Smith</p>
                        <span class="position">Guests</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4 pb-5">
                      <div class="user-img mb-4" style="background-image: url({{URL::asset('designHomePageHotel/images/person_1.jpg')}})">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text text-center">
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p class="name">Nathan Smith</p>
                        <span class="position">Guests</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="instagram">
      <div class="container-fluid">
        <div class="row no-gutters justify-content-center pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2><span>{{__('pageContent.instagram')}}</span></h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-sm-12 col-md ftco-animate">
            <a href="{{URL::asset('images/insta-1.jpg')}}" class="insta-img image-popup" style="background-image: url({{URL::asset('designHomePageHotel/images/insta-1.jpg')}});">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="{{URL::asset('images/insta-2.jpg')}}" class="insta-img image-popup" style="background-image: url({{URL::asset('designHomePageHotel/images/insta-2.jpg')}});">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="{{URL::asset('images/insta-3.jpg')}}" class="insta-img image-popup" style="background-image: url({{URL::asset('designHomePageHotel/images/insta-3.jpg')}});">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="{{URL::asset('images/insta-4.jpg')}}" class="insta-img image-popup" style="background-image: url({{URL::asset('designHomePageHotel/images/insta-4.jpg')}});">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="{{URL::asset('images/insta-5.jpg')}}" class="insta-img image-popup" style="background-image: url({{URL::asset('designHomePageHotel/images/insta-5.jpg')}});">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    @endsection
