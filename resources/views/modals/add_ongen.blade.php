<div class="modal fade" id="addOngenModal" tabindex="-1" aria-labelledby="addOngenModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addGoalModalLabel">音源の追加</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="{{ route('shares.store') }}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <label>タイトル</label>
          <input type="text" class="form-control" name="title">
          <input type="file" name="ongen" accept="audio/*">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">登録</button>
        </div>
      </form>
    </div>
  </div>
</div>