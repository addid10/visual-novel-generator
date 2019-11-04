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
                    <table class="table table-bordered">
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
                            <tr>
                                <td>1</td>
                                <td>

                                    <div class="character-image-sm">
                                        <img src="{{ asset('bg/01.jpg') }}" alt="image">
                                    </div>
                                </td>
                                <td>Konsultasi Pra-Proposal</td>
                                <td>
                                    <div class="bg-image-sm">
                                        <img src="{{ asset('bg/01.jpg') }}" alt="image">
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-icon btn-gradient-success btn-rounded"><span
                                            class="mdi mdi-play-circle"></span></button>
                                </td>
                                <td>
                                    <button class="d-block btn btn-sm btn-gradient-warning btn-rounded w-100">
                                        Update
                                    </button>
                                    <button class="d-block btn btn-sm btn-gradient-danger btn-rounded w-100 mt-2">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <hr>
                <form>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="character">Character</label>
                            <select class="form-control form-control-sm" name="character_id" id="character">
                                <option value="">Main</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Background</label>
                            <select class="form-control form-control-sm" name="background_id" id="background">
                                <option value="">Main</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlInput1">Music</label>
                            <select class="form-control form-control-sm" name="music_id" id="music">
                                <option value="">Main</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="dialogue">Dialogue</label>
                            <textarea class="form-control" name="dialogue" id="dialogue" rows="5"
                                maxlength="100"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="visual-novel-id">
                    <button type="button" class="btn btn-gradient-success btn-rounded w-100"
                        id="stories-action">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>