<script>
    $(function () {
        <?php 
            echo "var tab = 0;\n";
            if(isset($_GET['tab'])){
                echo "tab = " .  $_GET['tab'] . ";\n";
            }
        ?>
        $("#tabs").tabs(
            {
                active: tab
            });
    });
</script>