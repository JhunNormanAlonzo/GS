
<x-student-layout>
    @section('title')
        View Grade
    @endsection

    @section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Grade Chart</h5>


                    <div id="pieChart" style="min-height: 400px;" class="echart"></div>

                    @php
                        $passing_grade = 74.50;
                        $average = $grade->average ?? 0;
                        $grade_status = $average <= $passing_grade ? "Failed" : "Passed";
                        $color_status = $average <= $passing_grade ? "Red" : "Green";
                    @endphp
                    <script>
                        var average = '{{$average}}';
                        var color = 'green';
                        var subject = '{{$subject->name}}';
                        var grade_status = '{{$grade_status}}';
                        var color_status = '{{$color_status}}';
                      document.addEventListener("DOMContentLoaded", () => {
                        echarts.init(document.querySelector("#pieChart")).setOption({
                          title: {
                            text: average+"%",
                            subtext: grade_status,
                            left: 'center',
                            textStyle: {
                                color: color_status, // Replace 'your_color_here' with your desired color, e.g., '#FF5733' or 'red'
                            },
                          },
                          tooltip: {
                            trigger: 'item'
                          },
                          legend: {
                            orient: 'vertical',
                            left: 'left'
                          },
                          series: [{
                            name:subject,
                            type: 'pie',
                            radius: '50%',
                            data: [{
                                value:  {{$grade->first_grading ?? 0}},
                                name: 'First Grading'
                              },
                              {
                                value: {{$grade->second_grading ?? 0}},
                                name: 'Second Grading'
                              },
                              {
                                value: {{$grade->third_grading ?? 0}},
                                name: 'Third Grading'
                              },
                              {
                                value:  {{$grade->fourth_grading ?? 0}},
                                name: 'Fourth Grading'
                              },

                            ],
                            emphasis: {
                              itemStyle: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                              }
                            }
                          }]
                        });
                      });
                    </script>
                    <!-- End Pie Chart -->

                  </div>
                </div>
              </div>

        </div>
      </div>
    @endsection

    @section('footer')

    @endsection
</x-student-layout>
