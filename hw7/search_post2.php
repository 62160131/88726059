<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><font size="12px">Searchsong</font><br><br>
    <input typ="text" id="kw">
    <button onclick="search()">Search</button>
    <select id="typ">
            <option value='0'>ปีที่ออกอัลบั้ม</option>
        <?php
        // connect database 

        $connect = mysqli_connect("localhost", "root", "", "song"); 



        $sql = "SELECT * FROM `album` ORDER BY `album`.`ReleaseYear` ASC";

        $result = mysqli_query($connect, $sql);

        while($row = $result->fetch_object())
        {
             echo "<option value='$row->NameAlbum'>$row->ReleaseYear</option>";
        }

    ?>
        </select>
    <div id="disp"></div>
    <body>
        <body bgcolor="#D2B48C">
    
    
    <script>
        function nl2br(str,is_xhtml){
        var breakTag = (is_xhtml || typeof is_xhtml == 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g,'$1' + breakTag + '$2');
    }
        function search() {
            kw = document.getElementById('kw').value;
            typ = document.getElementById('typ').value;
            console.log("kw=" + kw);
            console.log("typ=" + typ);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // document.getElementById('disp').innerHTML = this.responseText;
                    arr = JSON.parse(this.responseText);
                    console.log(arr);
                    if (arr.length == 0) {
                        document.getElementById('disp').innerHTML = "Not found";
                    } else {
                        html = "";
                        for (i = 0; i < arr.length; i++) {
                            html += arr[i].NameSong + "," + arr[i].NameArtist  + "<br>"+
                            nl2br(arr[i].Lyric)+"<br>" ;
                        }
                        document.getElementById('disp').innerHTML = html;
                    }
                }
            }
        parameters = "kw=" + kw + "&typ=" + typ;
        xmlhttp.open("post", "search_post.php");
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(parameters);
        }
    </script></center></body>

</body>
</html>
