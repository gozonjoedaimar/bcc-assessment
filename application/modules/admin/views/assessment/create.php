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