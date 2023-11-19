<x-admin-layout>
    @section('content')

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List of Grades</h5>



                            <livewire:test-livewire></livewire:test-livewire>

                            <br><br>
                            <table class="table" id="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Lrn</th>
                                    <th>Year Level</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Average</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($groupedGrades as $grade)
                                    @php
                                        $average = number_format($grade->average_grade, 2)
                                    @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$grade->student->lrn_no}}</td>
                                        <td>{{$grade->student->yearLevel->name}}</td>
                                        <td>{{$grade->student->user->name}}</td>
                                        <td>{{$grade->student->user->age}}</td>
                                        <td>{{$grade->student->user->gender}}</td>
                                        <td>{{ $average }}</td>
                                        <td>
                                            @if ($average >= 90 && $average <= 94)
                                                With Honor
                                            @elseif ($average >= 95 && $average <= 97)
                                                With High Honor
                                            @elseif ($average >= 98 && $average <= 100)
                                                With Highest Honor
                                            @else
                                                No Honor
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

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

</x-admin-layout>
