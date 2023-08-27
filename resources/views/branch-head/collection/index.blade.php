<x-branch-head-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Collections</h5>
                            <a href="{{ route('branch-head.collection.create') }}" class="btn btn-primary me-3">Create</a>
                           <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>CollectionDate</th>
                                            <th>Shift</th>
                                            <th>Cashier</th>
                                            <th>Gross</th>
                                            <th>PaidIn</th>
                                            <th>P.O</th>
                                            <th>PaidOut</th>
                                            <th>Redeem</th>
                                            <th>Discount</th>
                                            <th>Lubes</th>
                                            <th>Net</th>
                                            <th>Checque</th>
                                            <th>CashOnHand</th>
                                            <th>Short/Over</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collections as $collection)
                                            <tr>
                                                <td>
                                                    @if ($collection->pendingRequests->count() > 0)
                                                        <div class="" data-bs-toggle="tooltip" data-bs-title="Have Pending Request" data-bs-placement="left">
                                                            <button disabled data-bs-toggle="modal" data-bs-target="#requestModal{{$collection->id}}" class="btn btn-sm btn-outline-info"><i class="bi bi-pencil"></i></button>
                                                        </div>
                                                    @else
                                                        <div class="" data-bs-toggle="tooltip" data-bs-title="Request Modify" data-bs-placement="left">
                                                            <button data-bs-toggle="modal" data-bs-target="#requestModal{{$collection->id}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-send-fill"></i></button>
                                                        </div>
                                                    @endif

                                                    <div class="modal fade" id="requestModal{{$collection->id}}">
                                                        <div class="modal-dialog">
                                                            <form action="{{route('branch-head.modify-request.store')}}" method="POST">
                                                                @csrf
                                                                @method("POST")
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        Request
                                                                        <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-12 mb-3">
                                                                                <x-input id="remarks" name="remarks" type="text" placeholder="Remarks" value="{{ old('firstname') }}">
                                                                                    <x-validation-error name="remarks"></x-validation-error>
                                                                                </x-input>
                                                                                <input type="hidden" value="{{$collection->id}}" name="collection_id">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-primary" type="submit">Send Request</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $collection->collection_date }}</td>
                                                <td>{{ $collection->shift }}</td>
                                                <td>{{ $collection->cashier }}</td>
                                                <td>{{ $collection->gross }}</td>
                                                <td>{{ $collection->paid_in }}</td>
                                                <td>{{ $collection->purchase_order }}</td>
                                                <td>{{ $collection->paid_out }}</td>
                                                <td>{{ $collection->redeem }}</td>
                                                <td>{{ $collection->discount }}</td>
                                                <td>{{ $collection->lubes }}</td>
                                                <td>{{ $collection->net }}</td>
                                                <td>{{ $collection->cheque }}</td>
                                                <td>{{ $collection->cash_on_hand }}</td>
                                                <td>{{ $collection->short_over }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
            var table = $("#table").DataTable({
                searching: true,
                processing: true,
                lengthMenu: [[10, 25, 50, 100, -1],[ 10, 25, 50, 100, "All"]],
                dom: '<"top border p-3 rounded  table-responsive  mt-3 d-flex justify-content-between mb-3"fl><"card card-body border table-responsive"rt><"bottom"p><"clear">',

            });
        </script>
    @endpush
</x-branch-head-layout>
