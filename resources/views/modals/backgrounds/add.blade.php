<div class="modal fade" id="background-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="background-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="background-form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Background Name</label>
                            <input type="text" id="name" class="form-control form-control-sm" name="name" required>
                        </div>
                        <div class="form-group">
                                <label for="images">Images</label>
                                <input type="file" class="form-control-file" id="images" name="image">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="background-action">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>