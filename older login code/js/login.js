var userData = [
    {'name':'admin', 'userIndex' : 1, 'username': 'admin', 'password': 'adminpassword', 'admin' : 1},
    {'name':'user1', 'userIndex' : 2, 'username': 'user1', 'password': 'password1', 'admin' : 0},
    {'name':'user2', 'userIndex' : 3, 'username': 'user2', 'password': 'password2', 'admin' : 0},
    {'name':'user3', 'userIndex' : 4, 'username': 'user3', 'password': 'password3', 'admin' : 0},
    {'name':'user4', 'userIndex' : 5, 'username': 'user4', 'password': 'password4', 'admin' : 0},
    {'name':'user5', 'userIndex' : 6, 'username': 'user5', 'password': 'password5', 'admin' : 0},
    {'name':'user6', 'userIndex' : 7, 'username': 'user6', 'password': 'password6', 'admin' : 0},
    {'name':'user7', 'userIndex' : 8, 'username': 'user7', 'password': 'password7', 'admin' : 0},
    {'name':'user8', 'userIndex' : 9, 'username': 'user8', 'password': 'password8', 'admin' : 0},
    {'name':'user9', 'userIndex' : 10, 'username': 'user9', 'password': 'password9', 'admin' : 0},
    ]

localStorage.setItem('userDataLocalStorage', JSON.stringify(userData));


$(function () {
    var invalidAccountWarning = document.getElementById("invalid_account_warning");
    invalidAccountWarning.style.display = "none";
});


$("#login").click(function() {
    var invalidAccountWarning = document.getElementById("invalid_account_warning");
    invalidAccountWarning.style.display = "none";
    var username = document.getElementById("inputted_username").value;
    var password = document.getElementById("inputted_password").value;
    var loggedInUserIndex = 0; 

    for (var i = 0; i < userData.length; i++) {
        var currData = userData[i]; 
        if(username == currData.username && password == currData.password)
           loggedInUserIndex = currData.userIndex;  
    }
    console.log(loggedInUserIndex);
    if(loggedInUserIndex != 0) {
        localStorage.setItem('loggedInUserIndex', loggedInUserIndex);
        console.log(loggedInUserIndex);
        //window.location.href = 'home.html';
        location.href = 'http://tro42.com/CST438/hurkle.php';
    }
    else {
        invalidAccountWarning.style.display = "block";
    }
    
});


