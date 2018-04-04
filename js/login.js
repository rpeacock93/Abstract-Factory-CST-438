var userData = [
    {'fName':'Seema', 'lName' : 'Khan', 'age': 21, 'gender': 'F', 'profilePic': '../pix/seema.jpeg', 'city' : 'San Diego', 'address' : '123 Cool'
    , 'Bio': 'I like technology!', 'userIndex' : 1, 'username': 'seema', 'password': 'tech', 'state' : 'CA', 'zip' : '92092', 'admin' : 1},
    {'fName':'INSERT_FIRST_NAME', 'lName' : 'INSERT_LAST_NAME', 'age': 21, 'gender': 'M', 'phone': '000-000-0000', 'profilePic': '../pix/INSERT_PIC_NAME.jpeg', 'city' : 'INSERT_CITY', 'address' : 'INSERT_ADDRESS'
    , 'Bio': 'INSERT_BIO', 'userIndex' : 2, 'username': 'INSERT_FIRST_NAME_LOWERCASE', 'password': 'INSERT_PASSWORD', 'state' : 'CA', 'zip' : '12345', 'admin' : 0}
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
        window.location.href = 'home.html';
    }
    else {
        invalidAccountWarning.style.display = "block";
    }
    
});


