<div id="login-modal" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">New message</h4>
</div>
<div class="modal-body">
<form action="/login" method="POST">
	<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
<label for="recipient-name" class="control-label">Email:</label>
<input type="text" class="form-control" id="username" name="username">
</div>
<div class="form-group">
  <label for="message-text" class="control-label">Password:</label>
<input type="password" class="form-control" id="password" name="password">
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary" id="login-modal-submit">Ingresar</button>
</form>
</div>



</div>
</div>
</div>