<!-- Modal -->
<div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/article_tags') }}" method="post">
            @csrf

            <div class="mb-3">
              <label for="article_id">Article Title</label>
              <select name="article_id" id="Article_id" class="form-control">
                  <option value="" hidden>Choose</option>
                  @foreach ($RelationArticle as $item )
                      <option value="{{ $item->id   }}">{{ $item->name }}</option>
                  @endforeach
              </select>
          </div>

          <div class="mb-3">
            <label for="article_id">Tags Name</label>
            <select name="article_id" id="Article_id" class="form-control">
                <option value="" hidden>Choose</option>
                @foreach ($relationTag as $item )
                    <option value="{{ $item->Tag }}">{{ $item->Tag }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>