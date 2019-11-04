<div class="modal fade" id="character-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="character-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="character-form" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" id="fullname" class="form-control form-control-sm" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="nickname">Nickname</label>
                        <input type="text" id="nickname" class="form-control form-control-sm" name="nickname" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="sex">Sex</label>
                        <select class="form-control form-control-sm" id="sex" name="sex" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control" name="description" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" class="form-control-file" id="images" name="image[]" multiple>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="character-action">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>