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
    <script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("navToggle").addEventListener("click", function() {
      console.log("Toggle button clicked!"); // Add this line for debugging
      var navCollapse = document.getElementById("navCollapse");
      if (navCollapse.classList.contains("show")) {
        navCollapse.classList.remove("show");
        console.log("NavCollapse is now hidden."); // Add this line for debugging
      } else {
        navCollapse.classList.add("show");
        console.log("NavCollapse is now visible."); // Add this line for debugging
      }
    });
  });
</script>

        <script src="../main/vendors/chosen.jquery.min.js"></script>
        <script src="../main/vendors/bootstrap-datepicker.js"></script>
    
<script src="../main/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../main/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../main/js/DT_bootstrap.js"></script>