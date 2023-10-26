@extends('layouts.app')

@section('content')
<?php $currency =  setting_by_key("currency");
$saturday =__('site.Saturday');

$Days = array(__('site.Sunday'),__('site.Monday'),__('site.Tuesday'),__('site.Wednesday'),
                  __('site.Thursday'),__('site.Friday'),$saturday);
$Months =array(1=>'site.January','site.February','site.March','site.April','site.May','site.June','site.July',
             'site.August','site.September','site.October','site.November','site.December');

// $Days = array("Domingo","Lunes","Martes","Miércoles",
//                   "Jueves","Viernes","Sábado");
// $Months =array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
//              "Agosto","Septiembre","Octubre","Noviembre","Diciembre");




?>
 <div class="wrapper wrapper-content">
 </div>
 



	<script src="//code.highcharts.com/highcharts.js"></script>
	<script src="//code.highcharts.com/modules/exporting.js"></script>




<?php if(count($get_orders_365) > 0) { ?>

<script type="text/javascript">
    $('.graph_by').on('click', function () {
        var id = $(this).attr("data-id");
        if (id == 7) {
            $('#flotchart1').show();
            $('#flotchart2').hide();
            $('#flotchart3').hide();

        }
        if (id == 30) {
            $('#flotchart1').hide();
            $('#flotchart2').show();
            $('#flotchart3').hide();

        }
        if (id == 365) {
            $('#flotchart1').hide();
            $('#flotchart2').hide();
            $('#flotchart3').show();

        }
    });
            $('.graph_by').eq(0).addClass('selected');
        $(document).on('click','.graph_by',function(){
            $(this).addClass('selected').siblings().removeClass('selected');
        });
    $(function () {
        $('#flotchart3').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: "@lang('site.last_12_month')"
            },
            subtitle: {
                text: "@lang('site.online_and_pos')"
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: [
<?php
$year_name = array(date('F', strtotime(' 0 month')), date('F', strtotime(' -1 month')), date('F', strtotime(' -2 month')), date('F', strtotime(' -3 month')), date('F', strtotime(' -4 month')), date('F', strtotime(' -5 month')), date('F', strtotime(' -6 month')), date('F', strtotime(' -7 month')), date('F', strtotime(' -8 month')), date('F', strtotime(' -9 month')), date('F', strtotime(' -10 month')), date('F', strtotime(' -11 month')));
echo '"' . date('F') . '", ';
echo '"' . date('F', strtotime(' -1 month')) . '", ';
echo '"' . date('F', strtotime(' -2 month')) . '", ';
echo '"' . date('F', strtotime(' -3 month')) . '", ';
echo '"' . date('F', strtotime(' -4 month')) . '", ';
echo '"' . date('F', strtotime(' -5 month')) . '", ';
echo '"' . date('F', strtotime(' -6 month')) . '", ';
echo '"' . date('F', strtotime(' -7 month')) . '", ';
echo '"' . date('F', strtotime(' -8 month')) . '", ';
echo '"' . date('F', strtotime(' -9 month')) . '", ';
echo '"' . date('F', strtotime(' -10 month')) . '", ';
echo '"' . date('F', strtotime(' -11 month')) . '", ';
?>
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: "@lang('site.sales')"
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [
			{
                    color: '#dc0434',
                    name: "@lang('site.Online_Orders')",
                    data: [
                        <?php
                        $array_year1 = [];
                        foreach ($get_orders_365_online as $keym => $valuem) {
                            $array_year1[$valuem->mon] = $valuem->amount;
                        }
                        foreach ($year_name as $key => $value) {
                            if (array_key_exists($value, $array_year1)) {
                                echo round($array_year1[$value], 2) . ', ';
                            } else {
                                echo '0.00, ';
                            }
                        }
                        ?>
                    ]
                },
				{
                    color: '#f8961d',
                    name: "@lang('site.pos')",
                    data: [
                    <?php
                    foreach ($get_orders_365 as $keym => $valuem) {
                        $array_year2[$valuem->mon] = $valuem->amount;
                    }

                    foreach ($year_name as $key => $value) {
                        if (array_key_exists($value, $array_year2)) {
                            echo round($array_year2[$value], 2) . ', ';
                        } else {
                            echo '0.00, ';
                        }
                    }
                    ?>
                                        ]
                }]
        });

        $('#flotchart2').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: "@lang('site.last_30_days')"
            },
            subtitle: {
                text: "@lang('site.online_and_pos')"
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: [
<?php
for ($i = 0; $i <= 30; $i++) {
    echo "'" . date('d', strtotime('- ' . $i . ' day')) . "', ";
}
?>
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text:  "@lang('site.sales')"
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [
			{
                    color: '#dc0434',
                    name: "@lang('site.Online_Orders')",
                    data: [
<?php
$array_mon1 = [];
foreach ($transections_30_days_online as $key => $value) {
    $array_mon1[$value->dat] = $value->amount;
}

for ($i = 0; $i < 30; $i++) {
    $date = date('d', strtotime('- ' . $i . ' day'));
    if (array_key_exists($date, $array_mon1)) {
        echo round($array_mon1[$date], 2) . ', ';
    } else {
        echo '0.00, ';
    }
}
?>
                    ]
                },
				{
                    color: '#f8961d',
                    name: "@lang('site.pos')",
                    data: [
<?php
$array_mon2  = array();
foreach ($transections_30_days as $key => $value) {
    $array_mon2[$value->dat] = $value->amount;
}
for ($i = 0; $i < 30; $i++) {
    $date2 = date('d', strtotime('- ' . $i . ' day'));
    if (array_key_exists($date2, $array_mon2)) {
        echo round($array_mon2[$date2], 2) . ', ';
    } else {
        echo '0.00, ';
    }
}
?>
                    ]
                }]
        });

        $('#flotchart1').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: "@lang('site.last_7_days')"
            },
            subtitle: {
                text: "@lang('site.online_and_pos')"
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: [
<?php
$day_name = array(date('l', strtotime(' 0 day')), date('l', strtotime(' -1 day')), date('l', strtotime(' -2 day')), date('l', strtotime(' -3 day')), date('l', strtotime(' -4 day')), date('l', strtotime(' -5 day')), date('l', strtotime(' -6 day')));
echo '"' . $Days[date('w', strtotime(' 0 day'))] . '", ';
echo '"' . $Days[date('w', strtotime(' -1 day'))] . '", ';
echo '"' . $Days[date('w', strtotime(' -2 day'))] . '", ';
echo '"' . $Days[date('w', strtotime(' -3 day'))] . '", ';
echo '"' . $Days[date('w', strtotime(' -4 day'))] . '", ';
echo '"' . $Days[date('w', strtotime(' -5 day'))] . '", ';
echo '"' . $Days[date('w', strtotime(' -6 day'))] . '", ';
?>
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text:  "@lang('site.sales')"
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [
			{
                    color: '#dc0434',
                    name: "@lang('site.Online_Orders')",
                    data: [
                            <?php
                            $array_day1 = array();
                            foreach ($transections_7_days_online as $keym => $valuem)
                            {
                                $array_day1[$valuem->day] = $valuem->amount;
                            }

                            foreach ($day_name as $key => $value)
                            {
                                if (array_key_exists($value, $array_day1))
                                {
                                    echo round($array_day1[$value], 2) . ', ';
                                }
                                else
                                {
                                    echo '0.00, ';
                                }
                            }
                            ?>
                    ]},
                    {
                    color: '#f8961d',
                    name: "@lang('site.pos')",
                    data: [
                            <?php
                            $array_day2 = array();
                            foreach ($transections_7_days as $key => $value)
                            {
                                $array_day2[$value->day] = $value->amount;
                            }

                            foreach ($day_name as $key => $value)
                            {
                                if (array_key_exists($value, $array_day2))
                                {
                                    echo round($array_day2[$value], 2) . ', ';
                                }
                                else
                                {
                                    echo '0.00, ';
                                }
                            }
                            ?>
                    ]
                }]
            });
    });
</script>

<?php } ?>
<script>

  $('.pie_by').on('click', function () {
        var id = $(this).attr("data-id");
        if (id == 7) {
            $('#flotchartSale1').show();
            $('#flotchartSale2').hide();
            $('#flotchartSale3').hide();
             $('#Sale1').show();
            $('#Sale2').hide();
            $('#Sale3').hide();
        }
        if (id == 30) {
            $('#flotchartSale1').hide();
            $('#flotchartSale2').show();
            $('#flotchartSale3').hide();
              $('#Sale1').hide();
            $('#Sale2').show();
            $('#Sale3').hide();
        }
        if (id == 365) {
            $('#flotchartSale1').hide();
            $('#flotchartSale2').hide();
            $('#flotchartSale3').show();
             $('#Sale1').hide();
            $('#Sale2').hide();
            $('#Sale3').show();
        }
    });
       $('.pie_by').eq(0).addClass('selected');
        $(document).on('click','.pie_by',function(){
            $(this).addClass('selected').siblings().removeClass('selected');
        });
     $('#flotchartSale1').highcharts({
            chart: {
     plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
            },
            title: {
                text: " @lang('site.top_10_items')"
            },

             tooltip: {
    pointFormat: ': <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.y} ',
        useHTML: true,
      }
    }
  },
  series: [{

    data: [
          <?php

     foreach ($sales_by_product7 as $key => $item)
   {echo " {  name: ' $item->product_name ',
      y: $item->total_sales,
     }," ; }     ?>

    ]
  }]
        });
             $('#flotchartSale2').highcharts({
            chart: {
     plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
            },
            title: {
                text: " @lang('site.top_10_items')"
            },

             tooltip: {
    pointFormat: ': <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.y} ',
        useHTML: true,
      }
    }
  },
  series: [{

    data: [
          <?php

     foreach ($sales_by_product30 as $key => $item)
   {echo " {  name: ' $item->product_name ',
      y: $item->total_sales,
     }," ; }     ?>

    ]
  }]
        });

     $('#flotchartSale3').highcharts({
            chart: {
     plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
            },
            title: {
                text: " @lang('site.top_10_items')"
            },

             tooltip: {
    pointFormat: ': <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.y} ',
        useHTML: true,
      }
    }
  },
  series: [{

    data: [
          <?php

     foreach ($sales_by_product365 as $key => $item)
   {echo " {  name: ' $item->product_name ',
      y: $item->total_sales,
     }," ; }     ?>

    ]
  }]
        });

</script>

@endsection
