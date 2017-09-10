<?php

include './CurriculumBusiness.php';

$id = (int) $_GET['id'];
$year = (int) $_POST['year'];
$text = $_POST['name'];

if (isset($id) && is_int($id) && isset($year) && isset($text) && is_int($year)) {

    $curriculumBusiness = new CurriculumBusiness();
    $curriculum = new Curriculum($id, $text, $year);
    if ($curriculumBusiness->update($curriculum)) {
        header("location: ../view/InformationCurriculum.php?id=" . $id . "&action=1&msg=Registro_actualizado_correctamente");
    } else {
        header("location: ../view/UpdateCurriculum.php?id=" . $id . "&action=0&msg=Error_al_actualizar_registro");
    }
} else {
    header("location: ../view/UpdateCurriculum.php?id=" . $id . "&action=0&msg=Datos_erroneos");
}