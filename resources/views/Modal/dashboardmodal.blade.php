<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <lebel>Category</lebel>
                    <input type="text" name="category" value="" placeholder="Cetegory" style="width:90%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
</div>

<!--End Modal -->

<!-- Modal 2 -->

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('add_expense') }}" method="POST">
            @csrf
            <div class="modal-body">
                <lebel>Category</lebel>
                <select style="width: 90%" name="category">Category
                    @foreach(App\Models\CategoryModel::get() as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                    @endforeach
                </select>

                <input type="text" name="expense_amount" value="" placeholder="expense_amount" style="width:90%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
</div>
</div>

<!-- End Modal 2 -->


<!-- Modal 3 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                <lebel>Category</lebel>
                <select style="width: 90%" name="children_company">Category
                    {{-- @foreach(App\Models\CategoryModel::get() as $cat) --}}
                    <option>Sitepines</option>
                    <option>Themefisher</option>
                    <option>Gethugo-theme</option>
                    {{-- @endforeach --}}
                </select>
                <lebel>Amount</lebel>
                <input type="hidden" name="status">
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

<!-- End Modal 3 -->
