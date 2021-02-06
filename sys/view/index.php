<!DOCTYPE html>
<html>
    <?php include '../util/head.php'; ?>
    <body class="hold-transition skin-blue sidebar-mini fixed">
        <?php $page='index'; include '../util/nav.php'; ?>
        <div class="content-wrapper">
            <section class="content" id="content">
                <div class="row">
                    <?php include '../util/widgets/totalClientes.php'; ?>
                    <?php include '../util/widgets/totalDividas.php'; ?>
                </div>
                <div class="row">
                </div>
            </section>
            <?php include '../util/footer.php' ?>
        </div>
    </body>
    <script src="../bootstrap/js/custom.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $(".se-pre-con").fadeOut("slow");
        });
    </script>
</html>
