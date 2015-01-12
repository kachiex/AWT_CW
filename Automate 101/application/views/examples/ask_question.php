<!DOCTYPE html>
<html>

    <head>
        <script src="/EasyAL/js/jquery.min.js" language="JavaScript"></script>
        <script src="/EasyAL/js/jquery-1.8.2.js" language="JavaScript"></script>
        <script src="/EasyAL/js/doc.js" language="JavaScript"></script>
        <link rel="stylesheet" href="/EasyAL/css/textext.core.css" type="text/css" />
        <link rel="stylesheet" href="/EasyAL/css/textext.plugin.tags.css" type="text/css" />
        <link rel="stylesheet" href="/EasyAL/css/textext.plugin.autocomplete.css" type="text/css" />
        <script src="/EasyAL/js/textext.core.js" language="JavaScript"></script>
        <script src="/EasyAL/js/textext.plugin.tags.js" language="JavaScript"></script>
        <script src="/EasyAL/js/textext.plugin.autocomplete.js" language="JavaScript"></script>
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


        .description { width: 600px; height: 100px }

        /*
        table, th, td {
            border: 1px solid black;
            size: 100%
        }
        */

    </style>   

    <body onload="getSubCat();">
        <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
        <?php
        include ("main_page.php");
        ?>
        <div id="site_body"> 

            <fieldset>
                <legend>Ask Question</legend>
                <table>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" id="title" name="title" value="" ></td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>
                            <select id="subject" name="subject" onchange="changeTags()">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td><input type="text" id="year" name="year" value="" ></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea class="description" id="description" name="description" rows="4" cols="500"></textarea></td>
                    </tr>
                    <tr>
                        <td>Upload Image</td>
                        <td><input type="file"  id="quesImage" name="quesImage" value="Browse" ></td>
                    </tr>
                    <tr>
                        <td>Tags</td>
                        <td><input  type="text"  id="tags" name="tags"  ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right">
                            <input class="btn" type="button" value="Cancel">
                            <input class="btn" id="postquestion" name="postquestion" type="button" value="Post Question">
                            <input class="btn" type="button" value="Cancel" onclick="check()">

                        </td>
                    </tr>
                </table>   
                <div id="searchresult" style="font-size: 24pt"></div>
            </fieldset>
        </div>
    </body>

    <script language="javascript">
        
        
        $('#postquestion').click(function () {
            var arrayTag = $('#tags').textext()[0].tags()._formData;
            var tagJSON =JSON.parse(JSON.stringify(arrayTag));
            alert(tagJSON);
            
            thefinalURL = '/EasyAL/index.php/question/' +
                    '/title/' + $('#title').val() +
                    '/subject/' + $('#subject').val() +
                    '/year/' + $('#year').val() +
                    '/description/' + $('#description').val() +
                    '/quesImage/' + $('#quesImage').val() +
                    '/username/' + $('#username').val() +
                    '/tags/' + jQuery.param(tagJSON);
            
            alert(thefinalURL);
            
            addsubcatURL = '/EasyAL/index.php/populateData/' +
                    '/subject/' + $('#subject').val() +
                    '/tags/' + jQuery.param(JSON.stringify(arrayTag));

            $.ajax({
                url: thefinalURL,
                success: function (data) {
                    $('#searchresult').html(data);
                    alert(data);
                },
                async: true,
                type: "PUT"
            });
            
            $.ajax({
                url: addsubcatURL,
                success: function (data) {
                    alert(data);
                },
                async: true,
                type: "ADDSUBTAG"
            });


        });


        function getSubCat() {
            //alert('getSubCat');
            thefinalURL = '/EasyAL/index.php/populateData';
            alert(thefinalURL);

            $.ajax({
                url: thefinalURL,
                success: function (data) {
                    categories = jQuery.parseJSON(data);

                    //categories[1].subCat;

                    var $select = $('#subject');
                    $select.find('option').remove();
                    $.each(categories, function (key, value)
                    {
                        $select.append('<option value=' + value.subCat + '>' + value.subCatDesc + '</option>');
                    });
                    getSubTag();
//                    $('#searchresult').html(data);
//
//                    alert(data);
                },
                async: true,
                type: "GETSUBCAT"
            });
        }

        var tags = [];


        function changeTags() {
            tags = [];
            document.getElementById("tags").value = "";
            getSubTag();
        }

        function getSubTag() {
            //alert('subtag');
            thefinalURL = '/EasyAL/index.php/populateData/' +
                    '/subCat/' + $('#subject').val();
            alert(thefinalURL);

            $.ajax({
                url: thefinalURL,
                success: function (data) {
                    alert(data);

                    categories = jQuery.parseJSON(data);

                    //categories[1].subCat;

                    $.each(categories, function (key, value)
                    {
                        tags.push(value.subTag);
                    });

                },
                async: true,
                type: "GETSUBTAG"
            });
        }


        var temp = '';
        $('#tags')
                .textext({
                    plugins: 'tags autocomplete'
                })
                .bind('getSuggestions', function (e, data)
                {
                    var list = tags;

                    textext = $(e.target).textext()[0],
                            query = (data ? data.query : '') || ''
                            ;
                     
                    temp =   
                    $(this).trigger(
                            'setSuggestions',
                            {result: textext.itemManager().filter(list, query)}
                    );
                       
                });
                
                //check the tag values
                function check(){
                    //alert(JSON.parse($('#tags').textext()[0].hiddenInput().val()));
//                    var arr = [];
//                    var $arraytag = new Array();
//                    $arraytag = JSON.parse(($('#tags').textext()[0].hiddenInput().val())).toString();
//                    var strings = $arraytag.split(",");
//                    for (var i=0; i<$arraytag.length; i++){
//                        arr.push( + strings[i] );
//                    }
//                    alert(arr[1]);
                    
                    var strVale = $('#tags').textext()[0].tags()._formData;
                    alert(JSON.stringify(strVale));
                    
                    alert('res-> '+strVale[0]);
                    
                }
    </script>

</html>