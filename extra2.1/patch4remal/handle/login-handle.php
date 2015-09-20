
<?PHP
class LoginHandler{


    function get(){
        d($_SERVER);
        d($_SESSION);

        global $twig;


	//$template = $twig->loadTemplate('index.twig');
	//$template->display(array('name' => 'TWIG'));
       
        if(isset($_SESSION['user'])){
            echo $twig->render('login.twig',array('name' => $_SESSION['user']));
        }
        else{
            echo $twig->render('login.twig',array('name' => $_SESSION['user']));

        }
 
    }

    function post_xhr(){

       if( eregi( '^/login/*', $_SERVER['REQUEST_URI']))
        {
              $action = $_GET['action'];
              
              if($action == 'login'){
                  $user = stripslashes(trim($_POST['user']));
	          $pass = stripslashes(trim($_POST['pass']));
                   
                  if (empty ($user)) {
	        	echo '用户名不能为空';
		        exit;
	          }
		  if (empty ($pass)) {
			echo '密码不能为空';
			exit;
		  } 

                $md5pass = md5($pass);
	        $query = mysql_query("select * from user where username='$user'");
                debug_out( "user is " . $user . " query is : " . $query);
    
                $us = is_array($row = mysql_fetch_array($query));
	        $ps = $us ? $md5pass == $row['password'] : FALSE;
                 
                debug_out("query is " . $row[0]);
                if($ps){
                      $counts = $row['login_counts'] + 1;
                      $_SESSION['user'] = $row['username'];
                      $_SESSION['login_time'] = $row['login_time'];
                      $_SESSION['login_counts'] = $counts;
                      $ip = ""; //get_client_ip();
                      $logintime = mktime();
                      $rs = mysql_query("update user set login_time='$logintime',login_ip='$ip',login_counts='$counts'");
                      
                      if ($rs) {
			//echo '1';exit;
			$arr['success'] = 1;
			$arr['msg'] = '登录成功！';
			$arr['user'] = $_SESSION['user'];
			$arr['login_time'] = date('Y-m-d H:i:s',$_SESSION['login_time']);
			$arr['login_counts'] = $_SESSION['login_counts'];
		      }
                      else {
				$arr['success'] = 0;
				$arr['msg'] = '登录失败';
                      } 
                }
                else  {
				$arr['success'] = 0;
				$arr['msg'] = '登录失败';
                }
                echo json_encode($arr);
                
        }
        elseif($action == 'logout'){
             unset($_SESSION);
             session_destroy();
             echo '1';
        }
      
    }
   } 
}

?>
