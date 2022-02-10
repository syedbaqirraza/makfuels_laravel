
@extends('layouts.website')

@section('script')
<title>Makfuels - Contact Us</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
<link rel="stylesheet" href="{{ asset('css/web/style.css') }}"/>

@endsection

@section('content')
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
      <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">

        <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?q=6800%20Olive%20Blvd%20Suite%20B%20Saint%20Louis,%20MO,%2063131&t=&z=13&ie=UTF8&iwloc=&output=embed" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
        <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
          <div class="lg:w-1/2 px-6">
            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
            <p class="mt-1">6800 Olive Blvd Suite B Saint Louis, MO, 63131</p>
            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">EMAIL</h2>
            <a class="text-indigo-500 leading-relaxed">info@makfuels.com</a>

          </div>
          <div class="lg:w-1/2 px-6 lg:mt-0">
            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">FAX</h2>
            <p class="leading-relaxed">314-727-4004</p>
            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
            <p class="leading-relaxed">314-727-4000</p>
          </div>
        </div>
      </div>
      <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Contact Us</h2>
       <form method="post">
        <div class="relative mb-4">
          <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
          <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
          <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
          <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
          <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
          <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
        </div>
        <input type="submit" name="mail" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" value="Submit">
        </form>
        <?php
        // if(isset($_POST['mail']))
        // {
        //   $conn=mysqli_connect("localhost","makfuels_db","makfuels_db","makfuels_db");
        //   $name=$_POST['name'];
        //   $email=$_POST['email'];
        //   $message=$_POST['message'];
        //   $query=mysqli_query($conn,"INSERT INTO `message`(`id`, `name`, `email`, `message`) VALUES (null,'$name','$email','$message')");
        //   if($query==1)
        //     {
        //          echo"<script>alert('Thank You For Your Message. Shortly We Connect Back With You.')</script>";
        //     }
        // }


        ?>
        <!-- <p class="text-xs text-gray-500 mt-3">Chicharrones blog helvetica normcore iceland tousled brook viral artisan.</p> -->
      </div>
    </div>
  </section>
@endsection
