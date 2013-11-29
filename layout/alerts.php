<script>


  $(document).ready(function(){
    $alerts = $('#alerts');
<?php
foreach (CadVolHelper::getAlerts() as $alert) {
  echo '$alerts.append($(\'<div class="alert alert-dismissable alert-' . $alert['level'] . '"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $alert['message'] . '</div>\'));';
}
?>

  });
</script>