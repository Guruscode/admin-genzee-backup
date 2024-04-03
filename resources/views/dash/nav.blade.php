<nav class="sidebar" >
   <div class="logo d-flex justify-content-between">
       <a class="large_logo" href="{{ route('dashboard') }}">
           <h4 style="font-weight: 900" class="font-weight-bold">Genzee Baddies</h4>
       </a>
       <a class="small_logo" href="{{ route('dashboard') }}">
        <h4 style="font-weight: 900" class="font-weight-bold">Genzee</h4>
       </a>
       <div class="sidebar_close_icon d-lg-none">
           <i class="ti-close"></i>
       </div>
   </div>
   <ul id="sidebar_menu">
       <li class>
           <a  href="{{ route('dashboard') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/dashboard.svg')}}" alt="Dashboard">
               </div>
               <div class="nav_title">
                   <span>Dashboard</span>
               </div>
           </a>
       </li>
       <li class>
           <a href="{{ route('admin.gifts') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/12.svg')}}" alt="Gifts">
               </div>
               <div class="nav_title">
                   <span>Gifts</span>
               </div>
           </a>
       </li>
       <li class>
           <a href="{{ route('admin.stickers') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/3.svg')}}" alt="Stickers">
               </div>
               <div class="nav_title">
                   <span>Stickers</span>
               </div>
           </a>
       </li>
       <li class>
        <a href="{{ route('users.index') }}" aria-expanded="false">
            <div class="nav_icon_small">
                <img src="{{asset('img/menu-icon/5.svg')}}" alt="Admob Settings">
            </div>
            <div class="nav_title">
                <span>All Users</span>
            </div>
        </a>
    </li>
       <li class>
           <a href="{{ route('users.verify') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/5.svg')}}" alt="Admob Settings">
               </div>
               <div class="nav_title">
                   <span>Verifield Users</span>
               </div>
           </a>
       </li>
       <li class>
           <a href="{{ route('admin.spam_check_features') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/11.svg')}}" alt="Spam Check Features">
               </div>
               <div class="nav_title">
                   <span>Payments</span>
               </div>
           </a>
       </li>
       <li class>
           <a href="{{ route('admin.agora_settings') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/20.svg')}}" alt="Agora Settings">
               </div>
               <div class="nav_title">
                   <span>Report</span>
               </div>
           </a>
       </li>
     
     
       <li class>
           <a href="{{ route('admin.push_notification') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/9.svg')}}" alt="Push Notification">
               </div>
               <div class="nav_title">
                   <span>Push Notification</span>
               </div>
           </a>
       </li>
       <li class>
           <a href="{{ route('admin.search_users') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/18.svg')}}" alt="Search Users">
               </div>
               <div class="nav_title">
                   <span>Settings</span>
               </div>
           </a>
       </li>
       <!-- Add other navigation items similarly -->
   </ul>
</nav>
