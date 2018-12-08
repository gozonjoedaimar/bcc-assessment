<?php

echo $form_helper->messages();
?>

<div id="assessment-create" class=" hide show-on-load">

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