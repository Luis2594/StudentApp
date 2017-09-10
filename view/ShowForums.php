<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i>Inicio</a></li>
        <li><a href="ShowForums.php"><i class="fa fa-arrow-circle-right"></i>Foros</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Foros</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="grid" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Curso</th>
                                <th>Conversación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once '../business/ForumBusiness.php';
                            include_once '../business/CourseBusiness.php';
                            $forumBusiness = new ForumBusiness();
                            $courseBusiness = new CourseBusiness();
                            $forums = $forumBusiness->getForumsByStudent($_SESSION['id']);
                            foreach ($forums as $current) {
                                $resultCourses = $courseBusiness->getCourseId($current->getCourse());
                                $myCourse = $resultCourses[0];
                                ?>
                                <tr>
                                    <td><?php echo $current->getName(); ?></td>
                                    <td><?php echo $myCourse->getCourseName(); ?></td>
                                    <td>
                                        <a href="ShowConversations.php?id=<?php echo $current->getId(); ?>">Conversaciones</a>
                                    </td>
                                </tr>

                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Curso</th>
                                <th>Conversación</th>
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

