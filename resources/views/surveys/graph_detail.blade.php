@extends('layouts.master')

@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    @include('surveys.partials.header')
    <script>
        $('.surveysHeader a:nth-child(2)').addClass("on");
        google.charts.load("current", {packages:["corechart"]});
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div class="graphDetail">
        <div class="titleRow">
            {{ $surveyName }}
        </div>
        <div class="options">
            @for($i = 0; $i < count($optionArray); $i++)
                <?php
                $index = $optionArray[$i]['id'];
                $question = $questionArray[$index];
                $count = 1;
                ?>
                <script type="text/javascript">
                  google.charts.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Answer', 'People'],
                      @for($j = 0; $j < count($optionArray[$i]['array']); $j++)
                          [
                              "{{ $optionArray[$i]['array'][$j] }}",
                          @if(array_key_exists($j, $countArray[$i]))
                              {{ $countArray[$i][$j] }}
                          @else
                              {{ 0 }}
                          @endif
                      ],
                      @endfor
                    ]);

                    var options = {
                      title: "Q{{$i+1}}. {{ $question }}",
                      pieHole: 0.5,
                      titleTextStyle: {
                        fontSize: '20',
                      },
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart{{$i}}'));
                    chart.draw(data, options);
                  }
                </script>
                <div class="row">
                    <div id="donutchart{{$i}}" style="width: 690px; height: 400px;"></div>
                </div>
            @endfor
        </div>
        <div class="textRow">
            @for($i = 0; $i < count($stringArray[0]); $i++)
            <?php
                $index = $stringArray[0][$i]['id'];
                $question = $questionArray[$index];
            ?>
            <div class="texts">
                <div class="question">
                    Q. <?=$question?>
                </div>
                @for($j = 0; $j < count($stringArray); $j++)
                <div class="answer">
                    <?php
                        if($stringArray[$j][$i]['val'] == "")
                        {
                            $dd = "비고";
                        }else{
                            $dd = $stringArray[$j][$i]['val'];
                        }
                    ?>
                    {{$j+1}}) {{ $dd }}
                </div>
                @endfor
            </div>
            @endfor
        </div>
    </div>
@endsection
