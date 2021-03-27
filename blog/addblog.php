<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../favicon.ico">
    <title>blog</title>
    <!-- Bootstrap core CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<b style=color:rgb(128,102,73)>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> 
    <div class="container">
    <?php include 'menu.php' ?>

    <form id="frmAddBlog" action="" method="post" enctype="multipart/form-data">
        <div style="padding-left: 10px; padding-right: 10px;">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                            <br>
                            <div class="mb-3">
                                <label class="form-label">หัวข้อ</label>
                                <input type="text" class="form-control" id="head" name="head" value="">
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">โปรดเลือกไฟล์</label>
                                <input class="form-control" type="file" id="fileImg" name="fileImg" value="">
                            </div>
                            <br>
                            <div class="mb-3">
                                <label class="form-label">เนื้อหา</label>
                                <textarea class="form-control" id="editor1" name="editor1" rows="3"></textarea>
                            </div>
                            <br>
                            <button class="btn btn-Dark" onclick="return getText()">เพิ่ม</button>

                    </div>
                </div>
            </div>
        </div>
    </form>

        <hr>
    </div>
    <!--/.container-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>

        var d = document;
        // window.onload =()=> {
        //     //   CKEDITOR.config.height = 400;
        //     //   CKEDITOR.replace("editor1");
        // };

        function getText(){

            if(d.getElementById('head').value == "") { alert("โปรดกรอกข้อมูล หัวข้อ"); return false; }
            if(d.getElementById('fileImg').value == "") { alert("โปรดเพิ่มรูปภาพ"); return false; } 
            if(d.getElementById('editor1').value == "") { alert("โปรดกรอกข้อมูล เนื้อหา"); return false; } 
            
            $("#frmAddBlog").submit(function(event) {
                event.preventDefault();

                var formData = new FormData();
                var file = $('#fileImg')[0].files;

                formData.append('file',file[0]);
                formData.append('head',d.getElementById('head').value);
                formData.append('editor1',d.getElementById('editor1').value);
                
                $.ajax({
                    type: "POST",
                    url: "save_blog.php",
                    data: formData,
                    processData: false, //Not to process data
                    contentType: false, //Not to set contentType
                    success: function(data){

                        if(data=="add_success"){
                            alert("เพิ่มสำเร็จ!");
                            window.location.reload();
                        }else{
                            alert("ไม่สำเร็จ");
                        }

                    }
                });
    
            });

        }

        // โค้ดเดิม
        // function getText_(){
        //     let desc = d.getElementById("editor1").value;
        //     let head = d.getElementById("head").value;
        //     // let img = d.getElementById("fileImg").files[0];
        //     // let form = new Form();
        //     //form.append("img",img);
        //     if(desc==""||head==""){
        //         alert("โปรดกรอกข้อมูลไอ้ควย");
        //     }else{
        //         $.ajax({
        //             method :"POST",
        //             url: location.origin+"/BLOG/database/exe_db.php",
        //             type : "application/x-www-form-urlencoded;charset=utf-8",
        //             data :{"desc":desc,"head":head}
        //         }).done((response)=>{
        //             if(String(response)=="add_success"){
        //                     alert("เพิ่มสำเร็จ!");
        //             }else{
        //                     alert("ไม่สำเร็จ");
        //             }
        //         });
        //     }
        // }

    </script>
</body>
</html>

