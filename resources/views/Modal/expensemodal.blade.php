<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add-Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('expense') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <lebel>Mother-Company</lebel>
                    <select style="width: 90%" name="mother_company">Category
                        @foreach(App\Models\CategoryModel::get() as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->mother_company }}</option>
                        @endforeach
                    </select>
                    <br>
                    <lebel>Expense-Category</lebel>
                    <input type="text" name="expense_category" value="" style="width:90%">
                    <lebel>Amount</lebel>
                    <input type="text" name="expense_amount" value="" style="width:90%">
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
@foreach($expense as $key => $exp)
<div class="modal fade" id="exampleModal1{{ @$exp->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Expense-Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ url('expense_update',$exp->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <lebel>Category</lebel>
                <select style="width: 90%" name="mother_company">Category
                    @foreach(App\Models\CategoryModel::get() as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->mother_company }}</option>
                    @endforeach
                </select>

                <lebel>Expense-Category</lebel>
                <input type="text" name="expense_category" value="{{ $exp->expense_category }}" style="width:90%">
                <lebel>Amount</lebel>
                <input type="text" name="expense_amount" value="{{ $exp->expense_amount }}" style="width:90%">
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
