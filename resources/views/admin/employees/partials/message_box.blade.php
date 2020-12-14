<div class="modal fade" ref="instantMail" id="instant-mail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Instant Mail Box</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form @submit.prevent="instantMail" method="POST">
                <div class="form-group">
                    <label for="title">Title of the Mail</label>
                    <input type="text" class="form-control" placeholder="Title for the mail" v-model="mail.title" id="title">
                </div>
                <div class="form-group">
                    <label for="subject">Subject of the Mail</label>
                    <input type="text" class="form-control" placeholder="Subject for the mail" v-model="mail.subject" id="subject">
                </div>
                <div class="form-group">
                    <label for="body">Body of the Mail</label>
                    <textarea v-model="mail.body" id="body" rows="2" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
      </div>
    </div>
</div>