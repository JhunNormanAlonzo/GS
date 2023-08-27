<x-admin-layout>
    @section('title')
        Update Collection <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('branch-head.collection.update_request',  [$modify_request->collection_id , $modify_request->id])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="card">
                            <div class="card-header">Enter Collection details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-4 mb-3">
                                        <x-input id="collection_date" name="collection_date" type="date" placeholder="Collection Date" value="{{ $originalData->collection_date }}">
                                            <x-validation-error name="collection_date"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <div class="form-floating">
                                            <select name="shift" class="form-select" id="">
                                                <option @if($originalData->shift == "AM") selected @endif value="AM">AM</option>
                                                <option @if($originalData->shift == "PM") selected @endif value="PM">PM</option>
                                                <option @if($originalData->shift == "NIGHT") selected @endif value="NIGHT">NIGHT</option>
                                            </select>
                                            <label for="">Choose Shift</label>
                                            <x-validation-error name="shift"></x-validation-error>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <div class="form-floating">
                                            <select name="cashier" class="form-select" id="">
                                                @foreach ($cashiers as $cashier)
                                                    <option @if($originalData->cashier_id == $cashier->id) selected @endif  value="{{$cashier->id}}">{{ucwords($cashier->lastname." ".$cashier->firstname." ".$cashier->middlename)}}</option>
                                                @endforeach
                                            </select>
                                            <label for="">Choose Cashier</label>
                                            <x-validation-error name="cashier"></x-validation-error>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <x-input id="gross" name="gross" type="number" step="0.01" placeholder="Gross" value="{{ $originalData->gross }}">
                                            <x-validation-error name="gross"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <x-input id="paid_in" name="paid_in" type="number" step="0.01" placeholder="Paid In" value="{{ $originalData->paid_in }}">
                                            <x-validation-error name="paid_in"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <x-input id="purchase_order" name="purchase_order" type="number" placeholder="Purchase Order" value="{{ $originalData->purchase_order }}">
                                            <x-validation-error name="purchase_order"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <x-input id="paid_out" name="paid_out" type="number" step="0.01" placeholder="Paid Out" value="{{ $originalData->paid_out }}">
                                            <x-validation-error name="paid_out"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <x-input id="redeem" name="redeem" type="number" step="0.01" placeholder="Redeem" value="{{ $originalData->redeem }}">
                                            <x-validation-error name="redeem"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <x-input id="discount" name="discount" type="number" step="0.01" placeholder="Discount" value="{{ $originalData->discount }}">
                                            <x-validation-error name="discount"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <x-input id="lubes" name="lubes" type="number" step="0.01" placeholder="Lubes" value="{{ $originalData->lubes }}">
                                            <x-validation-error name="lubes"></x-validation-error>
                                        </x-input>
                                    </div>

                                    <div class="col-4 mb-3">
                                        <x-input id="cheque" name="cheque" type="number" step="0.01" placeholder="Cheque" value="{{ $originalData->cheque }}">
                                            <x-validation-error name="cheque"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <x-input id="cash_on_hand" name="cash_on_hand" type="number" step="0.01" placeholder="Cash On Hand" value="{{ $originalData->cash_on_hand }}">
                                            <x-validation-error name="cash_on_hand"></x-validation-error>
                                        </x-input>
                                    </div>
                                </div>
                           </div>
                           <div class="card-footer">
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <label for="net_sales" class="text-sm text-muted fw-bold">Net Sales</label>
                                        <input id="net_sales" type="text" class="form-control form-control-sm" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label for="short_over" id="short_over_label" class="text-sm text-muted fw-bold">Short / Over</label>
                                        <input id="short_over" type="text" class="form-control form-control-sm" readonly>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                           </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    @endsection

    @push('scripts')
        <script>
            var cash_on_hand = $("#cash_on_hand");
            var net_sales = $("#net_sales");
            var short_over = $("#short_over");

            function calculateShortOver() {
                var cashOnHand = parseFloat($('#cash_on_hand').val()) || 0;
                var netSales = parseFloat($('#net_sales').val()) || 0;

                var shortOver = cashOnHand - netSales;
                console.log(shortOver);
                $('#short_over').val(shortOver.toFixed(2));
                if(Math.sign(shortOver) === -1){
                    $("#short_over_label").removeClass('text-muted');
                    $("#short_over_label").removeClass('text-success');
                    $("#short_over_label").addClass('text-danger');
                }else{
                    $("#short_over_label").removeClass('text-muted');
                    $("#short_over_label").removeClass('text-danger');
                    $("#short_over_label").addClass('text-success');
                }
            }

            function calculateNetSale() {
                var gross = parseFloat($('#gross').val()) || 0;
                var purchaseOrder = parseFloat($('#purchase_order').val()) || 0;
                var paidOut = parseFloat($('#paid_out').val()) || 0;
                var redeem = parseFloat($('#redeem').val()) || 0;
                var discount = parseFloat($('#discount').val()) || 0;
                var paidIn = parseFloat($('#paid_in').val()) || 0;
                var lubes = parseFloat($('#lubes').val()) || 0;

                var netSale = gross - purchaseOrder - paidOut - redeem - discount + paidIn + lubes;

                net_sales.val(netSale.toFixed(2));
                calculateShortOver();
            }

            $('#cash_on_hand, #net_sales').on('input', calculateShortOver);
            $('#gross, #purchase_order, #paid_out, #redeem, #discount, #paid_in, #lubes').on('input', calculateNetSale);
            calculateShortOver();
            calculateNetSale();


        </script>
    @endpush
</x-admin-layout>
