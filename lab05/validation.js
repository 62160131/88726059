function formValidation(){
    var uid = document.registfrom.userid;
    var passid = document.redistform.userid;
    var uname = document.redistform.username;
    var uadd = document.redistform.address;
    var ucountry = document.redistform.country;
    var uzip = document.redistform.zip;
    var uemail = document.redistform.email;
    var usex = document.redistform.sex;

    if(validateUserID(uid, 5, 12)){
        if(validatePassword(passid, 7, 12)){
            if(allLeter(uname)){
                if(alphanumeric(uadd)){
                    if(countryselect(ucountry)){
                        if(allnumeric(uzip)){
                            if(validateEmail(uemail)){
                                if(validateGender(usex)){}
                            }
                        }
                    }
                }
            }
        }
    }
    return false;
}

function validateUserID(uid, min, max){
    var error = "";
    var illegalChars = /\W/; //allow letters, numbers, and underscorres

    if(uid.value==""){
        uid.style.backgroud = 'Yellow';
        error = "กรุณาป้อน User ID\n";
        alert(error);
        uid.focus();
        return false;
    }else if ((uid.value.length < min) || (uid.value.length > max)){
        uid.style.backgroud='Yellow';
        error = "User Id ต้องมีความยาว " + min + "-" + max + "ตัวอักษร\n";
        alert(error);
        uid.focus();
        return false;
    }else {
        uid.style.backgroud = 'White';
    }
    return true;
}

function validatePassword(uid, min, max){
    var error = "";
    var illegalChars = /\W/; //allow only letters and numbers,

    if(passid.value==""){
        passid.style.backgroud = 'Yellow';
        error = "กรุณาป้อน Password\n";
        alert(error);
        passid.focus();
        return false;
    }else if ((passid.value.length < 7) || (passid.value.length > 15)){
        error = "User Id ต้องมีความยาว " + min + "-" + max + "ตัวอักษร\n";
        passid.style.backgroud='Yellow';
        alert(error);
        passid.focus();
        return false;
    }else if (illegalChars.test(passid.value)){
        error = "Password มีตัวอักษรที่ไม่ได้รับอนุญาติ\n";
        passid.style.backgroud='Yellow';
        alert(error);
        passid.focus();
        return false;
    }else if ((passid.value.search(/[a-zA-Z]+/) == -1) || (passid.value.search(/[0-9]+/ == -1)) {
        error = "password ต้องมีตัวเลขอย่าน้อย 1 ตัว \n";
        passid.style.backgroud = 'Yellow';
        alert(error);
        passid.focus();
        return false;
    }else{
        passid.style.backgroud = 'White';
    }
    return true;

    function allLeter(uname){
        var letters = /^[A-Za-z]+$/;
        if(uname.value.match(letters)){
            return true;
        }else{
            alert('Username ต้องเป็นตัวอักษรเท่านั้น');
            uname.focus();
            return false;
        }
    }

    function alphanumeric(uaddr){
        var letters = /^[0-9a-zA-Z]+$/;
        if(uname.value.match(letters)){
            return true;
        }else{
            alert('Address ต้องเป็นตัวอักษรหรือตัวเลขเท่านั้น');
            uname.focus();
            return false;
        }
    }

    function countryselect(ucountry){
        if(ucountry.value == "Default") {
            alert('กรุณาเลือก Country');
            ucountry.focus();
            return true;
        }else{
            return false;
        }
    }

    function allnumeric(uzip){
        var numbers = /^[0-9]+$/;
        if(uzip.value.match(numbers)){
            return true;
        }else{
            alert('ZIP Code ต้องเป็นตัวเลขเท่านั้น');
            uzip.focus();
            return false;
        }
    }

    function validateEmail(uemail){
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\_])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!filter.test(uemail.value)){
            alert('Email ไม่ถูกต้อง');
            uemail.focus;
            return true;
        }else{
            return false;
        }
    }

    function validateGender(usex){
        var x = 0
        for(i=0; i<usex.length; i++){
            //alert(usex[i].checked)
            if(usex[i].checked)
            x++
        }
        if(x==0){
            alert('กรุณาเลือกเพศ');
            return false;
        }else{
            alert('Form Successfully Submitted');
            //window.location.reload()
            //return true;
        }
    }


}