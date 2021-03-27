

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add-Income</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add_income') }}" method="POST">
                @csrf

                <div class="modal-body">
                    <lebel>Category</lebel>
                    <select style="width: 90%" name="mother_company">Category
                        @foreach(App\Models\CategoryModel::get() as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->mother_company }}</option>
                        @endforeach
                    </select>
                    <br>
                    <lebel>children-Company</lebel>
                    <select style="width: 90%" name="children_company">Category
                        @foreach(App\Models\CategoryModel::get() as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->children_company }}</option>
                        @endforeach
                    </select>
                    <lebel>Amount</lebel>
                    <input type="text" name="income_amount" value="" style="width:90%">
                    {{-- <lebel>Donate-Amount</lebel> --}}
                    {{-- <input type="hidden" name="status">

                    <input type="hidden" name="Getid" value="{{$inc->id}}"> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal 2-->
@foreach($income as $key => $inc)
<div class="modal fade" id="exampleModal1{{ @$inc->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal-Update</h5>
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
                <br>
                <lebel>children-Company</lebel>
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
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <form action="{{url('/donate')}}" method="POST">
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
                <lebel>Donate-Amount</lebel>
                <input type="hidden" name="status">

                <input type="hidden" name="Getid" value="{{$inc->id}}">
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
