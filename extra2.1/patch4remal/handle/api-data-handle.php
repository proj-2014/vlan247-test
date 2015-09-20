
<?PHP


class ApiDataHandler {

    function get() {

     echo "here is api/data/test";
    }

    function post_xhr() {

        global $mydb ;

        if( eregi( '^/api/data/test.*', $_SERVER['REQUEST_URI']))
        {
              //echo $_POST['url'].$_POST['search'].$_POST['args'];
              $rdata = json_encode($_POST);
              echo json_encode($_POST) ;
        }
    }

}

?>
