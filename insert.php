<?php
    include "config.php";

    $header = implode("",file("templates/t_header.html"));
    $content = implode("",file("templates/t_insert.html"));
    $footer = implode("",file("templates/t_footer.html"));

    $header =  str_replace("--TITLE--","Insert", $header);

        if(isset($_POST['save']))
        {        
            if(!empty($_POST['user']) && !empty($_POST['email'])) {                
            $user = $_POST['user'];
            $email = $_POST['email'];

            $sql = "INSERT INTO users (user, email) VALUES ('$user','$email')";
            $query = mysqli_query($conn, $sql);
            if($query)
            {
                
                header("location:index.php");
                echo 'Record inserted successfully.';
            }
            else
            {
                echo 'Insert Failed' . mysqli_error($conn);
            }
        } else {
            echo 'Plz insert username and email.';
        }
    }
        $source = $header.$content.$footer;
        echo $source;
?>