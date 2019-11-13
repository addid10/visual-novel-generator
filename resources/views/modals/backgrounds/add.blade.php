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
                        <input type="text" class="form-control form-control-sm" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="images">Images</label>
                        <input type="file" class="form-control-file" id="image" name="image" required>
                    </div>

                    <div class="form-group">
                        <label for="topics">Visual Novels</label>
                        <select multiple class="form-control form-control-sm" id="visual-novels" name="visual_novels[]">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="background-id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="background-action">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>