<?php
class UserController extends Controller
{
    public function index()
    {
        $this->viewRender('index');
    }
    public function registration()
    {
        if (isset($_POST['registration'])) {
            if ($_POST['name'] != '' && $_POST['surname'] != '' && $_POST['gender'] != '' && $_POST['email'] != '' && $_POST['password'] != ''  && $_POST['confirmPassword']){
                if ($_POST['password'] === $_POST['confirmPassword']) {
                    unset($_POST['registration']);
                    if ($this->modelRender('users')->select($_POST['email'])->execute()->numRows() == 0) {
                        $insert = $this->modelRender('users')->insert($_POST)->execute();
                        if ($insert->queryResultat) {
                            $_SESSION['msg'] = "<h2>Congratulations, you are successfully registered</h2>";
                        } else {
                            $_SESSION['msg'] = "<h2>Registration failed</h2>";
                        }
                    } else {
                        $_SESSION['msg'] = "<h2>There is already a registered person at that email</h2>";
                    }
                } else {
                    $_SESSION['msg'] = "<h2>Passwords do not match</h2>";
                }
            } else {
                $_SESSION['msg'] = "<h2>Import all fields</h2>";
            }
            unset($_POST);
            unset($_FILES);
            header('location: http://localhost/intership/registrationForm');
        }
    }
}