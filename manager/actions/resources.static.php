<?php
if(IN_MANAGER_MODE!="true") die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the MODX Content Manager instead of accessing this file directly.");

include_once(MODX_MANAGER_PATH . 'actions/resources/functions.inc.php');
include_once(MODX_MANAGER_PATH . 'actions/resources/mgrResources.class.php');

$resources = new mgrResources();



// Prepare lang-strings / $unlockTranslations
$unlockTranslations = array('msg'=>$_lang["unlock_element_id_warning"],
                            'type1'=>$_lang["lock_element_type_1"], 'type2'=>$_lang["lock_element_type_2"], 'type3'=>$_lang["lock_element_type_3"], 'type4'=>$_lang["lock_element_type_4"],
                            'type5'=>$_lang["lock_element_type_5"], 'type6'=>$_lang["lock_element_type_6"], 'type7'=>$_lang["lock_element_type_7"], 'type8'=>$_lang["lock_element_type_8"]);
foreach ($unlockTranslations as $key=>$value) $unlockTranslations[$key] = iconv($modx->config["modx_charset"], "utf-8", $value);
?>
<script>var trans = <?php echo json_encode($unlockTranslations); ?>;</script>

<script type="text/javascript" src="media/script/tabpane.js"></script>
<script type="text/javascript" src="media/script/jquery.quicksearch.js"></script>
<script type="text/javascript" src="actions/resources/functions.js"></script>

<h1 class="pagetitle">
  <span class="pagetitle-icon">
    <i class="fa fa-th"></i>
  </span>
  <span class="pagetitle-text">
    <?php echo $_lang['element_management']; ?>
  </span>
</h1>

<div class="sectionBody">
<div class="tab-pane" id="resourcesPane">

    <script type="text/javascript">
        tpResources = new WebFXTabPane( document.getElementById( "resourcesPane" ), true);
    </script>

<?php
    include_once(MODX_MANAGER_PATH . 'actions/resources/tab1_templates.inc.php');
    include_once(MODX_MANAGER_PATH . 'actions/resources/tab2_templatevars.inc.php');
    include_once(MODX_MANAGER_PATH . 'actions/resources/tab3_chunks.inc.php');
    include_once(MODX_MANAGER_PATH . 'actions/resources/tab4_snippets.inc.php');
    include_once(MODX_MANAGER_PATH . 'actions/resources/tab5_plugins.inc.php');
    include_once(MODX_MANAGER_PATH . 'actions/resources/tab6_categoryview.inc.php');

    if (is_numeric($_GET['tab'])) {
        echo '<script type="text/javascript"> tpResources.setSelectedIndex( '.$_GET['tab'].' );</script>';
    }
?>
</div>
</div>