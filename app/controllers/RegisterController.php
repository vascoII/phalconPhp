<?php

class RegisterController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function registeredAction()
    {
        $users = Users::find();
        $this->view->setParamToView('users', $users);
    }

    public function registerAction()
    {
        $user = new Users();

        // Store and check for errors
        $success = $user->save(
            $this->request->getPost(),
            [
                "name",
                "email",
            ]
        );

        if ($success) {
            echo "Thanks for registering!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }

}

