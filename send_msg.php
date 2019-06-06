<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php
session_start();

    //Create connection
  $connection = mysqli_connect('localhost', 'root', '', 'chatbox');
    if(isset($_POST['send'])){
      $sender = $_SESSION['username'];
      $receiver = $_POST['user'];
      $msg = $_POST['msg'];
      $thread_num = rand();

      $user = $connection->query("SELECT * FROM users WHERE username = '$sender'");
      $res_user = $user->fetch_assoc();
      $user_sender = $res_user['id'];

      $check = $connection->query("SELECT `thread_num` FROM logs WHERE user1 = '$user_sender' AND user2 = '$receiver' OR user1 = '$receiver' AND user2 = '$user_sender'");
      var_dump($check);
      $row = $check->fetch_assoc();
      $num = $row['thread_num'];



      if (mysqli_num_rows($check) == 0) {

        echo "Error: ". $check . "<br>". mysqli_error($connection);

        
        }else{


            $sql1 = "INSERT INTO msg_logs (thread_num, sender, receiver, msg) VALUES ('$num', '$user_sender', '$receiver', '$msg');";

           if (mysqli_multi_query($connection, $sql1)) {

                header("Location: display.php?username=".$receiver);

            } else {
                echo "Error: " . $sql1 . "<br>" . mysqli_error($connection);
            }

        }
       
      }
     

      

?>
