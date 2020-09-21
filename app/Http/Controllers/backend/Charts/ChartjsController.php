<?php

namespace App\Http\Controllers\backend\Charts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartjsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.charts.chartjs');
    }
    public function laravelcharts()
    {
        /* chart data start here */
        /** bar chart and line chart start here */
        $chartData[0] = array(
            'label' => 'Electronics',
            'fillColor' => 'rgb(210, 214, 222)',
            'strokeColor' => "rgb(210, 214, 222)",
            'pointColor' => "rgb(210, 214, 222)",
            'pointStrokeColor' => "#c1c7d1",
            'pointHighlightFill' => "#fff",
            'pointHighlightStroke' => "rgb(220,220,220)",
        );
        $chartData[0]['data'] = array(65, 59, 80, 81, 56, 55, 40);
        $chartData[1] = array(
            'label' => 'Digital Goods',
            'fillColor' => 'rgba(60,141,188,0.9)',
            'strokeColor' => "rgba(60,141,188,0.8)",
            'pointColor' => "#3b8bba",
            'pointStrokeColor' => "rgba(60,141,188,1)",
            'pointHighlightFill' => "#fff",
            'pointHighlightStroke' => "rgba(60,141,188,1)",
        );
        $chartData[1]['data'] = array(28, 48, 40, 19, 86, 27, 90);
        $chartJsonData = json_encode($chartData);
        $data['chartData'] = $chartJsonData;
        /** bar chart and line chart end here */
        /** morris area chart start here */
        $morisArr = array(
            array('y' => '2011 Q1', 'item1' => '2666', 'item2' => '3111'),
            array('y' => '2011 Q2', 'item1' => '2778', 'item2' => '2294'),
            array('y' => '2011 Q3', 'item1' => '4912', 'item2' => '1969'),
            array('y' => '2011 Q4', 'item1' => '3767', 'item2' => '3597'),
            array('y' => '2012 Q1', 'item1' => '6810', 'item2' => '1914'),
            array('y' => '2012 Q2', 'item1' => '5670', 'item2' => '4293'),
            array('y' => '2012 Q3', 'item1' => '4820', 'item2' => '3795'),
            array('y' => '2012 Q4', 'item1' => '15073', 'item2' => '5967'),
            array('y' => '2013 Q1', 'item1' => '10687', 'item2' => '4460'),
            array('y' => '2013 Q2', 'item1' => '8432', 'item2' => '5713'),
        );
        $data['morrisChartData'] = json_encode($morisArr);
        /** morris chart end here */
        /** float chart start here */
        $floatArr = array(
            array('label' => 'Series2', 'data' => '30', 'color' => '#3c8dbc'),
            array('label' => 'Series3', 'data' => '20', 'color' => '#0073b7'),
            array('label' => 'Series4', 'data' => '50', 'color' => '#00c0ef'),
        );
        $data['floatDonutData'] = json_encode($floatArr);
        /** float chart end here */
        /* float line chart start here */
        $sin = $cos = array();
        for ($i = 0; $i < 14; $i += 0.5) {
            array_push($sin, array($i, sin($i)));
            array_push($cos, array($i, cos($i)));
        }
        $data['sin'] = json_encode($sin);
        $data['cos'] = json_encode($cos);
        return view('backend.charts.laravelcharts', compact('data'));
    }
    
}
