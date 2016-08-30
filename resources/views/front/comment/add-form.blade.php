<div class="slidePanel-comment" id="add-comment" ng-show="[[ isAuthenticated() ]]">
  <h4>A&ntilde;ade tu comentario</h4>
    <!-- NEW COMMENT FORM =============================================== -->
    <form ng-submit="submitComment()" class="new-comment"> <!-- ng-submit will disable the default form action and use our function -->
        <!-- COMMENT TEXT -->
      <textarea class="maxlength-textarea form-control mb-sm margin-bottom-20" name="comment" ng-model="commentData.text" rows="4"></textarea>
      <button class="btn btn-primary" id="add-new-comment" type="submit">Enviar</button>
    </form>
</div>
