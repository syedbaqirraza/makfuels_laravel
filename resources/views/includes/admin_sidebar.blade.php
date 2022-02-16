<div id="app">
   <div id="sidebar" class="active">
       <div class="sidebar-wrapper active">
<div class="sidebar-header">
   <div class="text-center justify-content-between">
       <div class="logo">
           <a href='{{ url('/dashboard') }}'><img src="{{asset('images/logo.jpg')}}" style="height:5rem !important;" alt="Logo" srcset=""></a>
       </div>
       <div class="toggler">
           <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
       </div>
   </div>
</div>
<div class="sidebar-menu">
   <ul class="menu">
       @php
            $id=Auth::id();
            $user_role=DB::table('users')->where('id',$id)->first();
       @endphp
        @if ($user_role->role=="admin")
            <li class="sidebar-item active ">
                <a href="{{ url('/dashboard') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link' style="background-color: #435ebe;">
                    <i class="bi bi-stack text-white"></i>
                    <span class="text-white">User</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="{{ url('users') }}">All Users</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link' style="background-color: #435ebe;">
                    <i class="bi bi-stack color-white text-white" ></i>
                    <span class="text-white">Client</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item ">
                        <a href="{{ route('client.create') }}">Add New Client</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('client.index') }}">All Clients</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link' style="background-color: #435ebe;">
                    <i class="bi bi-file-earmark-medical-fill text-white"></i>
                    <span class="text-white">Invoice</span>
                </a>
                <ul class="submenu pl-1">
                    <li class="submenu-item">
                        <a href="{{ url('invoice/create') }}">Upload Invoice</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ url('invoice') }}">All Invoice</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link' style="background-color: #435ebe;">
                    <i class="bi bi-file-earmark-medical-fill text-white"></i>
                    <span class="text-white">Fuels</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="{{ route('fuel.index') }}">All Fuel</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('fuel.create') }}">Add Fuel</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <form action="{{ url('/logout') }}" method="POST">
                @csrf
                    <button type="submit" class='w-100 btn' style="text-align: start; background-color: #435ebe; color:white;"><i class="bi bi-box-arrow-left" style="font-size:20px; font-weight:800;color:white;   margin: 7px 13px 0px 0px;"></i> Signout</button>
                </form>
            </li>
            <li class="sidebar-item">
                <button type="submit" onclick="window.location.href='{{ url('/') }}'" class='w-100 btn btn-info' style="text-align: start; background-color: #435ebe; color:white;"><i class="bi bi-box-arrow-left" style="font-size:20px; font-weight:800;color:white;   margin: 7px 13px 0px 0px;"></i>  Back To Website</button>
            </li>
        @elseif ($user_role->role=="employee")
            <li class="sidebar-item active ">
                <a href="{{ url('/dashboard') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link' style="background-color: #435ebe;">
                    <i class="bi bi-file-earmark-medical-fill text-white"></i>
                    <span class="text-white">Invoice</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item " >
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

                    <button type="submit" class='w-100 btn' style="text-align: start; background-color: #435ebe; color:white;"><i class="bi bi-box-arrow-left" style="font-size:20px; font-weight:800;color:white;   margin: 7px 13px 0px 0px;"></i> Signout</button>
                </form>
            </li>
            <li class="sidebar-item">

                <button type="submit" onclick="window.location.href='{{ url('/') }}'" class='w-100 btn btn-info' style="text-align: start; background-color: #435ebe; color:white;"><i class="bi bi-box-arrow-left" style="font-size:20px; font-weight:800;color:white;   margin: 7px 13px 0px 0px;"></i>  Back To Website</button>

        </li>
        @elseif ($user_role->role=="client")
            <li class="sidebar-item active ">
                <a href="{{ url('/dashboard') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link' style="background-color: #435ebe">
                    <i class="bi bi-file-earmark-medical-fill text-white"></i>
                    <span class="text-white">Pricing</span>
                </a>
            </li>
            <li class="sidebar-item">
                <form action="{{ url('/logout') }}" method="POST">
                @csrf
                    <button type="submit" class='w-100 btn' style="text-align: start; background-color: #435ebe; color:white;"><i class="bi bi-box-arrow-left" style="font-size:20px; font-weight:800;color:white;   margin: 7px 13px 0px 0px;"></i> Signout</button>
                </form>
            </li>
            <li class="sidebar-item">

                <button type="submit" onclick="window.location.href='{{ url('/') }}'" class='w-100 btn btn-info' style="text-align: start; background-color: #435ebe; color:white;"><i class="bi bi-box-arrow-left" style="font-size:20px; font-weight:800;color:white;   margin: 7px 13px 0px 0px;"></i>  Back To Website</button>

            </li>
        @endif
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
