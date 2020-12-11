<div class="modal fade" id="instant-mail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Instant Mail Box</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.employees.instant_mail',$employee->id) }}" method="POST">
              @csrf
                <div class="form-group">
                    <label for="title">Title of the Mail</label>
                    <input type="text" class="form-control" placeholder="Title for the mail" name="title" id="title" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject of the Mail</label>
                    <input type="text" class="form-control" placeholder="Subject for the mail" name="subject" id="subject" required>
                </div>
                <div class="form-group">
                    <label for="body">Body of the Mail</label>
                    <textarea name="body" id="body" rows="2" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
      </div>
    </div>
</div>