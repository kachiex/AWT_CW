<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap-combined.min.css" />
    </head>  

    <style type="text/css">
        //img {padding-left: 20%}

        #site_body {padding-left: 18%;
                    padding-right: 18%;
                    padding-top: 2%}
        #login {}

        .btn {
            background: #3498db;
            background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
            background-image: -moz-linear-gradient(top, #3498db, #2980b9);
            background-image: -ms-linear-gradient(top, #3498db, #2980b9);
            background-image: -o-linear-gradient(top, #3498db, #2980b9);
            background-image: linear-gradient(to bottom, #3498db, #2980b9);
            -webkit-border-radius: 28;
            -moz-border-radius: 28;
            border-radius: 28px;
            font-family: Arial;
            color: #ffffff;
            font-size: 12px;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
        }

        .btn:hover {
            background: #3cb0fd;
            background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
            background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
            text-decoration: none;
        }

        #site_body {
            border: 1px solid #ccc;
            background-color: #f3f3f3;
        }

        /*
        table, th, td {
            border: 1px solid black;
            size: 100%
        }
        */

    </style>   

    <body>
        
        <?php 
        include ("main_page.php"); 
        ?>
        <div id="site_body"> 
            <table>  
                <tr>
                    <td>
                        <form action="/EasyAL/index.php/auth/register" method="POST">
                            <fieldset>
                                <legend>Sign Up</legend>
                                <table>
                                    <tr>
                                        <td>Email / Username</td>
                                        <td><input type="text" name="uname" id="uname" value="" placeholder="Enter Email / Username"></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input type="password" name="pword" id="pword" value="" placeholder="Enter Password"></td>
                                    </tr>
                                    <tr>
                                        <td>Re-enter Password</td>
                                        <td><input type="password" name="re_pword" id="re_pword" value="" placeholder="Re-enter Password"></td>
                                    </tr>
                                    <tr>
                                        <td>User Type</td>
                                        <td><select id="user_type" name="user_type">
                                                <option value="stu">Student</option>
                                                <option value="lec">Lecturer / Teacher</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><input type="text" name="name" id="name" value="" placeholder="Enter User's Name"></td>
                                    </tr>
                                    <tr>
                                        <td>Expertise / Subjects</td>
                                        <td><input type="text" name="subCat" id="subCat" value="" placeholder="Enter User's Expertise / Subjects"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td align="right" ><input class="btn" type="submit" value="Sign Up"></td>
                                    </tr>
                                </table>    
                            </fieldset>
                        </form>
                    </td>

                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                    <td valign='top'>
                        <form action="/EasyAL/index.php/auth/authenticate" method="POST">
                            <fieldset>
                                <legend>Sign In</legend>
                                <table>
                                    <tr>
                                        <td>Email / Username</td>
                                        <td><input type="text" id="uname" name="uname" value="" placeholder="Enter Email / Username"></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input type="password" id="pword" name="pword" value="" placeholder="Enter Password"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="remember" class="pure-checkbox">
                                                <input id="remember" type="checkbox"> Remember me
                                            </label></td>
                                        <td align="right"><input class="btn" type="submit" value="Sign In"></td>
                                    </tr>
                                </table>    
                            </fieldset>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <span style="color: red"><?php echo $username ?></span> <br>

    </body>
</html>