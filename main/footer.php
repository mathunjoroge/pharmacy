	<div><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></div>
<div align="center" style="bottom:10%;"> <?php echo "&copy;";?><?php function auto_copyright($year = 'auto'){ ?>
   <?php if(intval($year) == 'auto'){ $year = date('Y'); } ?>
   <?php if(intval($year) == date('Y')){ echo intval($year); } ?>
   <?php if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); } ?>
  
   
<?php } ?>
<b>M&C</b>
<?php auto_copyright('2014'); ?> All Rights Reserved
</div>

        <script>
        $(function() {
<!--             $(".datepicker").datepicker(); -->
<!--             $(".uniform_on").uniform() -->;
            $(".chzn-select").chosen();
   <!--          $('.textarea').wysihtml5(); -->

        });
        </script>

   <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

        <script src="../main/vendors/chosen.jquery.min.js"></script>
        <script src="../main/vendors/bootstrap-datepicker.js"></script>
    <script src="../main/js/bootstrap-transition.js"></script>    
    <script src="../main/js/bootstrap-alert.js"></script>
    <script src="../main/js/bootstrap-modal.js"></script>
    <script src="../main/js/bootstrap-dropdown.js"></script>
    <script src="../main/js/bootstrap-scrollspy.js"></script>
    <script src="../main/js/bootstrap-tab.js"></script>
    <script src="../main/js/bootstrap-tooltip.js"></script>
    <script src="../main/js/bootstrap-popover.js"></script>
    <script src="../main/js/bootstrap-button.js"></script>
    <script src="../main/js/bootstrap-collapse.js"></script>
    <script src="../main/js/bootstrap-carousel.js"></script>
    <script src="../main/js/bootstrap-typeahead.js"></script>
<script src="../main/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../main/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../main/js/DT_bootstrap.js"></script>


