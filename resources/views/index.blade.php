@extends('layouts.website')


@section('script')
<title>Makfuels - Home</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
<link rel="stylesheet" href="{{ asset('css/web/style.css') }}"/>

@endsection



@section('content')



<div class="slideshow-container1">

<div class="mySlides fade">
  <!-- <div class="numbertext">1 / 3</div> -->
  <img src="{{ asset('images/14.jpg') }}" style="width:100%">
  <!-- <div class="text">Caption Text</div> -->
</div>

<div class="mySlides fade">
  <!-- <div class="numbertext">2 / 3</div> -->
  <img src="{{ asset('images/24.jpg') }}" style="width:100%">
  <!-- <div class="text">Caption Two</div> -->
</div>

<div class="mySlides fade">
  <!-- <div class="numbertext">3 / 3</div> -->
  <img src="{{ asset('images/9.jpg') }}" style="width:100%">
  <!-- <div class="text">Caption Three</div> -->
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>



<section class="text-gray-600 body-font" style="background-size: cover;
    background-position: center;
    background-image: url('{{ asset('images/filler.png') }}');
    background-repeat: no-repeat;">
  <div class="container px-5 py-24 mx-auto">
    <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">

      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
        <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
      </svg>

      <p class="leading-relaxed text-2xl text-left">

MAK FUELS has been serving Missouri and Illinois customers with their fuel needs
for over 30 years, we have been supplying quality FUELS to our dealer network
in these markets, we are currently expanding our dealer network in Georgia,
Florida, Arizona and Texas, we help our dealers at every level from finding
a strategic location to build a brand new facility.
</p>
<br>
<p class="leading-relaxed text-2xl text-left">
Although Our primary business is to supply quality petroleum products to gas
stations but we are also very focused on energy efficiency, climate change and
 Fuels of the future, we are committed to design and development new locations
  with net zero carbon emission fuels.
  </p>
  <br>
<p class="leading-relaxed text-2xl text-left">
We have been working with several partners to provide our customers with verity
 of energy sources, our VISION 2050 is to develop state of the art facilities
 which will supply Fuels that are carbon neutral.
 </p>
 <br>
<p class="leading-relaxed text-2xl text-left">
Currently we are building network of fueling facilities with verity of fuels
to offer, our goal is to scale up our platform with new market conditions and
needs, this would enable us to deliver net zero carbon emission fuels to our customer.
    </p>
      <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
      <h2 class="text-gray-900 font-medium title-font tracking-wider text-lg">Makfuels</h2>

    </div>
  </div>
</section>
@endsection

