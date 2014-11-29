<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 19/11/2014
 */

require '../app/core/Mail.php';

class Login extends Controller
{
    public function index()
    {
        $error = '';

        /* Load the user model in preparation for login attempt */
        $model = $this->model('User');

        if (isset($_POST['username']) && isset($_POST['password'])) {
            if (!empty($_POST['username']) && isset($_POST['password'])){

                $username = $_POST['username'];
                $password = $_POST['password'];

                $user = $model->getByCredentials($username, $password);


                if ($user != null) {

                    /* Create a session for the logged in user */
                    Session::startSession();

                    Session::set('user_logged_in', true);
                    Session::set('user_id', $user->getId());
                    Session::set('username', $user->getUsername());
                    Session::set('user_email', $user->getEmail());

                    /* Relocate User to the home page */
                    header('Location: /AssessmentDatabase/public/home/');

                } else {
                    $error = 'Incorrect details, please try again.';
                }




            }
        }

        $this->view('login/index', [
            'error' => $error
        ]);
    }

    public function recover($param = '')
    {
        $message = '';
        $error = '';
        $model = $this->model('User');

        $mode = $param;
        if ($mode == 'username') {

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

                if ($user = $model->recoverUsername($email)) {
                    $username = $user->getUsername();

                    Mail::sendMail($email, 'Username Recovery', 'You requested a username recovery, your username is: /n/n' . $username);
                    $message = 'An email containing your username has been dispatched.';

                } else {
                    $error = 'Your email was not found in our records.';
                }

            }

        }
        elseif ($mode == 'password') {

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);


                if ($user = $model->getByEmail($email)) {

                    /* Check if there is already a previous hash */
                    if ($hash = $model->getRecoveryHash($user->getId())) {
                        // Hash has already been set.
                        Mail::sendMail($email, 'Recover Password', 'You requested a password recovery, please enter the below hash on the recovery page. /n/n Your unique hash is: /n/n' . $hash);
                        header('Location: /AssessmentDatabase/public/login/hash/');
                    } else {
                        // Hash has not yet been set.
                        $hash = $model->setRecoveryHash($email);

                    }

                    /* Check the inputted email exists and store a recovery hash*/

                }

                $error = 'Your email was not found in our records';

            }


        } else {
            header('Location: /AssessmentDatabase/public/home');
        }



        $this->view('login/recovery', [
            'message' => $message,
            'error' => $error
        ]);
    }

    public function hash() {

        $model = $this->model('User');
        $error = '';
        $message = '';



        if (isset($_POST['email']) && isset($_POST['password']) && isset($POST['confirm_password']) && isset($_POST['hash'])) {
            if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['hash'])) {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirmPassword'];
                $hash = $_POST['hash'];

                echo 'test';

                if ($password == $confirmPassword) {
                    // Passwords match

                    if ($user = $model->getByEmail($email)) {
                        $dbHash = $model->getRecoveryHash($user->getId());

                        echo 'it is hitting here passwords match';

                        if ($hash == $dbHash) {
                            // Hashes Match
                            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                            echo 'it is hitting here hashes match';


                            if ($model->updatePassword($user->getId(), $passwordHash)) {
                                // User password updated.
                                $message = 'Your details have now been changed';
                                echo 'it is hitting here';
                            }

                        } else {
                            $error = 'Hashes do not match';
                        }
                    } else {
                        $error = 'Email does not exist in our records';
                    }


                } else {
                    $error = 'Passwords do not match.';
                }


            }
        }

        $this->view('login/hash', [
            'error' => $error,
            $message => $message
        ]);
    }
}