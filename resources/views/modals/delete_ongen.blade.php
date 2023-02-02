<div class="modal fade" id="deleteOngenModal{{ $share->id }}" tabindex="-1" aria-labelledby="deleteOngenModalLabel{{ $share->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteGoalModalLabel{{ $share->id }}">「{{ $share->title }}」を削除してもよろしいですか？</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <div class="modal-footer">
                <form action="{{ route('shares.destroy', $share) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="path" value="{{$share->path}}" >
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </div>
    </div>
</div>