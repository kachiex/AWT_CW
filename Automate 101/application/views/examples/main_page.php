<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap-combined.min.css" />
    </head>  

    <style type="text/css">
        //img {padding-left: 20%}

        #site_header {padding-left: 18%;
                      padding-right: 18%;
                      padding-top: 2%}
        #login {}

        #site_header {

            border: 1px solid #ccc;
            background-color: #f3f3f9;
        }
        /*
        table, th, td {
            border: 1px solid black;
            size: 100%
        }
        */

    </style>   

    <body >  

        <div id="site_header">
            <table style="width:100%">  

                <tr>
                    <td style="width:22%">
                        <img src="http://localhost/EasyAL/images//mig.jpg" alt="Mountain View" style="width:304px;height:75px">
                    </td>
                    <td style="width:10%" align="center">
                        <input type="button" id="questions" name="questions" onclick="questions()" value="Questions">
                    </td>
                    <td style="width:50%">
                        <input type="button" id="ask_questions" name="ask_questions" onclick="askquestions()" value="Ask Questions">
                        
                    </td>
                    <td align="right">
                        <h3><?php  echo $username;  ?><h3>
                        <img src="http://localhost/EasyAL/images//profile_icon.png" alt="Profile" onclick="userprofile()" style="width:50px;height:50px">
                    </td>
                    <td align="right">
                        <?php
                        if($username == NULL){
                        ?>
                            <input type="button" name="login" value="Login"  onclick="login()">
                        <?php
                        }else{
                        ?>
                            <input type="button" name="logout" value="Logout"  onclick="logout()">
                        <?php
                        }
                        ?>    
                    </td>
                </tr>   
                <tr>

                </tr>    
                <tr>
                    <td colspan="3">
                        <input type="text" name="question" placeholder="Search" style="width:60%"/>
                        <select style="width:10%">
                            <option value="MATH">Math</option>
                            <option value="SCI">Science</option>
                            <option value="HIS">History</option>
                        </select>
                        <input type="submit" name="Search" value="Search">
                    </td>  
                    <td colspan="2" align="right">
                        <input type="button" name="gen_mock_paper" onclick="genmockpaper()" value="Generate Mock Paper">
                    </td>  
                </tr>

            </table>
        </div>

    </body>

    <script lang="javascript">

        function login() {
            location.href = "/EasyAL/index.php/auth/login";
        }
        
        function logout(){
            location.href = "/EasyAL/index.php/auth/logout";
        }

        function userprofile() {
            location.href = "/EasyAL/index.php/auth/userProfile";
        }
        
        function askquestions(){
            location.href = "/EasyAL/index.php/auth/askQuestion";
        }


    </script>

</html>
