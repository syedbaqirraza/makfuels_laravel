<div id="app">
   <div id="sidebar" class="active">
       <div class="sidebar-wrapper active">
<div class="sidebar-header">
   <div class="text-center justify-content-between">
       <div class="logo">
           <a href="index.html"><img src="{{asset('images/logo.jpg')}}" style="height:5rem !important;" alt="Logo" srcset=""></a>
       </div>
       <div class="toggler">
           <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
       </div>
   </div>
</div>
<div class="sidebar-menu">
   <ul class="menu">

       <li
           class="sidebar-item active ">
           <a href="{{ url('/dashboard') }}" class='sidebar-link'>
               <i class="bi bi-grid-fill"></i>
               <span>Dashboard</span>
           </a>
       </li>

       <li class="sidebar-item  has-sub">
           <a href="#" class='sidebar-link'>
               <i class="bi bi-stack"></i>
               <span>Users</span>
           </a>
           <ul class="submenu ">
               <li class="submenu-item ">
                   <a href="{{ url('dashboard') }}">All Users</a>
               </li>

           </ul>
       </li>
       <li class="sidebar-item  has-sub">
           <a href="#" class='sidebar-link'>
               <i class="bi bi-file-earmark-medical-fill"></i>
               <span>Invoice</span>
           </a>
           <ul class="submenu">
               <li class="submenu-item ">
                   <a href="{{ url('invoice/create') }}">Upload Invoice</a>
               </li>
               <li class="submenu-item ">
                   <a href="{{ url('invoice') }}">All Invoice</a>
               </li>
           </ul>
       </li>
       <li class="sidebar-item">
           <form action="{{ url('/logout') }}" method="POST">
            @csrf
                <button type="submit" class='w-100 btn btn-danger' style="text-align: start;"><i style="color:white;" class="bi bi-box-arrow-left" style="font-size:35px; font-weight:800; "></i> Signout</button>
            </form>
       </li>





   </ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
   </div>
   <div id="main">
       <header class="mb-3">
           <a href="#" class="burger-btn d-block d-xl-none">
               <i class="bi bi-justify fs-3"></i>
           </a>
       </header>
