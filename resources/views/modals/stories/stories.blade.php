<div class="modal fade" id="stories-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Visual Novel's Stories/Dialogues</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="story-dialogues-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Character</th>
                                <th>Dialogue</th>
                                <th>Background</th>
                                <th>Music</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
                <hr>
                <form id="stories-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="characters">Dialogue Number</label>
                            <input type="number" class="form-control form-control-sm" name="dialogue_number"
                                id="dialogue-number" placeholder="(Ex: 1,..)">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="characters">Character</label>
                            <select class="form-control form-control-sm" name="character_id" id="characters">
                                <option value="">Null</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="backgrounds">Background</label>
                            <select class="form-control form-control-sm" name="background_id" id="backgrounds">
                                <option value="">Null</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="musics">Music</label>
                            <select class="form-control form-control-sm" name="music_id" id="musics">
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="dialogue">Dialogue</label>
                            <textarea class="form-control" name="dialogue" id="dialogue" rows="6"
                                maxlength="100"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="visual-novel-id" name="visual_novel_id">
                    <input type="hidden" id="stories-id">
                    <button type="submit" class="btn btn-gradient-success btn-rounded w-100"
                        id="stories-action">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>