@include('dash.head')
@include('dash.nav')
@include('dash.header')
<div class="main_content_iner overly_inner ">
   <div class="container-fluid p-0 ">
      <div class="row">
         <div class="col-12">
            <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
               <div class="page_title_left d-flex align-items-center">
                  <h3 class="f_s_25 f_w_700 dark_text mr_30">Hello admin, welcome back</h3>

                  <!-- send-to-firebase.blade.php -->
{{-- <form method="post" action="{{ route('send-to-firebase') }}">
   @csrf
   <button type="submit">Send Data to Firebase</button>
</form> --}}

@if (isset($errorMessage))
    <div class="alert alert-danger" role="alert">
        {{ $errorMessage }}
    </div>
@endif

               </div>
           
            </div>
         </div>
      </div>
      <div class="row ">
       
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
                           <h4>{{ $totalPhoto }}</h4>
                           <p>Total photos</p>
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
                           <h4>{{ $totalStickers }}</h4>
                           <p>Total Stickers</p>
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
                           <h4>{{ $totalComplains }}</h4>
                           <p> Total Complains</p>
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
                           
                              <span class="f_s_14 f_w_400 text_color_11"><b>Total Users</b></span>
                           </div>
                           <div class="user_info">
                             <h2> {{ $totalUsers }}</h2>
                           </div>
                           <div class="action_btns d-flex">
                             
                           </div>
                        </div>
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                           <div class="user_pils_thumb d-flex align-items-center">
                           
                              <span class="f_s_14 f_w_400 text_color_11"><b>Total Verified</b></span>
                           </div>
                           <div class="user_info">
                            <h2>  {{ $totalPaidUsers }}</h2>
                           </div>
                           <div class="action_btns d-flex">
                             
                           </div>
                        </div>
                  
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                           <div class="user_pils_thumb d-flex align-items-center">
                           
                              <span class="f_s_14 f_w_400 text_color_11"><b>Reports</b></span>
                           </div>
                           <div class="user_info">
                             <h2> {{ $totalComplains }}</h2>
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


         <div class="col-lg-6">
            <div class="single_crm">
                <div class="crm_body">
                    <h4>{{ $totalUsers }}</h4>
                    <p>Total Users</p>
                </div>
                <div class="d-flex justify-content-between">
                    <canvas id="userPieChart" width="200" height="200"></canvas> <!-- Pie chart -->
                    <canvas id="userBarChart" width="200" height="200"></canvas> <!-- Bar chart -->
                </div>
            </div>
        </div>
        
        
      
       
         {{-- <div class="col-xl-12">
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
         </div> --}}

      </div>
   </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   var pieCtx = document.getElementById('userPieChart').getContext('2d');
   var barCtx = document.getElementById('userBarChart').getContext('2d');

   var pieChart = new Chart(pieCtx, {
       type: 'pie',
       data: {
           labels: ['Total Users', 'Other Users'],
           datasets: [{
               data: [{{ $totalUsers }}, 100 - {{ $totalUsers }}], // Percentage of total users and other users
               backgroundColor: [
                   'rgba(255, 99, 132, 0.8)', // Red color for total users
                   'rgba(54, 162, 235, 0.8)'   // Blue color for other users
               ],
               borderColor: [
                   'rgba(255, 99, 132, 1)',
                   'rgba(54, 162, 235, 1)'
               ],
               borderWidth: 1
           }]
       },
       options: {
           responsive: true,
           legend: {
               position: 'top',
           },
           title: {
               display: false,
               text: 'Total Users'
           },
           animation: {
               animateScale: true,
               animateRotate: true
           }
       }
   });

   var barChart = new Chart(barCtx, {
       type: 'bar',
       data: {
           labels: ['Total Users'],
           datasets: [{
               label: 'Total Users',
               data: [{{ $totalUsers }}], // Total number of users
               backgroundColor: 'rgba(255, 99, 132, 0.8)', // Red color for bars
               borderColor: 'rgba(255, 99, 132, 1)',
               borderWidth: 1
           }]
       },
       options: {
           responsive: true,
           legend: {
               display: false
           },
           scales: {
               yAxes: [{
                   ticks: {
                       beginAtZero: true
                   }
               }]
           }
       }
   });
</script>

@include('dash.footer')