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
            <form action="{{ route('category_add') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <lebel>Category</lebel>
                    <select name="mother_company" style="form-control">
                        <option>Themefisher</option>
                    </select>
                    <select name="children_company" style="form-control">
                        <option>Themefisher</option>
                        <option>Gethugo theme</option>
                        <option>Sitepines</option>
                    </select>
                    {{--  <input type="text" name="category" value=""placeholder="Cetegory"style="width:90%">  --}}
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
@foreach($category as $key => $cat)
<div class="modal fade" id="exampleModal1{{ @$cat->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal Edite</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('categoryEdite',$cat->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <lebel>Category</lebel>
                <input type="text" name="category" value="{{ @$cat->category }}" placeholder="Cetegory"
                    style="width:90%">
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
