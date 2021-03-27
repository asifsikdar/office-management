<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add-Salary-Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add_salary') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <lebel>Employee-Id</lebel>
                    <input type="text" name="empid" value="" placeholder="Employee-Id" style="width:90%">

                    <lebel>Joining-Date[One-Time]</lebel>
                    <input type="date" name="joindate" value="" placeholder="Join-Date" style="width:90%">

                    <lebel>Employee Name</lebel>
                    <input type="text" name="name" value="" placeholder="Employee Name" style="width:90%">

                    <lebel>Designation</lebel>
                    <input type="text" name="designation" value="" placeholder="Designation" style="width:90%">

                    <lebel>Bank-Name</lebel>
                    <select style="width:90%" name="bankname">
                        <option>DuchBangla-Bank</option>
                        <option>Al-Arafha</option>
                        <option>Islami-Bank</option>
                        <option>DuchBangla-Bank</option>
                    </select>
                    <lebel>Bank-Details</lebel>
                    <input type="text" name="bankdetails" value="" placeholder="Bank-Details" style="width:90%">

                    <lebel>Salary-Amount</lebel>
                    <input type="text" name="salary_amount" value="" placeholder="Salary-Amount" style="width:90%">

                    <lebel>Bonus</lebel>
                    <input type="text" name="bonus" value="" placeholder="Salary-Bonus" style="width:90%">
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
@foreach($salary as $key => $sal)
<div class="modal fade" id="exampleModal1{{ @$sal->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">update-Salary-Info</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('edit',$sal->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <lebel>Joining-Date[One-Time]</lebel>
                <input type="date" name="joindate" value="{{ @$sal->joindate }}" placeholder="Joining-Date"
                    style="width:90%">
                <lebel>Employee-Name</lebel>
                <input type="text" name="name" value="{{ @$sal->name }}" placeholder="Cetegory" style="width:90%">
                <lebel>Designation</lebel>
                <input type="text" name="designation" value="{{ @$sal->designation }}" placeholder="Cetegory"
                    style="width:90%">
                <lebel>Bank-Details</lebel>
                <input type="text" name="bankdetails" value="{{ @$sal->bankdetails }}" placeholder="Cetegory"
                    style="width:90%">
                <lebel>Salary-Amount</lebel>
                <input type="text" name="salary_amount" value="{{ @$sal->salary_amount }}" placeholder="Cetegory"
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
