<?php
function getTitle($pdo,$id_Category){
    $sql ="
        SELECT name,image,id
        FROM manga_title
        WHERE id_category = $id_Category;
    ";
    $stnt = $pdo->prepare($sql);
    try {
        $stnt->execute();
        return $stnt->fetchAll();
    } catch (\Exception $e) {
        $stnt->rollback();
        throw $e;
    }
};
function getCategoryName($pdo,$id_Category){
    $sql ="
        SELECT name
        FROM `category`
        WHERE id = $id_Category;
    ";
    $stnt = $pdo->prepare($sql);
    try {
        $stnt->execute();
        return $stnt->fetchAll();
    } catch (\Exception $e) {
        $stnt->rollback();
        throw $e;
    }
};
function getCategoryId($pdo,$id_manga_title){
    $sql ="
        SELECT id_category
        FROM manga_title
        WHERE id = $id_manga_title;
    ";
    $stnt = $pdo->prepare($sql);
    try {
        $stnt->execute();
        return $stnt->fetchAll();
    } catch (\Exception $e) {
        $stnt->rollback();
        throw $e;
    }
};
function getCountBookInCategory($pdo,$id_manga_title){
    $sql = "
        SELECT COUNT(`id`) AS numberBook
        FROM `item`
        WHERE `id_manga_title` = $id_manga_title;
    ";
    $stnt = $pdo->prepare($sql);
    try {
        $stnt->execute();
        return $stnt->fetchAll();
    } catch (\Exception $e) {
        $stnt->rollback();
        throw $e;
    }
}
?>
