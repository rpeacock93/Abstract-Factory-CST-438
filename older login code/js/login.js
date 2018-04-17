// Author: Seema Khan
// The Design Patter implemented is the Factory Method: http://www.dofactory.com/javascript/factory-method-design-pattern
function Factory() {
    this.createEmployee = function (type, index) {
        var employee;
 
        if (type === "admin") {
            employee = new Admin(index);
        } else if (type === "common") {
            employee = new Common(index);
        }
 
        employee.type = type;
 
        employee.say = function () {
        	if(this.adminPrivilege == 1) {
            	log.add("User has admin privileges!");
        	} else {
        		log.add("User does not have admin privileges.");
        	}
        }
 
        return employee;
    }
}
 
var Admin = function (index) {
    this.name = "admin";
    this.userIndex = index;
    this.username = "admin";
    this.password = "adminpassword";
    this.adminPrivilege = 1;
};
 
var Common = function (index) {
    this.name = "user"+(index-1);
    this.userIndex = index;
    this.username = "user"+(index-1);
    this.password = "password"+(index-1);
    this.adminPrivilege = 0;
};


$(function () {
    var invalidAccountWarning = document.getElementById("invalid_account_warning");
    invalidAccountWarning.style.display = "none";
});


$("#login").click(function() {
	var employees = [];
    var factory = new Factory();
 
    employees.push(factory.createEmployee("admin",1));
    employees.push(factory.createEmployee("common",2));
    employees.push(factory.createEmployee("common",3));
    employees.push(factory.createEmployee("common",4));
    employees.push(factory.createEmployee("common",5));
    employees.push(factory.createEmployee("common",6));
    employees.push(factory.createEmployee("common",7));
    employees.push(factory.createEmployee("common",8));
    employees.push(factory.createEmployee("common",9));
    employees.push(factory.createEmployee("common",10));

    var userDataString = JSON.stringify(employees);
    localStorage.setItem('userDataLocalStorage', userDataString);
    userData = JSON.parse(userDataString);
    console.log(userData); 

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


