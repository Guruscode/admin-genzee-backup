<nav class="sidebar" >
   <div class="logo d-flex justify-content-between">
       <a class="large_logo" href="{{ route('dashboard') }}">
           <p>Genzee Baddies</p>
       </a>
       <a class="small_logo" href="{{ route('dashboard') }}">
           <p>G-B</p>
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
                   <img src="{{asset('img/menu-icon/2.svg')}}" alt="Gifts">
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
           <a href="{{ route('admin.admob_settings') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/4.svg')}}" alt="Admob Settings">
               </div>
               <div class="nav_title">
                   <span>Admob Settings</span>
               </div>
           </a>
       </li>
       <li class>
           <a href="{{ route('admin.spam_check_features') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/5.svg')}}" alt="Spam Check Features">
               </div>
               <div class="nav_title">
                   <span>Spam Check Features</span>
               </div>
           </a>
       </li>
       <li class>
           <a href="{{ route('admin.agora_settings') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/6.svg')}}" alt="Agora Settings">
               </div>
               <div class="nav_title">
                   <span>Agora Settings</span>
               </div>
           </a>
       </li>
       <li class>
           <a href="{{ route('admin.interstitial') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/7.svg')}}" alt="Interstitial">
               </div>
               <div class="nav_title">
                   <span>Interstitial</span>
               </div>
           </a>
       </li>
       <li class>
           <a href="{{ route('admin.upgrade') }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{asset('img/menu-icon/8.svg')}}" alt="Upgrade">
               </div>
               <div class="nav_title">
                   <span>Upgrade</span>
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
                   <img src="{{asset('img/menu-icon/10.svg')}}" alt="Search Users">
               </div>
               <div class="nav_title">
                   <span>Search Users</span>
               </div>
           </a>
       </li>
       <!-- Add other navigation items similarly -->
   </ul>
</nav>
