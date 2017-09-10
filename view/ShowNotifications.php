<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i>Inicio</a></li>
        <li><a href="ShowNotifications.php"><i class="fa fa-arrow-circle-right"></i>Notificaciones</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Notificaciones</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="grid" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Contenido</th>
                                <th>Módulo</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/NotificationBusiness.php';
                            $business = new NotificationBusiness();

                            $notifications = $business->getAllNotificationByStudent($_SESSION['id']);

                            foreach ($notifications as $not) {
                                ?>
                                <tr>
                                    <td><?php echo $not->getNotificationText(); ?></td>
                                    <td><?php echo $not->getNotificationCourse(); ?></td>
                                    <td><?php echo $not->getNotificationDate(); ?></td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Contenido</th>
                                <th>Módulo</th>
                                <th>Fecha</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#grid").dataTable();
    });
</script>

