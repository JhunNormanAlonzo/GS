
<x-student-layout>
    @section('title')
        View Grade
    @endsection

    @section('content')
    <div class="col-lg-12">
        <div class="row ">
            <div class="col-lg-12 ">
                <div class="card">
                  <div class="card-body py-3">
                    @php
                        $passing_grade = 74.50;
                        $average = $grade->average ?? 0;
                        $grade_status = $average <= $passing_grade ? "Failed" : "Passed";
                        $color_status = $average <= $passing_grade ? "Red" : "Green";
                    @endphp
                    {{-- <button type="button" id="print" class="btn btn-primary btn-sm mb-3">Print</button> --}}
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>First Grading</th>
                                    <th>Second Grading</th>
                                    <th>Third Grading</th>
                                    <th>Fourth Grading</th>
                                    <th>Average</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$grade->first_grading}}</td>
                                    <td>{{$grade->second_grading}}</td>
                                    <td>{{$grade->third_grading}}</td>
                                    <td>{{$grade->fourth_grading}}</td>
                                    <td>{{$average."%"}}</td>
                                    <td>{{$grade_status}}</td>
                                    <td>
                                        <button data-bs-toggle="modal" data-bs-target="#commentGradeModal{{$grade->id}}" class="btn btn-sm btn-outline-warning">comment</button>
                                        <div class="modal fade" id="commentGradeModal{{$grade->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Comment
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <textarea class="form-control" placeholder="What's in your mind, {{auth()->user()->name}}" name="comment" id="" rows="3">Name : {{auth()->user()->name }} Section : {{auth()->user()->student->section->name}} {{auth()->user()->student->yearLevel->name}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- <h5 class="card-title">Grade Chart {{$subject->id}}</h5> --}}


                    {{-- <div id="pieChart" style="min-height: 400px;" class="echart"></div> --}}


                    {{-- <script>
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
                    </script> --}}


                    <!-- End Pie Chart -->

                  </div>
                </div>
              </div>

        </div>
      </div>
    @endsection

    @section('footer')

    @endsection
    @push('scripts')
      <script>
    //    $('#print').on('click', function() {
    //         let subject_id = "{{$subject->id}}";

    //         var url = "{{ route('student.print-grade') }}" +
    //         "?subject_id=" + subject_id;
    //         window.location.href = url;
    //     });


      </script>


    @endpush

    @push('scripts')
        <script>
            $("#table").DataTable({
                dom: "Bfrtp",
                buttons : [
                    "excel",
                    "pdf",
                    "print",
                ]
            });
        </script>
    @endpush
</x-student-layout>
