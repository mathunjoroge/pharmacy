 <style>
        /* Style for the footer */
        #footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>

<div align="center" id="footer"> 
    <?php echo "&copy;";?>
    <?php function auto_copyright($year = 'auto'){ ?>
       <?php if(intval($year) == 'auto'){ $year = date('Y'); } ?>
       <?php if(intval($year) == date('Y')){ echo intval($year); } ?>
       <?php if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); } ?>
    <?php } ?>
    <b>M&C</b>
    <?php auto_copyright('2014'); ?> All Rights Reserved
    <div style="text-align: center; font-family: Arial, sans-serif; font-size: 16px; color: #333; margin: 0 auto;">
    <p style="margin-bottom: 20px;">Contact <a href="mailto:admin@healthtecq.com" style="color: #007bff; text-decoration: none;">admin@healthtecq.com</a> for any queries.</p>
</div>
</div>

<script>
    $(function() {
        $(".chzn-select").chosen();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("navToggle").addEventListener("click", function() {
            var navCollapse = document.getElementById("navCollapse");
            if (navCollapse.classList.contains("show")) {
                navCollapse.classList.remove("show");
            } else {
                navCollapse.classList.add("show");
            }
        });
    });
</script>

<script src="../main/vendors/chosen.jquery.min.js"></script>
<script src="../main/vendors/bootstrap-datepicker.js"></script>
<script src="../main/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../main/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../main/js/DT_bootstrap.js"></script>

</body>
</html>
