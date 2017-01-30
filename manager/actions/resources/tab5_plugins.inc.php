<!-- plugins -->
<?php
if(IN_MANAGER_MODE!="true") die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the MODX Content Manager instead of accessing this file directly.");

if(isset($resources->items['site_plugins'])) { ?>
	<div class="tab-page" id="tabPlugins">
		<h2 class="tab"><i class="fa fa-plug"></i> <?php echo $_lang["manage_plugins"] ?></h2>
		<script type="text/javascript">tpResources.addTabPage( document.getElementById( "tabPlugins" ) );</script>
		<div id="plugins-info" style="display:none">
			<p class="element-edit-message"><?php echo $_lang['plugin_management_msg']; ?></p>
		</div>

		<ul class="actionButtons">
			<li>
				<form class="filterElements-form">
					<input class="form-control" type="text" placeholder="<?php echo $_lang['element_filter_msg']; ?>" id="site_plugins_search">
				</form>
			</li>
			<?php if($modx->hasPermission('new_plugin'))  { ?><li><a href="index.php?a=101"><?php echo $_lang['new_plugin']; ?></a></li><?php } ?>
			<?php if($modx->hasPermission('save_plugin')) { ?><li><a href="index.php?a=100"><?php echo $_lang['plugin_priority']; ?></a></li><?php } ?>
			<?php   if($modx->hasPermission('delete_plugin') && $_SESSION['mgrRole'] == 1) {
				$tbl_site_plugins = $modx->getFullTableName('site_plugins');
				if ($modx->db->getRecordCount($modx->db->query("SELECT id FROM {$tbl_site_plugins} t1 WHERE disabled = 1 AND name IN (SELECT name FROM {$tbl_site_plugins} t2 WHERE t1.name = t2.name AND t1.id != t2.id)"))) { ?>
					<li><a href="index.php?a=119"><?php echo $_lang['purge_plugin']; ?></a></li>
				<?php       }
			} ?>
			<li><a href="#" id="plugins-help"><?php echo $_lang['help']; ?></a></li>
			<?php echo renderViewSwitchButtons('site_plugins'); ?>
		</ul>

		<?php echo $resources->createResourceList('site_plugins'); ?>

		<script>
            initQuicksearch('site_plugins_search', 'site_plugins');
            initViews('pl', 'plugins', 'site_plugins');
		</script>
	</div>
<?php } ?>