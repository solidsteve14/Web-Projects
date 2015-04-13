<?php 
if (isset($_GET['action']))
    $action = $_GET['action'];
else
    # default page after login
    $action = 'search';
if (!isset($db)) {
    require ('dbconnect.php');
    $db = get_connection();
}
?>
<?php 
include ('header.php');
echo '<div class="container">';
if ($action == 'package')
    echo '<div class="col-md-12">';
else
    echo '<div class="col-md-8">';
switch ($action) {
    case 'list':
        include ('car_list.php');
        break;
    case 'search':
        include ('car_search.php');
        break;
    case 'package':
        include ('car_package.php');
        break;
    case 'update':
        $title = $_POST['title'];
        $year = $_POST['year'];
        #echo $title;
        include ('movie_update.php');
        break;
    default:
}
?>
</div>
</div>
<?php include ('footer.php'); ?>
