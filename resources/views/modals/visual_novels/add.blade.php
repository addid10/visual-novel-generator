<div class="modal fade" id="visual-novel-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visual-novel-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="visual-novel-form" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" id="title" class="form-control form-control-sm" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="">Synopsis</label>
                        <textarea id="synopsis" class="form-control" name="synopsis" rows="4" required></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="topics">Genres</label>
                        <select multiple class="form-control form-control-sm" id="genres" name="genres[]">
                           
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="visual-novel-id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="visual-novel-action">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>