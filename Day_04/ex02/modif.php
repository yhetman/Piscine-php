<?php
    function error_occured()
    {
        echo "ERROR!\n";
        exit;
    }
    if ($_POST['submit'] && $_POST['submit'] === "OK")
    {
        if ($_POST['login'])
        {
            if (!(file_exists("../private")))
                mkdir("../private", 0777, true);
            if(!$_POST['oldpw'])
            {
                error_occured();
            }
            if ($_POST['newpw'])
            {
                $users = unserialize(file_get_contents('../private/passwd'));
                $exist = false;
                foreach ($users as $key => $value)
                {
                    if ($value['login'] === $_POST['login'] && $value['passwd'] === hash('whirlpool', $_POST['oldpw']))
                    {
                        $exist = true;
                        $users[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
                    }
                }
            }
        }
        else
            error_occured();
        if ($exist)
        {
            file_put_contents('../private/passwd', serialize($users));
            echo "OK\n";
        }
        else
            error_occured();
    }
    else
        error_occured();
?>