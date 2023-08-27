<x-admin-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Collections</h5>
                           <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>CollectionDate</th>
                                            <th>Branch</th>
                                            <th>Head</th>
                                            <th>Cashier</th>
                                            <th>Shift</th>
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th> <!-- Placeholder for the "ID" column -->
                                            <th class="footer-1"></th> <!-- Total for "collection_date" column -->
                                            <th class="footer-2"></th> <!-- Total for "branch.name" column -->
                                            <th class="footer-3"></th> <!-- Placeholder for "user" column -->
                                            <th class="footer-4"></th> <!-- Placeholder for "cashier" column -->
                                            <th class="footer-5"></th> <!-- Placeholder for "shift" column -->
                                            <th class="footer-6"></th> <!-- Total for "gross" column -->
                                            <th class="footer-7"></th> <!-- Total for "paid_in" column -->
                                            <th class="footer-8"></th> <!-- Total for "purchase_order" column -->
                                            <th class="footer-9"></th> <!-- Total for "paid_out" column -->
                                            <th class="footer-10"></th> <!-- Total for "redeem" column -->
                                            <th class="footer-11"></th> <!-- Total for "discount" column -->
                                            <th class="footer-12"></th> <!-- Total for "lubes" column -->
                                            <th class="footer-13"></th> <!-- Total for "net" column -->
                                            <th class="footer-14"></th> <!-- Total for "cheque" column -->
                                            <th class="footer-15"></th> <!-- Total for "cash_on_hand" column -->
                                            <th class="footer-16"></th> <!-- Total for "short_over" column -->
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.collection.filter')
    @endsection

    @section('footer')

    @endsection

    @push('scripts')
        <script>
            var table = $("#table").DataTable({
                searching: false,
                serverSide: true,
                processing: true,
                lengthMenu: [[10, 25, 50, 100, -1],[ 10, 25, 50, 100, "All"]],
                ajax: {
                    url: "{{ route('admin.collection.data') }}",
                    type: 'GET',
                    data: function(parameter){
                        parameter.filter_date_from = $("#filter_date_from").val();
                        parameter.filter_date_to = $("#filter_date_to").val();
                        parameter.filter_branch_id = $("#filter_branch_id").val();
                        parameter.filter_branch_head = $("#filter_branch_head").val();
                    },

                    error: function (err) {
                        console.log(err);
                    }
                },
                dom: '<"top"B><"top my-3"l><"card card-body border-dark border table-responsive"rt><"bottom"p><"clear">',
                buttons: [
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                        },
                        customize: function (doc){
                            doc.pageOrientation = 'landscape';
                            doc.styles.tableCell = {
                                fontSize: '10pt',
                                overflow: 'hidden',
                                wordBreak: 'break-word',
                                paddingLeft: 5,
                                paddingRight: 5,
                            };
                        }

                    }
                ],
                initComplete: function () {
                    var filter = '<button data-bs-toggle="modal" data-bs-target="#filterModal" title="Filter" class="btn btn-success float-end"><i class="bi bi-filter"></i></button>';
                    $(filter).insertAfter('.dt-buttons');
                },
                footerCallback: function (tfoot, data, start, end, display) {
                    var api = this.api();
                    $(api.columns().footer()).each(function (i) {
                        if (i !== 0) {  // Exclude ID column
                            var columnData = api.column(i, { search: 'applied' }).data();
                            if (i >= 6 && i <= 16) {  // Include columns 6 to 16
                                var total = columnData
                                    .reduce(function (a, b) {
                                        return parseFloat(a) + parseFloat(b);
                                    }, 0);

                                $(this).html(formatNumber(total)); // Adjust the formatting as needed
                            } else {
                                $(this).html(''); // Placeholder for non-numeric columns
                            }
                        }
                    });
                },
                columns: [
                    { data: "id" },
                    { data: "collection_date" },
                    { data: "branch.name" },
                    { data: "user" },
                    { data: "cashier" },
                    { data: "shift" },
                    { data: "gross" },
                    { data: "paid_in" },
                    { data: "purchase_order" },
                    { data: "paid_out" },
                    { data: "redeem" },
                    { data: "discount" },
                    { data: "lubes" },
                    { data: "net" },
                    { data: "cheque" },
                    { data: "cash_on_hand" },
                    { data: "short_over" },

                ]
            });
            function formatNumber(number) {
                return number.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }

            function filterReloadTable() {
                table.ajax.reload();

            }
        </script>
    @endpush
</x-admin-layout>
