<div class="modal fade" id="filterModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filteration</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 mb-3">
                        <x-input id="filter_date_from" onchange="filterReloadTable()" name="filter_date_from" type="date" placeholder="From"></x-input>
                    </div>
                    <div class="col-6 mb-3">
                        <x-input id="filter_date_to" onchange="filterReloadTable()" name="filter_date_to" type="date" placeholder="To"></x-input>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="form-floating">
                            <select name="filter_branch_id" onchange="filterReloadTable()" class="form-select" id="filter_branch_id">
                                <option value="" selected disabled>None</option>
                               @foreach ($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                               @endforeach
                            </select>
                            <label for="">Choose Branch</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
