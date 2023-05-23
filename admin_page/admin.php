<?php
    include '..\functions\function.php';
    include '..\functions\admin_function.php';
    setup('admin');
    pageheader('admin', '.\admin_page\admin.php');
    navbar('.\admin_page\admin.php');

    showUsers();
?>

<?php
    footer();
?>