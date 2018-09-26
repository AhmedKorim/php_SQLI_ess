<?php require_once('../private/initialize.php'); ?>


<?php
if (isset($_GET['id'])) {
    $page_id = $_GET['id'];
    $page = find_page_by_id($page_id);
    if (!$page) {
        redirect_to(url_for('/index.php'));
    }
    $subject_id = $page['subject_id'];
} else {
// no selected
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
