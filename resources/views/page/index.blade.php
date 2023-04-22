@extends('main')

@section('css')

@endsection

@section('content')
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Cảnh báo</p>
                            <h4 class="my-1 text-danger">4805</h4>
                            <p class="mb-0 font-13">+2.5% so với tháng trước</p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-white"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Sự kiện</p>
                            <h4 class="my-1 text-warning">$84,245</h4>
                            <p class="mb-0 font-13">+5.4% so với tháng trước</p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto "><i class='bx bxs-wallet'></i>
                        </div>
                    </div>
                </div>
            </div>
       </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Số Camera</p>
                            <h4 class="my-1 text-primary">34.6%</h4>
                            <p class="mb-0 font-13">-4.5%  so với tháng trước</p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto "><i class='bx bxs-bar-chart-alt-2' ></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Số NVR</p>
                            <h4 class="my-1 text-success">8.4K</h4>
                            <p class="mb-0 font-13">+8.4%  so với tháng trước</p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-group'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div><!--end row-->
    <div class="card radius-10">
        <div class="card-body">
          <div class="d-flex align-items-center">
              <div>
                  <h6 class="mb-0">Thống kê cảnh báo -sự kiện</h6>
              </div>
              <div class="ms-auto">
                  <a class=" text-black" href="#"><i class="bx bx-refresh"></i> Cập nhật dữ liệu</i>
                  </a>
                  
              </div>
          </div>
          <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
              <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #f12339"></i>Cảnh báo</span>
              <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>Sự kiện</span>
          </div>
          <div class="chart-container-1">
              <canvas id="chart1" height="350px"></canvas>
            </div>
        </div>
        <!--
        <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
          <div class="col">
            <div class="p-3">
              <h5 class="mb-0">24.15M</h5>
              <small class="mb-0">Overall Visitor <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
            </div>
          </div>
          <div class="col">
            <div class="p-3">
              <h5 class="mb-0">12:38</h5>
              <small class="mb-0">Visitor Duration <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
            </div>
          </div>
          <div class="col">
            <div class="p-3">
              <h5 class="mb-0">639.82</h5>
              <small class="mb-0">Pages/Visit <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
            </div>
          </div>
        </div>
        -->
    </div>
    </div>
@endsection

@section('js')
<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
<script>
$(function() {
    "use strict";

	
// chart 1

  var ctx = document.getElementById("chart1").getContext('2d');
   
  var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke1.addColorStop(0, '#f12339');  
      gradientStroke1.addColorStop(1, '#db4a59'); 
   
  var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke2.addColorStop(0, '#ff8359');
      gradientStroke2.addColorStop(1, '#ffdf40');

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
          datasets: [{
            label: 'Cảnh báo',
            data: [65, 59, 80, 81,65, 59, 80, 81,59, 80, 81,65],
            borderColor: gradientStroke1,
            backgroundColor: gradientStroke1,
            hoverBackgroundColor: gradientStroke1,
            pointRadius: 0,
            fill: false,
            borderWidth: 0
          }, {
            label: 'Sự kiện',
            data: [28, 48, 40, 19,28, 48, 40, 19,40, 19,28, 48],
            borderColor: gradientStroke2,
            backgroundColor: gradientStroke2,
            hoverBackgroundColor: gradientStroke2,
            pointRadius: 0,
            fill: false,
            borderWidth: 0
          }]
        },
		
		options:{
		  maintainAspectRatio: false,
		  legend: {
			  position: 'bottom',
              display: false,
			  labels: {
                boxWidth:8
              }
            },
			tooltips: {
			  displayColors:false,
			},	
		  scales: {
			  xAxes: [{
				barPercentage: .5
			  }]
		     }
		}
      });
	  
});	 
</script>

@endsection