@extends('admin.layouts.master')
@section('title','Admin Dashboard')
@section('specify_js')
    {{--    <script src={{asset('assets/admin/')."/js/pages/dashboard-2.init.js"}}></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',
            // The data for our dataset
            data: {
                labels: ["Nam", "Nữ", "Phi giới tính"],
                datasets: [
                    {
                        label: "My First dataset",
                        backgroundColor: ['yellow', 'orange', 'red', 'green', 'blue', 'purple', 'indigo'],
                        borderColor: '#fff',
                        data: [{{$male_product_amount}},{{$female_product_amount}},{{$unisex_product_amount}}],
                    }]
            },
            // Configuration options go here
            options: {}
        });
        chart.canvas.parentNode.style.height = '95%';
        chart.canvas.parentNode.style.width = '500px';
    </script>
    <script>
        var ctx = document.getElementById('myChartBrand').getContext('2d');
        var chart2 = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',
            // The data for our dataset
            data: {
                labels: [@foreach($brands as $brand) "{{$brand->brand_name}}",@endforeach],
                datasets: [
                    {
                        label: "My First dataset",
                        backgroundColor: ['purple', 'orange', 'red', 'green', 'blue', 'purple', 'indigo','black','cyan'],
                        borderColor: '#fff',
                        data: [@foreach($brands as $brand) "{{count($brand->products)}}",@endforeach],
                    }]
            },
            // Configuration options go here
            options: {}
        });
        chart2.canvas.parentNode.style.height = '95%';
        chart2.canvas.parentNode.style.width = '500px';
    </script>
    <script>
        var ctx = document.getElementById('myChartOrigin').getContext('2d');
        var chart3 = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',
            // The data for our dataset
            data: {
                labels: [@foreach($brands as $brand) "{{$brand->brand_name}}",@endforeach],
                datasets: [
                    {
                        label: "My First dataset",
                        backgroundColor: ['purple', 'orange', 'red', 'green', 'blue', 'purple', 'indigo','black','cyan'],
                        borderColor: '#fff',
                        data: [@foreach($brands as $brand) "{{count($brand->products)}}",@endforeach],
                    }]
            },
            // Configuration options go here
            options: {}
        });
        chart3.canvas.parentNode.style.height = '95%';
        chart3.canvas.parentNode.style.width = '500px';
    </script>
@endsection
@section('content')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Tổng thu nhập</p>
                                <h3 class="font-weight-medium my-2">65.841.000 <span data-plugin="counterup"> đ</span></h3>
                                <p class="m-0">Jan - Apr 2019</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Tổng lượt truy cập</p>
                                <h3 class="font-weight-medium my-2"><span data-plugin="counterup">15.521</span></h3>
                                <p class="m-0">Jan - Apr 2019</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-crown avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Tổng số đơn mua hàng</p>
                                <h3 class="font-weight-medium my-2"><span data-plugin="counterup">5,842</span></h3>
                                <p class="m-0">Jan - Apr 2019</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-auto-fix  avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">
                                    Tỉ lệ lợi nhuận</p>
                                <h3 class="font-weight-medium my-2"><span data-plugin="counterup">102.07</span>%</h3>
                                <p class="m-0">Jan - Apr 2019</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card-box">
                        <div class="card-box" style="min-height: 95%">
                            <canvas id="myChart"></canvas>
                            <div style="text-align: center;margin-top: 5%;">Tỉ lệ sản phẩm theo giới tính</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card-box">
                        <div class="card-box" style="min-height: 95%">
                            <canvas id="myChartBrand"></canvas>
                            <div style="text-align: center;margin-top: 5%;">Tỉ lệ sản phẩm theo thương hiệu</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">

                <div class="col-xl-6">
                    <div class="card-box">
                        <div class="card-box" style="min-height: 95%">
                            <canvas id="myChartOrigin"></canvas>
                            <div style="text-align: center;margin-top: 5%;">Tỉ lệ sản phẩm theo thương hiệu</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Tổng đăng nhập</h4>

                        <div class="widget-chart text-center" dir="ltr">

                            <div id="donut-chart" style="height: 280px; max-height: 280px; position: relative;"
                                 class="c3">
                                <svg width="245.1999969482422" height="280" style="overflow: hidden;">
                                    <defs>
                                        <clipPath id="c3-1596979226521-clip">
                                            <rect width="245.1999969482422" height="255.984375"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1596979226521-clip-xaxis">
                                            <rect x="-31" y="-20" width="307.1999969482422" height="40.015625"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1596979226521-clip-yaxis">
                                            <rect x="-29" y="-4" width="20" height="279.984375"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1596979226521-clip-grid">
                                            <rect width="245.1999969482422" height="255.984375"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1596979226521-clip-subchart">
                                            <rect width="245.1999969482422" height="0"></rect>
                                        </clipPath>
                                    </defs>
                                    <g transform="translate(0.5,4.5)">
                                        <text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle"
                                              x="122.5999984741211" y="127.9921875" style="opacity: 0;"></text>
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226521-clip)"
                                           class="c3-regions" style="visibility: hidden;"></g>
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226521-clip-grid)"
                                           class="c3-grid" style="visibility: hidden;">
                                            <g class="c3-xgrid-focus">
                                                <line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="255.984375"
                                                      style="visibility: hidden;"></line>
                                            </g>
                                        </g>
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226521-clip)"
                                           class="c3-chart">
                                            <g class="c3-stanford-elements">
                                                <g class="c3-stanford-lines"
                                                   style="shape-rendering: geometricprecision;"></g>
                                                <g class="c3-stanford-texts"></g>
                                                <g class="c3-stanford-regions"></g>
                                            </g>
                                            <g class="c3-event-rects" style="fill-opacity: 0;">
                                                <rect class="c3-event-rect" x="0" y="0" width="245.1999969482422"
                                                      height="255.984375"></rect>
                                            </g>
                                            <g class="c3-chart-bars">
                                                <g class="c3-chart-bar c3-target c3-target-Male"
                                                   style="pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-Male c3-bars c3-bars-Male"
                                                       style="cursor: pointer;"></g>
                                                </g>
                                                <g class="c3-chart-bar c3-target c3-target-Female"
                                                   style="pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-Female c3-bars c3-bars-Female"
                                                       style="cursor: pointer;"></g>
                                                </g>
                                            </g>
                                            <g class="c3-chart-lines">
                                                <g class="c3-chart-line c3-target c3-target-Male"
                                                   style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-Male c3-lines c3-lines-Male"></g>
                                                    <g class=" c3-shapes c3-shapes-Male c3-areas c3-areas-Male"></g>
                                                    <g class=" c3-selected-circles c3-selected-circles-Male"></g>
                                                    <g class=" c3-shapes c3-shapes-Male c3-circles c3-circles-Male"
                                                       style="cursor: pointer;"></g>
                                                </g>
                                                <g class="c3-chart-line c3-target c3-target-Female"
                                                   style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-Female c3-lines c3-lines-Female"></g>
                                                    <g class=" c3-shapes c3-shapes-Female c3-areas c3-areas-Female"></g>
                                                    <g class=" c3-selected-circles c3-selected-circles-Female"></g>
                                                    <g class=" c3-shapes c3-shapes-Female c3-circles c3-circles-Female"
                                                       style="cursor: pointer;"></g>
                                                </g>
                                            </g>
                                            <g class="c3-chart-arcs"
                                               transform="translate(122.5999984741211,122.9921875)">
                                                <text class="c3-chart-arcs-title"
                                                      style="text-anchor: middle; opacity: 1;">
                                                </text>
                                                <g class="c3-chart-arc c3-target c3-target-Male">
                                                    <g class=" c3-shapes c3-shapes-Male c3-arcs c3-arcs-Male">
                                                        <path class=" c3-shape c3-shape c3-arc c3-arc-Male" transform=""
                                                              style="fill: rgb(100, 197, 177); cursor: pointer;"
                                                              d="M7.131730546073132e-15,-116.46999855041503A116.46999855041503,116.46999855041503,0,1,1,-97.20274565113526,64.16297063115441L-72.16554803949619,47.63606118759133A86.46999855041503,86.46999855041503,0,1,0,5.294760347352102e-15,-86.46999855041503Z"></path>
                                                    </g>
                                                    <text dy=".35em" class=""
                                                          transform="translate(82.05036825508498,44.15318594505381)"
                                                          style="opacity: 1; text-anchor: middle; pointer-events: none;"></text>
                                                </g>
                                                <g class="c3-chart-arc c3-target c3-target-Female">
                                                    <g class=" c3-shapes c3-shapes-Female c3-arcs c3-arcs-Female">
                                                        <path class=" c3-shape c3-shape c3-arc c3-arc-Female"
                                                              transform=""
                                                              style="fill: rgb(241, 241, 241); cursor: pointer;"
                                                              d="M-97.20274565113526,64.16297063115441A116.46999855041503,116.46999855041503,0,0,1,-2.1395191638219393e-14,-116.46999855041503L-1.5884281042056305e-14,-86.46999855041503A86.46999855041503,86.46999855041503,0,0,0,-72.16554803949619,47.63606118759133Z"></path>
                                                    </g>
                                                    <text dy=".35em" class=""
                                                          transform="translate(-82.05036825508499,-44.15318594505381)"
                                                          style="opacity: 1; text-anchor: middle; pointer-events: none;"></text>
                                                </g>
                                            </g>
                                            <g class="c3-chart-texts">
                                                <g class="c3-chart-text c3-target c3-target-Male  "
                                                   style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-texts c3-texts-Male"></g>
                                                </g>
                                                <g class="c3-chart-text c3-target c3-target-Female  "
                                                   style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-texts c3-texts-Female"></g>
                                                </g>
                                            </g>
                                        </g>
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226521-clip-grid)"
                                           class="c3-grid c3-grid-lines">
                                            <g class="c3-xgrid-lines"></g>
                                            <g class="c3-ygrid-lines"></g>
                                        </g>
                                        <g class="c3-axis c3-axis-x"
                                           clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226521-clip-xaxis)"
                                           transform="translate(0,255.984375)" style="visibility: visible; opacity: 0;">
                                            <text class="c3-axis-x-label" transform="" style="text-anchor: end;"
                                                  x="245.1999969482422" dx="-0.5em" dy="-0.5em"></text>
                                            <g class="tick" transform="translate(123, 0)" style="opacity: 1;">
                                                <line x1="0" x2="0" y2="6"></line>
                                                <text x="0" y="9" transform=""
                                                      style="text-anchor: middle; display: block;">
                                                    <tspan x="0" dy=".71em" dx="0">0</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M0,6V0H245.1999969482422V6"></path>
                                        </g>
                                        <g class="c3-axis c3-axis-y"
                                           clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226521-clip-yaxis)"
                                           transform="translate(0,0)" style="visibility: visible; opacity: 0;">
                                            <text class="c3-axis-y-label" transform="rotate(-90)"
                                                  style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text>
                                            <g class="tick" transform="translate(0,255)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">22</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,235)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">24</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,216)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">26</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,197)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">28</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,177)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">30</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,158)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">32</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,139)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">34</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,119)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">36</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,100)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">38</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,81)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">40</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,61)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">42</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,42)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">44</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,23)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">46</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,3)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">48</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M-6,1H0V255.984375H-6"></path>
                                        </g>
                                        <g class="c3-axis c3-axis-y2" transform="translate(245.1999969482422,0)"
                                           style="visibility: hidden; opacity: 0;">
                                            <text class="c3-axis-y2-label" transform="rotate(-90)"
                                                  style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text>
                                            <g class="tick" transform="translate(0,256)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,231)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.1</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,205)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.2</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,180)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.3</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,154)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.4</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,129)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.5</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,103)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.6</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,78)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.7</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,52)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.8</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,27)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.9</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,1)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">1</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M6,1H0V255.984375H6"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(0.5,280.5)" style="visibility: hidden;">
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226521-clip-subchart)"
                                           class="c3-chart">
                                            <g class="c3-chart-bars"></g>
                                            <g class="c3-chart-lines"></g>
                                        </g>
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226521-clip)"
                                           class="c3-brush" fill="none" pointer-events="all">
                                            <rect class="overlay" pointer-events="all" cursor="crosshair" x="0" y="0"
                                                  width="245.1999969482422" height="0"></rect>
                                            <rect class="selection" cursor="move" fill="#777" fill-opacity="0.3"
                                                  stroke="#fff" shape-rendering="crispEdges"
                                                  style="display: none;"></rect>
                                            <rect class="handle handle--w" cursor="ew-resize"
                                                  style="display: none;"></rect>
                                            <rect class="handle handle--e" cursor="ew-resize"
                                                  style="display: none;"></rect>
                                        </g>
                                        <g class="c3-axis-x" transform="translate(0,0)"
                                           clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226521-clip-xaxis)"
                                           style="opacity: 0;">
                                            <g class="tick" transform="translate(123, 0)" style="opacity: 1;">
                                                <line x1="0" x2="0" y2="6"></line>
                                                <text x="0" y="9" transform=""
                                                      style="text-anchor: middle; display: block;">
                                                    <tspan x="0" dy=".71em" dx="0">0</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M0,6V0H245.1999969482422V6"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(0,259.984375)">
                                        <g class="c3-legend-item c3-legend-item-Male"
                                           style="visibility: visible; cursor: pointer;">
                                            <text x="77.8656234741211" y="9" style="pointer-events: none;">Nam</text>
                                            <rect class="c3-legend-item-event" x="63.865623474121094" y="-5"
                                                  width="55.5625" height="20.015625" style="fill-opacity: 0;"></rect>
                                            <line class="c3-legend-item-tile" x1="61.865623474121094" y1="4"
                                                  x2="71.8656234741211" y2="4" stroke-width="10"
                                                  style="stroke: rgb(100, 197, 177); pointer-events: none;"></line>
                                        </g>
                                        <g class="c3-legend-item c3-legend-item-Female"
                                           style="visibility: visible; cursor: pointer;">
                                            <text x="133.4281234741211" y="9" style="pointer-events: none;">Nữ
                                            </text>
                                            <rect class="c3-legend-item-event" x="119.4281234741211" y="-5"
                                                  width="61.90625" height="20.015625" style="fill-opacity: 0;"></rect>
                                            <line class="c3-legend-item-tile" x1="117.4281234741211" y1="4"
                                                  x2="127.4281234741211" y2="4" stroke-width="10"
                                                  style="stroke: rgb(241, 241, 241); pointer-events: none;"></line>
                                        </g>
                                    </g>
                                    <text class="c3-title" x="122.5999984741211" y="0"></text>
                                </svg>
                                <div class="c3-tooltip-container"
                                     style="position: absolute; pointer-events: none; display: none;"></div>
                            </div>

                            <div class="row text-center mt-4">
                                <div class="col-6">
                                    <h3 data-plugin="counterup">150</h3>
                                    <p class="text-muted mb-0">Nam giới</p>
                                </div>
                                <div class="col-6">
                                    <h3 data-plugin="counterup">250</h3>
                                    <p class="text-muted mb-1">Nữ giới</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Tổng số lần giao dịch</h4>

                        <div class="widget-chart text-center" dir="ltr">

                            <div id="pie-chart" style="height: 280px; max-height: 280px; position: relative;"
                                 class="c3">
                                <svg width="245.1999969482422" height="280" style="overflow: hidden;">
                                    <defs>
                                        <clipPath id="c3-1596979226682-clip">
                                            <rect width="245.1999969482422" height="255.984375"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1596979226682-clip-xaxis">
                                            <rect x="-31" y="-20" width="307.1999969482422" height="40.015625"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1596979226682-clip-yaxis">
                                            <rect x="-29" y="-4" width="20" height="279.984375"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1596979226682-clip-grid">
                                            <rect width="245.1999969482422" height="255.984375"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1596979226682-clip-subchart">
                                            <rect width="245.1999969482422" height="0"></rect>
                                        </clipPath>
                                    </defs>
                                    <g transform="translate(0.5,4.5)">
                                        <text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle"
                                              x="122.5999984741211" y="127.9921875" style="opacity: 0;"></text>
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226682-clip)"
                                           class="c3-regions" style="visibility: hidden;"></g>
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226682-clip-grid)"
                                           class="c3-grid" style="visibility: hidden;">
                                            <g class="c3-xgrid-focus">
                                                <line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="255.984375"
                                                      style="visibility: hidden;"></line>
                                            </g>
                                        </g>
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226682-clip)"
                                           class="c3-chart">
                                            <g class="c3-stanford-elements">
                                                <g class="c3-stanford-lines"
                                                   style="shape-rendering: geometricprecision;"></g>
                                                <g class="c3-stanford-texts"></g>
                                                <g class="c3-stanford-regions"></g>
                                            </g>
                                            <g class="c3-event-rects" style="fill-opacity: 0;">
                                                <rect class="c3-event-rect" x="0" y="0" width="245.1999969482422"
                                                      height="255.984375"></rect>
                                            </g>
                                            <g class="c3-chart-bars">
                                                <g class="c3-chart-bar c3-target c3-target-Done"
                                                   style="pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-Done c3-bars c3-bars-Done"
                                                       style="cursor: pointer;"></g>
                                                </g>
                                                <g class="c3-chart-bar c3-target c3-target-Due"
                                                   style="pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-Due c3-bars c3-bars-Due"
                                                       style="cursor: pointer;"></g>
                                                </g>
                                                <g class="c3-chart-bar c3-target c3-target-Hold"
                                                   style="pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-Hold c3-bars c3-bars-Hold"
                                                       style="cursor: pointer;"></g>
                                                </g>
                                            </g>
                                            <g class="c3-chart-lines">
                                                <g class="c3-chart-line c3-target c3-target-Done"
                                                   style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-Done c3-lines c3-lines-Done"></g>
                                                    <g class=" c3-shapes c3-shapes-Done c3-areas c3-areas-Done"></g>
                                                    <g class=" c3-selected-circles c3-selected-circles-Done"></g>
                                                    <g class=" c3-shapes c3-shapes-Done c3-circles c3-circles-Done"
                                                       style="cursor: pointer;"></g>
                                                </g>
                                                <g class="c3-chart-line c3-target c3-target-Due"
                                                   style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-Due c3-lines c3-lines-Due"></g>
                                                    <g class=" c3-shapes c3-shapes-Due c3-areas c3-areas-Due"></g>
                                                    <g class=" c3-selected-circles c3-selected-circles-Due"></g>
                                                    <g class=" c3-shapes c3-shapes-Due c3-circles c3-circles-Due"
                                                       style="cursor: pointer;"></g>
                                                </g>
                                                <g class="c3-chart-line c3-target c3-target-Hold"
                                                   style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-Hold c3-lines c3-lines-Hold"></g>
                                                    <g class=" c3-shapes c3-shapes-Hold c3-areas c3-areas-Hold"></g>
                                                    <g class=" c3-selected-circles c3-selected-circles-Hold"></g>
                                                    <g class=" c3-shapes c3-shapes-Hold c3-circles c3-circles-Hold"
                                                       style="cursor: pointer;"></g>
                                                </g>
                                            </g>
                                            <g class="c3-chart-arcs"
                                               transform="translate(122.5999984741211,122.9921875)">
                                                <text class="c3-chart-arcs-title"
                                                      style="text-anchor: middle; opacity: 0;"></text>
                                                <g class="c3-chart-arc c3-target c3-target-Done">
                                                    <g class=" c3-shapes c3-shapes-Done c3-arcs c3-arcs-Done">
                                                        <path class=" c3-shape c3-shape c3-arc c3-arc-Done" transform=""
                                                              style="fill: rgb(241, 241, 241); cursor: pointer;"
                                                              d="M7.131730546073132e-15,-116.46999855041503A116.46999855041503,116.46999855041503,0,0,1,28.964910797593507,112.81087937260807L0,0Z"></path>
                                                    </g>
                                                    <text dy=".35em" class=""
                                                          transform="translate(92.44127825915415,-11.678049225242672)"
                                                          style="opacity: 1; text-anchor: middle; pointer-events: none;"></text>
                                                </g>
                                                <g class="c3-chart-arc c3-target c3-target-Due">
                                                    <g class=" c3-shapes c3-shapes-Due c3-arcs c3-arcs-Due">
                                                        <path class=" c3-shape c3-shape c3-arc c3-arc-Due" transform=""
                                                              style="fill: rgb(100, 197, 177); cursor: pointer;"
                                                              d="M-116.24017161331624,-7.313211718558984A116.46999855041503,116.46999855041503,0,0,1,8.20509476167641e-14,-116.46999855041503L0,0Z"></path>
                                                    </g>
                                                    <text dy=".35em" class=""
                                                          transform="translate(-63.783360348164095,-67.9223799832559)"
                                                          style="opacity: 1; text-anchor: middle; pointer-events: none;"></text>
                                                </g>
                                                <g class="c3-chart-arc c3-target c3-target-Hold">
                                                    <g class=" c3-shapes c3-shapes-Hold c3-arcs c3-arcs-Hold">
                                                        <path class=" c3-shape c3-shape c3-arc c3-arc-Hold" transform=""
                                                              style="fill: rgb(230, 137, 0); cursor: pointer;"
                                                              d="M28.964910797593507,112.81087937260807A116.46999855041503,116.46999855041503,0,0,1,-116.24017161331624,-7.313211718558984L0,0Z"></path>
                                                    </g>
                                                    <text dy=".35em" class=""
                                                          transform="translate(-59.39261692962376,71.79334101533738)"
                                                          style="opacity: 1; text-anchor: middle; pointer-events: none;"></text>
                                                </g>
                                            </g>
                                            <g class="c3-chart-texts">
                                                <g class="c3-chart-text c3-target c3-target-Done  "
                                                   style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-texts c3-texts-Done"></g>
                                                </g>
                                                <g class="c3-chart-text c3-target c3-target-Due  "
                                                   style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-texts c3-texts-Due"></g>
                                                </g>
                                                <g class="c3-chart-text c3-target c3-target-Hold  "
                                                   style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-texts c3-texts-Hold"></g>
                                                </g>
                                            </g>
                                        </g>
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226682-clip-grid)"
                                           class="c3-grid c3-grid-lines">
                                            <g class="c3-xgrid-lines"></g>
                                            <g class="c3-ygrid-lines"></g>
                                        </g>
                                        <g class="c3-axis c3-axis-x"
                                           clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226682-clip-xaxis)"
                                           transform="translate(0,255.984375)" style="visibility: visible; opacity: 0;">
                                            <text class="c3-axis-x-label" transform="" style="text-anchor: end;"
                                                  x="245.1999969482422" dx="-0.5em" dy="-0.5em"></text>
                                            <g class="tick" transform="translate(123, 0)" style="opacity: 1;">
                                                <line x1="0" x2="0" y2="6"></line>
                                                <text x="0" y="9" transform=""
                                                      style="text-anchor: middle; display: block;">
                                                    <tspan x="0" dy=".71em" dx="0">0</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M0,6V0H245.1999969482422V6"></path>
                                        </g>
                                        <g class="c3-axis c3-axis-y"
                                           clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226682-clip-yaxis)"
                                           transform="translate(0,0)" style="visibility: visible; opacity: 0;">
                                            <text class="c3-axis-y-label" transform="rotate(-90)"
                                                  style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text>
                                            <g class="tick" transform="translate(0,255)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">22</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,235)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">24</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,216)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">26</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,197)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">28</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,177)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">30</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,158)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">32</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,139)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">34</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,119)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">36</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,100)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">38</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,81)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">40</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,61)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">42</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,42)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">44</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,23)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">46</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,3)" style="opacity: 1;">
                                                <line x2="-6"></line>
                                                <text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">48</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M-6,1H0V255.984375H-6"></path>
                                        </g>
                                        <g class="c3-axis c3-axis-y2" transform="translate(245.1999969482422,0)"
                                           style="visibility: hidden; opacity: 0;">
                                            <text class="c3-axis-y2-label" transform="rotate(-90)"
                                                  style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text>
                                            <g class="tick" transform="translate(0,256)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,231)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.1</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,205)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.2</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,180)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.3</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,154)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.4</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,129)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.5</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,103)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.6</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,78)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.7</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,52)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.8</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,27)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.9</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,1)" style="opacity: 1;">
                                                <line x2="6"></line>
                                                <text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">1</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M6,1H0V255.984375H6"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(0.5,280.5)" style="visibility: hidden;">
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226682-clip-subchart)"
                                           class="c3-chart">
                                            <g class="c3-chart-bars"></g>
                                            <g class="c3-chart-lines"></g>
                                        </g>
                                        <g clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226682-clip)"
                                           class="c3-brush" fill="none" pointer-events="all">
                                            <rect class="overlay" pointer-events="all" cursor="crosshair" x="0" y="0"
                                                  width="245.1999969482422" height="0"></rect>
                                            <rect class="selection" cursor="move" fill="#777" fill-opacity="0.3"
                                                  stroke="#fff" shape-rendering="crispEdges"
                                                  style="display: none;"></rect>
                                            <rect class="handle handle--w" cursor="ew-resize"
                                                  style="display: none;"></rect>
                                            <rect class="handle handle--e" cursor="ew-resize"
                                                  style="display: none;"></rect>
                                        </g>
                                        <g class="c3-axis-x" transform="translate(0,0)"
                                           clip-path="url(https://coderthemes.com/adminox/layouts/vertical/index.html#c3-1596979226682-clip-xaxis)"
                                           style="opacity: 0;">
                                            <g class="tick" transform="translate(123, 0)" style="opacity: 1;">
                                                <line x1="0" x2="0" y2="6"></line>
                                                <text x="0" y="9" transform=""
                                                      style="text-anchor: middle; display: block;">
                                                    <tspan x="0" dy=".71em" dx="0">0</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M0,6V0H245.1999969482422V6"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(0,259.984375)">
                                        <g class="c3-legend-item c3-legend-item-Done"
                                           style="visibility: visible; cursor: pointer;">
                                            <text x="59.904685974121094" y="9" style="pointer-events: none;">Thành công</text>
                                            <rect class="c3-legend-item-event" x="45.904685974121094" y="-5"
                                                  width="58.6875" height="20.015625" style="fill-opacity: 0;"></rect>
                                            <line class="c3-legend-item-tile" x1="43.904685974121094" y1="4"
                                                  x2="53.904685974121094" y2="4" stroke-width="10"
                                                  style="stroke: rgb(241, 241, 241); pointer-events: none;"></line>
                                        </g>
                                        <g class="c3-legend-item c3-legend-item-Due"
                                           style="visibility: visible; cursor: pointer;">
                                            <text x="118.5921859741211" y="9" style="pointer-events: none;">Hàng chờ</text>
                                            <rect class="c3-legend-item-event" x="104.5921859741211" y="-5"
                                                  width="50.90625" height="20.015625" style="fill-opacity: 0;"></rect>
                                            <line class="c3-legend-item-tile" x1="102.5921859741211" y1="4"
                                                  x2="112.5921859741211" y2="4" stroke-width="10"
                                                  style="stroke: rgb(100, 197, 177); pointer-events: none;"></line>
                                        </g>
                                        <g class="c3-legend-item c3-legend-item-Hold"
                                           style="visibility: visible; cursor: pointer;">
                                            <text x="169.4984359741211" y="9" style="pointer-events: none;">Hủy</text>
                                            <rect class="c3-legend-item-event" x="155.4984359741211" y="-5"
                                                  width="43.796875" height="20.015625" style="fill-opacity: 0;"></rect>
                                            <line class="c3-legend-item-tile" x1="153.4984359741211" y1="4"
                                                  x2="163.4984359741211" y2="4" stroke-width="10"
                                                  style="stroke: rgb(230, 137, 0); pointer-events: none;"></line>
                                        </g>
                                    </g>
                                    <text class="c3-title" x="122.5999984741211" y="0"></text>
                                </svg>
                                <div class="c3-tooltip-container"
                                     style="position: absolute; pointer-events: none; display: none;"></div>
                            </div>

                            <div class="row text-center mt-4">
                                <div class="col-6">
                                    <h3 data-plugin="counterup">5,842</h3>
                                    <p class="text-muted mb-0">Giao dịch thành công</p>
                                </div>
                                <div class="col-6">
                                    <h3 data-plugin="counterup">220</h3>
                                    <p class="text-muted mb-1">Giao dịch đang chờ</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!--- end row -->

        </div> <!-- end container-fluid -->

    </div> <!-- end content -->



    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    2017 - 2019 © Adminox theme by <a href="">Coderthemes</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
@endsection