<a class="badge badge-danger text-uppercase text-white" data-toggle="modal" data-target="#del{{ $user->user_id }}">
    {{ trans('bank.search.delete') }}
</a>

<!-- Modal -->
<div class="modal fade" id="del{{ $user->user_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    {{ trans('bank.search.modal') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{ trans('bank.search.cancel') }}
                </button>
                <a href="/delete-{{ $user->user_id }}" class="btn btn-danger">
                    {{ trans('bank.search.delete') }}
                </a>
            </div>
        </div>
    </div>
</div>
