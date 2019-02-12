<?php

echo $form_helper->messages();
?>

<div id="assessment-create" class=" hide show-on-load">

  <!-- Search Student -->
  <div style="margin-bottom: 10px;"><button class="btn btn-primary btn-lg searchStudent" >Search Student</button></div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#assessment_form" aria-controls="assessment_form" role="tab" data-toggle="tab">Assessment Form</a></li>
    <li role="presentation"><a href="#account_statement" aria-controls="account_statement" role="tab" data-toggle="tab">Statement of Account</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="margin-top: 10px;">
    <div role="tabpanel" class="tab-pane active" id="assessment_form"><?php include(module_view_dir('assessment/create/assessment_form.php')) ?></div>
    <div role="tabpanel" class="tab-pane" id="account_statement"><?php include(module_view_dir('assessment/create/statement_of_account.php')); ?></div>
  </div>

</div>

<div class="modal fade add-sponsor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <?php echo form_open('api/sponsors', [ 'id'=>'add-sponsor' ]) ?>
      <div class="modal-header">
        <?php echo form_label("Add sponsor") ?>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <?php echo  form_input('name', NULL, [ "class"=>'form-control' ]) ?>
        </div>
      </div>
      <div class="modal-footer text-right">
        <?php echo form_submit('submit', "Submit", [ 'class'=>'btn btn-primary' ]) . form_reset('close', 'Close', [ 'class' => 'btn btn-default', "data-dismiss"=>"modal" ]); ?>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<script type="text/javascript">

(function($) { if (!$) return;

  window.addEventListener('load', function() {
    initStudentSearchModal(function(row, result) {
      var data = result.data[row.rowIndex - 1];
      for (key in data) {
        $('[name='+key+']:visible').val(data[key]);
      }
    });

    $('button.searchStudent').on('click', function() {
      $('#studentSearchModal').modal('show');
    });

  });

})(window.jQuery);

</script>