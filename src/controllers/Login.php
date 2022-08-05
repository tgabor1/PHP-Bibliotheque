<?php
class Login{

    public function displayLogin(){
        require("../templates/login.php");
        unset($_SESSION['login_error']);
    }


    public function submitLogin(){

        require("../src/pdo/PDO.php");

        
        
        $lastname = strip_tags($_POST['lastname']); 
        $firstname = strip_tags($_POST['firstname']); 
        $password = strip_tags($_POST['password']);

        $adminDB = $db -> prepare("SELECT * FROM admin WHERE first_name = :firstName");
        $adminDB -> execute(['firstName' => $firstname]);
        $admin = $adminDB -> fetch();

        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        var_dump($admin);
        var_dump($admin['password']);
        var_dump($hashedPassword);



        if (isset($lastname) && isset($firstname) && isset($password)) {
            if($lastname == $admin['last_name'] && $firstname == $admin['first_name']){
                // if ($password == $admin['password']) {
                if (password_verify($password, $admin['password'])) {
                    $_SESSION['loggedUser'] = $firstname;
                    header('Location: ../index.php');
                }
                else {
                    // header('Location: ../index.php');
                    $_SESSION['login_error'] = 2;
                } 
            } 
            else {
                // header('Location: ../index.php');   
                $_SESSION['login_error'] = 1;
            }  
        }

        var_dump($_SESSION);
        var_dump(password_verify($password, $admin['password']));

    }
}

// $requete = "SELECT count(*) FROM utilisateur where 
//                     gabor = '".$lastname."' theodore = '".$firstname."' library = '".$password."' ";
//                 $exec_requete = mysqli_query($db,$requete);
//                 $reponse      = mysqli_fetch_array($exec_requete);
//                 $count = $reponse['count(*)'];
//                 if($count!=0) // nom d'utilisateur et mot de passe correctes
//                 {
//                 $_SESSION['loggeduser'] = $lastname;
//                 header('Location: /');
//                 }
//                 else
                
//                 {
//                     echo 'Incorrect';
//                 }