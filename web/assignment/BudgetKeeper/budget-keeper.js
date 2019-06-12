function chPw() {
    var pw1 = $('.Password').val();
    var pw2 = $('.Repassword').val();
    $.ajax({
        type: "POST",
        url: "signUp.php",
        data: {pw1:pw1, pw2:pw2},
        success: function(result) {
            if (pw1 != pw2) {
                alert('Password is not matched!');
            }
            alert(result);
        }
    });
}

function total() {
    
}