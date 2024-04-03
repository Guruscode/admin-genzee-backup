@include('dash.head')
@include('dash.nav')
@include('dash.header')
<div class="main_content_iner overly_inner ">
   <div class="container-fluid p-0 ">
      <div class="row">
         <div class="col-12">
            <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
               <div class="page_title_left d-flex align-items-center">
                  <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
                  <!-- send-to-firebase.blade.php -->
{{-- <form method="post" action="{{ route('send-to-firebase') }}">
   @csrf
   <button type="submit">Send Data to Firebase</button>
</form> --}}
               </div>
               <div class="page_title_right">
                  <div class="page_date_button d-flex align-items-center">
                     <img src="img/icon/calender_icon.svg" alt> August 1, 2020 - August 31, 2020
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row ">
         {{-- <div class="col-xl-8 ">
            <div class="white_card mb_30 card_height_100">
               <div class="white_card_header">
                  <div class="row align-items-center justify-content-between flex-wrap">
                     <div class="col-lg-4">
                        <div class="main-title">
                           <h3 class="m-0">Stoke Details</h3>
                        </div>
                     </div>
                     <div class="col-lg-4 text-end d-flex justify-content-end">
                        <select class="nice_Select2 max-width-220">
                           <option value="1">Show by month</option>
                           <option value="1">Show by year</option>
                           <option value="1">Show by day</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="white_card_body">
                  <div id="management_bar"></div>
               </div>
            </div>
         </div> --}}
         <div class="col-xl-12 ">
            <div class="white_card card_height_100 mb_30 user_crm_wrapper">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="single_crm">
                        <div class="crm_head d-flex align-items-center justify-content-between">
                           <div class="thumb">
                              <img src="img/crm/businessman.svg" alt>
                           </div>
                           <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                           <h4>{{ $totalUsers }}</h4>
                           <p>Total Users</p>
                       </div>
                       
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="single_crm ">
                        <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                           <div class="thumb">
                              <img src="img/crm/customer.svg" alt>
                           </div>
                           <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                           <h4>{{ $stickerCount }}</h4>
                           <p>Total Payments</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="single_crm">
                        <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                           <div class="thumb">
                              <img src="img/crm/infographic.svg" alt>
                           </div>
                           <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                           <h4>{{ $giftCount }}</h4>
                           <p>Total Gifts</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="single_crm">
                        <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                           <div class="thumb">
                              <img src="img/crm/sqr.svg" alt>
                           </div>
                           <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                           <h4>2455</h4>
                           <p>Total chats</p>
                        </div>
                     </div>
                  </div>
               </div>
         
            </div>
         </div>

         <div class="col-xl-12">
            <div class="white_card card_height_100 mb_30">
               <div class="white_card_header">
                  <div class="row align-items-center">
                     <div class="col-lg-4">
                        <div class="main-title">
                           <h3 class="m-0">Full Statistics</h3>
                        </div>
                     </div>
                     <div class="col-lg-8">
                     
                     </div>
                  </div>
               </div>
               <div class="white_card_body ">
                  <div class="row min_height_oveflow">
                     <div class="col-lg-12 mb_30">
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                           <div class="user_pils_thumb d-flex align-items-center">
                           
                              <span style="font-size: 24px" class="f_s_14 f_w_800 text_color_11"><b>Name</b></span>
                           </div>
                           <div class="user_info ">
                              <span style="font-size: 24px" class="f_s_14 f_w_800 text_color_11"><b>Count</b></span>
                           </div>
                           <div class="action_btns d-flex">
                             
                           </div>
                        </div>
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                           <div class="user_pils_thumb d-flex align-items-center">
                           
                              <span class="f_s_14 f_w_400 text_color_11">Total Users</span>
                           </div>
                           <div class="user_info">
                              {{ $totalUsers }}
                           </div>
                           <div class="action_btns d-flex">
                             
                           </div>
                        </div>
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                           <div class="user_pils_thumb d-flex align-items-center">
                           
                              <span class="f_s_14 f_w_400 text_color_11">Total Verified Users</span>
                           </div>
                           <div class="user_info">
                              00001
                           </div>
                           <div class="action_btns d-flex">
                             
                           </div>
                        </div>
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                           <div class="user_pils_thumb d-flex align-items-center">
                           
                              <span class="f_s_14 f_w_400 text_color_11">All Payments</span>
                           </div>
                           <div class="user_info">
                              00001
                           </div>
                           <div class="action_btns d-flex">
                             
                           </div>
                        </div>
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                           <div class="user_pils_thumb d-flex align-items-center">
                           
                              <span class="f_s_14 f_w_400 text_color_11">Total Reports</span>
                           </div>
                           <div class="user_info">
                              00001
                           </div>
                           <div class="action_btns d-flex">
                             
                           </div>
                        </div>
                
                       
                     </div>
              
                   
                  </div>
               </div>
            </div>
         </div>


      
       
         <div class="col-xl-12">
            <div class="white_card card_height_100  mb_20">
               <div class="white_card_header">
                  <div class="box_header m-0">
                     <div class="main-title">
                        <h3 class="m-0">Visitors</h3>
                     </div>
                     <div class="header_more_tool">
                        <div class="dropdown">
                           <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                           <i class="ti-more-alt"></i>
                           </span>
                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                              <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                              <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                              <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                              <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="white_card_body">
                  <div id="world-map-markers" class="dashboard_w_map pb_20"></div>
                  <div class="world_list_wraper">
                     <div class="row justify-content-center">
                        <div class="col-lg-9">
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="single_progressbar">
                                    <h6 class="f_s_14 f_w_400">USA</h6>
                                    <div id="bar4" class="barfiller">
                                       <div class="tipWrap">
                                          <span class="tip"></span>
                                       </div>
                                       <span class="fill" data-percentage="81"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="single_progressbar">
                                    <h6>Australia</h6>
                                    <div id="bar5" class="barfiller">
                                       <div class="tipWrap">
                                          <span class="tip"></span>
                                       </div>
                                       <span class="fill" data-percentage="58"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="single_progressbar">
                                    <h6>Brazil</h6>
                                    <div id="bar6" class="barfiller">
                                       <div class="tipWrap">
                                          <span class="tip"></span>
                                       </div>
                                       <span class="fill" data-percentage="42"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="single_progressbar">
                                    <h6>Latvia</h6>
                                    <div id="bar7" class="barfiller">
                                       <div class="tipWrap">
                                          <span class="tip"></span>
                                       </div>
                                       <span class="fill" data-percentage="55"></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>
@include('dash.footer')