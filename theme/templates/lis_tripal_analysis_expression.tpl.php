<?php //message($variables);  ?>
<?php
//THIS IS THE LIS-VERSION (MODIFIED) OF THE TEMPLATE FILE IN TRIPAL_ANALYSIS_EXPRESSION MODULE
/*For overriding the tripal_analysis_expression module's template
 *'tripal_analysis_expression/theme/templates/tripal_feature_expression.tpl.php' with
 * this module's 'tripal_exp_profiles/theme/templates/tripal_feature_expression.tpl.php' modified
 * by me to suit LIS needs.
 * 
*/
?>

<?php
  $feature = $variables['node']->feature;
?>

<!-- Page Title  -->
<script>
  titleLabel = "<?php echo "Expression (".$feature->name.")"; ?>";
  (function($) {
    $('.figure-tripal-data-pane-title.tripal-data-pane-title').html('Expression: <?php echo $feature->name?>');
    //jQuery('.figure-tripal-data-pane-title.tripal-data-pane-title').html(titleLabel);
  })(jQuery);    
</script>


<?php
  if (!$variables['has_exp'] and $variables['json_exp']) {
?>

No biomaterial libraries express this feature.

<?php }

else if ($variables['json_exp']) {
?>

<span style="color:Red"> </span>

<a name="expression-top"> </a>
<p>
Hover the mouse over a column in the graph to view expression values. <br>
  <a href='' onclick="expSortDown(); return false;">Sort Descending</a> |
  <a href='' onclick="expSortUp(); return false;">Sort Ascending</a> |
  <a href='' onclick="nonZero(); return false;">Only Non-Zero Values</a> |
  <a href='' onclick="expChart(); return false;">Tile/Chart</a> |
  <a href='' onclick="expNormal(); return false;">Reset</a>
</p>

<?php
  tripal_add_d3js();
  $hide_biomaterial_labels = $variables['hide_biomaterial_labels'];
  $json_exp = $variables['json_exp'];
  $limit_label_length = $variables['limit_label_length'];
  $expression_display = $variables['expression_display'];
  $biomaterial_display_width = $variables['biomaterial_display_width'];?>
  <script> <?php
    print 'heatMapRaw=' . $json_exp . ';';
    print 'maxLength=' . $limit_label_length . ';';
    print 'showLabels=' . $hide_biomaterial_labels . ';';
    print 'col="' . $expression_display . '";';
    print 'colWidth=' . $biomaterial_display_width . ';';
  ?> </script>
  <script type="text/javascript">
  Drupal.behaviors.tripal_analysis_expression = {
    attach: function (context, settings) {


      expNormal();
}};

  </script>

  <?php
  //drupal_add_js('/theme/js/expression.js','file');
  //$scripts = drupal_get_js();
  //print $scripts;
  //print drupal_get_path('module','tripal_analysis_expression') . '/theme/js/expression.js';
  ?>
<figure>

</figure>

<a href="#expression-top">back to top</a>

<br/>
<?php

// DEBUG SECTION (REMOVE LATER)  <<<<<<<<<<<<<<<

//Testing
    //echo "<br>f-name: ".$feature->name;
    //echo "<br>f-id: ".$feature->feature_id;
    //echo "<br>f-sp: ".$feature->organism_id->species;
//echo "<br>".$feature->type_id->cv_id->name;//works

    //$feature = chado_expand_var($feature, 'table', 'element'); //works
    //echo "<br>elm-id: ".$feature->element->element_id; //works =58512
    //echo "<br>ardes-id: ".$feature->element->arraydesign_id; //fails, STRANGE!!! is able to get element_id from the same table but fails for arraydesign_id(there is a single row for this feature in element table). Fails to get =39
    //$element = $feature->element;
    //$element = chado_expand_var($element, 'table', 'arraydesign');
    //echo "<br>ardes-id: ".$element->arraydesign_id->arraydesign_id;


//$feature = chado_expand_var($feature, 'table', 'elementresult'); //Fails
//echo "<br>elmres-id:".$feature->element->element_id->elementresult->elementresult_id;

    //$feature = chado_expand_var($feature, 'table', analysisfeature);
    //$feature= $feature->analysisfeature;
    //echo "<br>anaf-id:".$feature[1]->analysis_id;  //Fails, WHY???? (exp val 9886293, 808274)



//$feature = $variables['node']->feature;
//$feature = chado_expand_var($feature, 'table', 'feature_synonym');
//$synonyms = $feature->feature_synonym;
//echo "<br>fsyn:".gettype($synonyms);


//---from the stanton module
//$analysis = $variables['node']->analysis;
//  $analysis = chado_expand_var($analysis, 'table', 'analysisprop', array('return_array' => 1));
//  $analysis_id = $analysis->analysis_id;
//echo "<br>b. ana-id:".$analysis_id;


//dpm($variables['node']->analysis); //dpm(get_defined_vars());

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

//github repo: https://github.com/legumeinfo/lis_tripal_analysis_expression.git



?>


<?php
}
