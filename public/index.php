<?php require_once('../private/initialize.php'); ?>


<?php
if (isset($_GET['id'])) {
    $subject_id = $_GET['id'];

} else {

}

if (isset($_GET['page_id'])) {
    $page_id = $_GET['page_id'];
}
if (isset($page_id)) {
    $page = find_page_by_id($page_id);

}
?>


<?php include(SHARED_PATH . '/public_header.php'); ?>
<div id="main">
    <?php include(SHARED_PATH . '/public_navigation.php'); ?>
    <div id="page">
        <?php
        if (isset($page)) {
            // show page from db
            // TODO add html escaping back in
            echo $page['content'];
        } else {
            include(SHARED_PATH . '/static_homepage.php');

        }

        ?>
    </div>
</div>
<?php include(SHARED_PATH . '/public_footer.php'); ?>
