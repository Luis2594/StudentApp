<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
include './reusable/Session.php';
include './reusable/Header.php';
$id = $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i>Inicio</a></li>
        <li><a href="ShowForums.php"><i class="fa fa-arrow-circle-right"></i>Foros</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Conversaciones</a></li>
    </ol>
</section>
<br>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h2>                        
                        <?php
                        include_once '../business/ForumBusiness.php';
                        $forumBusiness = new ForumBusiness();
                        $forum = $forumBusiness->getForum($id);
                        echo $forum[0]->getName();
                        ?>
                    </h2>
                    <br/>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="grid" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Conversación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once '../business/ConversationBusiness.php';
                            $conversationsBusiness = new ConversationBusiness();
                            $conversations = $conversationsBusiness->getConversationsByForum($id);
                            foreach ($conversations as $conversation) {
                                ?>
                                <tr>
                                    <td>
                                        <a href="InformationConversation.php?id=<?php echo $conversation->getForumConversationId(); ?>&forum=<?php echo $id; ?>"><?php echo $conversation->getForumConversation(); ?>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
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

