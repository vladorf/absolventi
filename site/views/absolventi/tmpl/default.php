<?php JHtml::_('jquery.framework'); 
ini_set('display_errors',true);  error_reporting( E_ALL );
JHtml::_('behavior.framework', true);
?>
<form role="form" method="post" id="adminForm" name="adminForm">
    <div class="form-group">
        <?php foreach($this->form->getFieldset("main") as $field) echo $field->renderField(); ?> 
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#filter">Rozsirene vyhladavanie</button>
        <div id="filter" class="collapse">
            <br>
            <?php foreach($this->form->getFieldset("filter") as $field) echo $field->renderField(); ?> 
        </div>
    </div>
</form>
<script language="javascript" type="text/javascript">
jQuery(document).ready(function(){
    jQuery("#jform_name").keyup(function(){
        jQuery("#table").load('index.php?option=com_absolventi&task=getData&format=raw', jQuery('#adminForm').serialize());
    });
    jQuery(".filter").change(function(){
        jQuery("#table").load('index.php?option=com_absolventi&task=getData&format=raw', jQuery('#adminForm').serialize());
    });
});
</script>
<div id="table"></div>
