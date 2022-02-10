
@extends('layouts.website')

@section('script')
<title>Makfuels - Promotions</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
<link rel="stylesheet" href="{{ asset('css/web/style.css') }}"/>

@endsection

@section('content')
<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24  flex-col items-center">
      <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
        <img class="object-cover object-center rounded" alt="hero" src="{{ asset('images/pro.jpeg') }}">
      </div>
    </div>
  </section>
@endsection
