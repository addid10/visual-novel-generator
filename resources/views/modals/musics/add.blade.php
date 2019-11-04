<div class="modal fade" id="music-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="music-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="music-form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control form-control-sm" name="name" required>
                        </div>
                        <div class="form-group">
                                <label for="music">Music</label>
                                <input type="file" class="form-control-file" id="music" name="music">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="music-action">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>