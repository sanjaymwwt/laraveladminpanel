@extends('backend.layouts.app')
@section('title', 'Laravel Charts')
@section('content')

<!-- Morris chart css load -->
<link rel="stylesheet" href="{{ asset('resources/assets/bower_components/morris.js/morris.css') }}">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        ChartJS
        <small>Preview sample</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Charts</a></li>
        <li class="active">Laravel Charts</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- /.box -->
            <!-- DONUT CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Bar Chart</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:230px"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Line Chart</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="lineChart" style="height:250px"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
<section class="content-header">
    <h1>
        Morris Charts
        <small>Preview sample</small>
    </h1>

</section>
<section class="content">

    <div class="row">
        <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Area Chart</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="revenue-chart" style="height: 300px;"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Line Chart</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="line-chart" style="height: 300px;"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

</section>
<!-- Main content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Flot Charts
        <small>preview sample</small>
    </h1>      
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- Line chart -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title">Line Chart</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="line-chart-float" style="height: 300px;"></div>
                </div>
                <!-- /.box-body-->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">

            <!-- Donut chart -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title">Donut Chart</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="donut-chart" style="height: 300px;"></div>
                </div>
                <!-- /.box-body-->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<section class="content-header">
    <h1>
        Inline Charts
        <small>multiple types of charts</small>
    </h1>

</section>
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid">
                <div class="box-header">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title">jQuery Knob Different Sizes</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-3 text-center">
                            <input type="text" class="knob" value="30" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true">

                            <div class="knob-label">data-width="90"</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-xs-6 col-md-3 text-center">
                            <input type="text" class="knob" value="30" data-width="120" data-height="120" data-fgColor="#f56954">

                            <div class="knob-label">data-width="120"</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-xs-6 col-md-3 text-center">
                            <input type="text" class="knob" value="30" data-thickness="0.1" data-width="90" data-height="90" data-fgColor="#00a65a">

                            <div class="knob-label">data-thickness="0.1"</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-xs-6 col-md-3 text-center">
                            <input type="text" class="knob" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="30" data-width="120" data-height="120" data-fgColor="#00c0ef">

                            <div class="knob-label">data-angleArc="250"</div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<script src="{{ asset('resources/assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('resources/assets/bower_components/chart.js/chartjs/Chart.min.js')}}"></script>
<!-- FastClick -->

<!-- page script -->
<script>
    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
//    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
//    // This will get the first returned node in the jQuery collection.
//    var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: <?php echo $data['chartData']; ?>
        };

        var areaChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(areaChartData, lineChartOptions);

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
    });
</script>
<script src="{{ asset('resources/assets/bower_components/raphael/raphael.min.js') }}" ></script>
<script src="{{ asset('resources/assets/bower_components/morris.js/morris.min.js') }}" ></script>
<!-- FastClick -->
<script src="{{ asset('resources/assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
        "use strict";

        // AREA CHART
        var area = new Morris.Area({
            element: 'revenue-chart',
            resize: true,
            data: <?php echo $data['morrisChartData']; ?>,
            xkey: 'y',
            ykeys: ['item1', 'item2'],
            labels: ['Item 1', 'Item 2'],
            lineColors: ['#a0d0e0', '#3c8dbc'],
            hideHover: 'auto'
        });

        // LINE CHART
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: <?php echo $data['morrisChartData']; ?>,
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Item 1'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
        });


    });
</script>
<!-- FLOT CHARTS -->
<script src="{{ asset('resources/assets/bower_components/Flot/jquery.flot.js') }}" ></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('resources/assets/bower_components/Flot/jquery.flot.resize.js') }}" ></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('resources/assets/bower_components/Flot/jquery.flot.pie.js') }}" ></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{ asset('resources/assets/bower_components/Flot/jquery.flot.categories.js') }}" ></script>
<!-- Page script -->
<script>
    $(function () {
        /*
         * LINE CHART
         * ----------
         */
        //LINE randomly generated data

        var line_data1 = {
            data: <?php echo $data['sin']; ?>,
            color: "#3c8dbc"
        };
        var line_data2 = {
            data: <?php echo $data['cos']; ?>,
            color: "#00c0ef"
        };
        $.plot("#line-chart-float", [line_data1, line_data2], {
            grid: {
                hoverable: true,
                borderColor: "#f3f3f3",
                borderWidth: 1,
                tickColor: "#f3f3f3"
            },
            series: {
                shadowSize: 0,
                label: 'text',
                lines: {
                    show: true
                },
                points: {
                    show: true
                }
            },
            lines: {
                fill: false,
                color: ["#3c8dbc", "#f56954"]
            },
            yaxis: {
                show: true,
            },
            xaxis: {
                show: true
            }
        });
        //Initialize tooltip on hover
        $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
            position: "absolute",
            display: "none",
            opacity: 0.8
        }).appendTo("body");
        $("#line-chart-float").bind("plothover", function (event, pos, item) {

            if (item) {
                var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                $("#line-chart-tooltip").html(item.series.label + " of " + x + " = " + y)
                        .css({top: item.pageY + 5, left: item.pageX + 5})
                        .fadeIn(200);
            } else {
                $("#line-chart-tooltip").hide();
            }

        });
        /* END LINE CHART */

        /*
         * DONUT CHART
         * -----------
         */

        var donutData = <?php echo $data['floatDonutData']; ?>;
        $.plot("#donut-chart", donutData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.5,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }

                }
            },
            legend: {
                show: false
            }
        });
        /*
         * END DONUT CHART
         */

    });

    /*
     * Custom Label formatter
     * ----------------------
     */
    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + "<br>"
                + Math.round(series.percent) + "%</div>";
    }
</script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('resources/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- jQuery Knob -->
<script src="{{ asset('resources/assets/bower_components/jquery-knob/js/jquery.knob.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('resources/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<script>
  $(function () {
    /* jQueryKnob */

    $(".knob").knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;

          this.g.lineWidth = this.lineWidth;

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
    /* END JQUERY KNOB */

    //INITIALIZE SPARKLINE CHARTS
    $(".sparkline").each(function () {
      var $this = $(this);
      $this.sparkline('html', $this.data());
    });

    /* SPARKLINE DOCUMENTATION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
    drawDocSparklines();
    drawMouseSpeedDemo();

  });
  function drawDocSparklines() {

    // Bar + line composite charts
    $('#compositebar').sparkline('html', {type: 'bar', barColor: '#aaf'});
    $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
        {composite: true, fillColor: false, lineColor: 'red'});


   

    // Larger line charts for the docs
    $('.largeline').sparkline('html',
        {type: 'line', height: '2.5em', width: '4em'});

    // Customized line chart
    $('#linecustom').sparkline('html',
        {
          height: '1.5em', width: '8em', lineColor: '#f00', fillColor: '#ffa',
          minSpotColor: false, maxSpotColor: false, spotColor: '#77f', spotRadius: 3
        });

    // Bar charts using inline values
    $('.sparkbar').sparkline('html', {type: 'bar'});


    // Tri-state charts using inline values
    $('.sparktristate').sparkline('html', {type: 'tristate'});
    $('.sparktristatecols').sparkline('html',
        {type: 'tristate', colorMap: {'-2': '#fa7', '2': '#44f'}});

    // Composite line charts, the second using values supplied via javascript
    $('#compositeline').sparkline('html', {fillColor: false, changeRangeMin: 0, chartRangeMax: 10});
    $('#compositeline').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
        {composite: true, fillColor: false, lineColor: 'red', changeRangeMin: 0, chartRangeMax: 10});

    // Line charts with normal range marker
    $('#normalline').sparkline('html',
        {fillColor: false, normalRangeMin: -1, normalRangeMax: 8});
    $('#normalExample').sparkline('html',
        {fillColor: false, normalRangeMin: 80, normalRangeMax: 95, normalRangeColor: '#4f4'});

    // Discrete charts
    $('.discrete1').sparkline('html',
        {type: 'discrete', lineColor: 'blue', xwidth: 18});
    $('#discrete2').sparkline('html',
        {type: 'discrete', lineColor: 'blue', thresholdColor: 'red', thresholdValue: 4});

    // Bullet charts
    $('.sparkbullet').sparkline('html', {type: 'bullet'});

    // Pie charts
    $('.sparkpie').sparkline('html', {type: 'pie', height: '1.0em'});

    // Box plots
    $('.sparkboxplot').sparkline('html', {type: 'box'});
    $('.sparkboxplotraw').sparkline([1, 3, 5, 8, 10, 15, 18],
        {type: 'box', raw: true, showOutliers: true, target: 6});

    // Box plot with specific field order
    $('.boxfieldorder').sparkline('html', {
      type: 'box',
      tooltipFormatFieldlist: ['med', 'lq', 'uq'],
      tooltipFormatFieldlistKey: 'field'
    });

    // click event demo sparkline
    $('.clickdemo').sparkline();
    $('.clickdemo').bind('sparklineClick', function (ev) {
      var sparkline = ev.sparklines[0],
          region = sparkline.getCurrentRegionFields();
      value = region.y;
      alert("Clicked on x=" + region.x + " y=" + region.y);
    });

    // mouseover event demo sparkline
    $('.mouseoverdemo').sparkline();
    $('.mouseoverdemo').bind('sparklineRegionChange', function (ev) {
      var sparkline = ev.sparklines[0],
          region = sparkline.getCurrentRegionFields();
      value = region.y;
      $('.mouseoverregion').text("x=" + region.x + " y=" + region.y);
    }).bind('mouseleave', function () {
      $('.mouseoverregion').text('');
    });
  }

  /**
   ** Draw the little mouse speed animated graph
   ** This just attaches a handler to the mousemove event to see
   ** (roughly) how far the mouse has moved
   ** and then updates the display a couple of times a second via
   ** setTimeout()
   **/
  function drawMouseSpeedDemo() {
    var mrefreshinterval = 500; // update display every 500ms
    var lastmousex = -1;
    var lastmousey = -1;
    var lastmousetime;
    var mousetravel = 0;
    var mpoints = [];
    var mpoints_max = 30;
    $('html').mousemove(function (e) {
      var mousex = e.pageX;
      var mousey = e.pageY;
      if (lastmousex > -1) {
        mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
      }
      lastmousex = mousex;
      lastmousey = mousey;
    });
    var mdraw = function () {
      var md = new Date();
      var timenow = md.getTime();
      if (lastmousetime && lastmousetime != timenow) {
        var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
        mpoints.push(pps);
        if (mpoints.length > mpoints_max)
          mpoints.splice(0, 1);
        mousetravel = 0;
        $('#mousespeed').sparkline(mpoints, {width: mpoints.length * 2, tooltipSuffix: ' pixels per second'});
      }
      lastmousetime = timenow;
      setTimeout(mdraw, mrefreshinterval);
    };
    // We could use setInterval instead, but I prefer to do it this way
    setTimeout(mdraw, mrefreshinterval);
  }
</script>  
<script>
    $("#charts").addClass('active');
    $("#ci_chart").addClass('active');
</script>
@endsection
