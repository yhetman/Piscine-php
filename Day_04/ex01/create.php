<?php
if ($_POST['submit'] && $_POST['submit'] === "OK")
{
    if ($_POST['login'])
    {
        if (!(file_exists("../private")))
            mkdir("../private", 0777, true);
        if (!$_POST['passwd'])
        {
            echo "ERROR!\n";
            exit;
        }
        $users = unserialize(file_get_contents("../private/passwd"));
        $login = $_POST['login'];
        $passwd = hash("whirlpool", $_POST['passwd']);
        foreach ($users as $loged_in)
        {
            if ($loged_in['login'] === $login)
            {
                echo "ERROR!\n";
                exit;
            }
        }
        $new_user = array('login' => $login, 'passwd' => $passwd);
        $users[] = $new_user;
        file_put_contents('../private/passwd', serialize($users));
        echo "OK\n";
    }
    else
    {
        echo "ERROR!\n";
        exit;
    }
}
else
{
    echo "ERROR!\n";
    exit;
}
?>