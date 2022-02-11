<?php
// $conn=mysqli_connect("localhost","makfuels_db","makfuels_db","makfuels_db");
// if(!$conn)
// {
//   die("Connection failed: " . mysqli_connect_error());
// }
//     if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
//               $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
//               $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
//     }
//     $client  = $_SERVER['HTTP_CLIENT_IP'];
//     $forward = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     $remote  = $_SERVER['REMOTE_ADDR'];
// $ip="";
//     if(filter_var($client, FILTER_VALIDATE_IP))
//     {
//         $ip = $client;
//     }
//     elseif(filter_var($forward, FILTER_VALIDATE_IP))
//     {
//         $ip = $forward;
//     }
//     else
//     {
//         $ip = $remote;
//     }
// if($ip!='')
// {
//     $check_ip=mysqli_query($conn,"SELECT * FROM `visiter` WHERE `ip`='$ip'");
//     $count=mysqli_num_rows($check_ip);
//     if($count>0)
//     {
//         while($row=mysqli_fetch_array($check_ip))
//         {
//             $id=$row['id'];
//             $visit=$row['visit'];
//             $totalvisit=$visit+1;
//              mysqli_query($conn,"UPDATE `visiter` SET `visit`='$totalvisit' WHERE id='$id'");
//         }
//     }
//     else{
//         mysqli_query($conn,"INSERT INTO `visiter`(`id`, `ip`, `visit`) VALUES (null,'$ip',1)");
//     }
// }
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Authentication forms">
    <meta name="author" content="Makfuels">
     <link rel="icon" href="{{ asset('images/logo.png') }}">
@yield('script')

</head>

<body class="bg-white font-sans leading-normal tracking-normal">
<header class="text-gray-600 body-font header">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0" href="{{ route('/') }}">
        <img src='{{ asset('images/logo.jpg') }}' height='80px' width='80px' />
    </a>
    <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4	flex flex-wrap items-center text-white justify-center">
      <a class="mr-5 hover_text" href="{{ route('/') }}" style="cursor:pointer;">Home</a>
      <a class="mr-5 hover_text" href="{{ route('promotions') }}" style="cursor:pointer;">Promotions</a>
      <a class="mr-5 hover_text" href="{{ route('contact') }}" style="cursor:pointer;">Contact Us</a>
    </nav>
    @auth
    <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0" onclick="window.location.href='{{ url('/dashboard') }}'">Dashboard

    @else
    <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0" onclick="window.location.href='{{ url('/login') }}'">Login

    @endauth
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button>
  </div>
</header>
@yield('content')

<footer class="footer_color body-font">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
      <a class="flex title-font font-medium items-center md:justify-start justify-center text-white" href="{{ route('/') }}">
         <img src='{{ asset('images/logo.jpg') }}' height='80px' width='80px' />
      </a>
      <p class="text-sm text-white sm:ml-4 sm:pl-4  sm:py-2 sm:mt-0 mt-4">© 2021 Makfuels
      </p>
      <p class="text-sm text-white sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">Address : 6800 Olive Blvd Suite B Saint Louis, MO, 63131
     <br>Email : info@makfuels.com
     </p>
          <p class="text-sm text-white sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">Fax : 314-727-4004 <br>Phone : 314-727-4000
      </p>
    </div>
  </footer>

  <script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
  }
  </script>
  <body>
  </html>
