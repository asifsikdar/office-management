<!-- Modal 2-->
@foreach($income as $key => $inc)
<div class="modal fade" id="exampleModal1{{ @$inc->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Edite</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('income_edit',$inc->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <lebel>Category</lebel>
                    <select style="width: 90%" name="mother_company">Category
                        @foreach(App\Models\CategoryModel::get() as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->mother_company }}</option>
                        @endforeach
                    </select>
                    <select style="width: 90%" name="children_company">Category
                        @foreach(App\Models\CategoryModel::get() as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->children_company }}</option>
                        @endforeach
                    </select>
                    <lebel>Amount</lebel>
                    <input type="text" name="income_amount" value="{{ $inc->income_amount }}" style="width:90%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</div>

@endforeach


<!-- Modal 3 -->
@foreach($income as $key => $inc)
<div class="modal fade" id="exampleModal2{{ $inc->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add-Donation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <form action="{{url('/donate')}}" method="POST">
            @csrf
            <div class="modal-body">
                <lebel>Main</lebel>
                <select style="width: 90%" name="category">
                    @foreach(App\Models\IncomeModel::get() as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->get_category['mother_company'] }}</option>
                    @endforeach
                </select>
                <br><br>
                <lebel>Form</lebel>
                <select style="width: 90%" name="child_category_form">
                    @foreach(App\Models\IncomeModel::get() as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->children_company }}</option>
                    @endforeach
                </select>
                <br><br>
                <lebel>To</lebel>
                <select style="width: 90%" name="children_company_to">
                    @foreach(App\Models\IncomeModel::get() as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->children_company }}</option>
                    @endforeach
                </select>
                <lebel>Donate-Amount</lebel>
                <input type="hidden" name="status">

                <input type="hidden" name="Getid" value="{{$inc->id}}">
                <input type="hidden" name="ammount" value="{{$inc->income_amount}}">

                <input type="text" name="income_amount" placeholder="amount" style="width:90%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
        </form>


    </div>
</div>
</div>


</div>
@endforeach
<!-- End Modal 3 -->
