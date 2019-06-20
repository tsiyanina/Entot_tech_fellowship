var people ={
    username: "tsion",
    password: "1234"
}


function getInfo(){
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;

if(username == people.username && password == people.password )
{
    window.location.href='./home.html'
    //  alert("Check Your Password is so goooooooooooood")
}
else{
    alert("Check Your Password")
}
}