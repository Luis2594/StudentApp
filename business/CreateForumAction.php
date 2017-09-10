<?php
include_once '../business/ForumBusiness.php';
session_start();
$text = $_POST['forumName'];
$course = $_POST['course'];
        
if (isset($text) && $text != "" && isset($course)) {
    if ((int)$course != -1) {
        $forumBusiness = new ForumBusiness();
        $forum = new Forum(NULL, $text , $course, $_SESSION['id']);
        if ($forumBusiness->insert($forum) != 0) {
            header("location: ../view/ShowForums.php?action=1&msg=Registro_creado_correctamente");
        } else {
            header("location: ../view/CreateForum.php?action=0&msg=Registro_fallido");
        }
    } else {
        header("location: ../view/CreateForum.php?action=0&msg=No_tiene_cursos_registrados.");
    }
} else {
    header("location: ../view/CreateForum.php?action=0&msg=Error_en_los_datos");
}
