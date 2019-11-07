<div class="modal fade" id="visual-novel-characters-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Visual Novel's Characters</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="visual-novel-characters-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
    
                    </div>
                    <hr>
                    <form id="visual-novel-characters-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlInput1">Name</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="">Main</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlInput1">Role</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="1">Main</option>
                                    <option value="2">Supporting</option>
                                    <option value="3">Guest</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-gradient-success btn-rounded w-100">Add</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>