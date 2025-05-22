function validateForm() {
	var name = document.getElementById("input1").value;
	var email = document.getElementById("input2").value;
	var pwd = document.getElementById("input3").value;
	var cpwd = document.getElementById("input4").value;

	var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
	var letters = /^[A-Za-z]+$/;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    document.querySelector(".fullname-error").style.display= "none";
    document.querySelector(".email-error").style.display = "none";
    document.querySelector(".password-error").style.display = "none";
    document.querySelector(".cpassword-error").style.display = "none";
    document.querySelector(".success").style.display="none";

	if (name === "") {
        document.querySelector(".fullname-error").innerHTML = "Please enter your name";
        document.querySelector(".fullname-error").style.display= "block";
	return false;
	} else if (email === "") {
        document.querySelector(".email-error").innerHTML="Please enter your user email id";
        document.querySelector(".email-error").style.display = "block";
	return false;
	} else if (!filter.test(email)) {
        document.querySelector(".email-error").innerHTML="Invalid email";
        document.querySelector(".email-error").style.display = "block";
	return false;
	} else if (pwd === "") {
        document.querySelector(".password-error").innerHTML="Please enter Password";
        document.querySelector(".password-error").style.display = "block";
	return false;
	} else if (cpwd === "") {
        document.querySelector(".cpassword-error").innerHTML="Enter Confirm Password";
        document.querySelector(".cpassword-error").style.display = "block";
    return false;
	} else if (!pwd_expression.test(pwd)) {
        document.querySelector(".password-error").innerHTML="Upper case, Lower case, Special character, and Numeric letter are required in the Password field";
    document.querySelector(".password-error").style.display = "block";
	return false;
	} else if (pwd !== cpwd) {
        document.querySelector(".cpassword-error").innerHTML="Password not Matched";
        document.querySelector(".cpassword-error").style.display = "block";
	return false;
	} else if (pwd.length < 6) {
        document.querySelector(".password-error").innerHTML="Password minimum length is 6";
        document.querySelector(".password-error").style.display = "block";
	return false;
	} else if (pwd.length > 12) {
        document.querySelector(".password-error").innerHTML="Password maximum length is 12";
        document.querySelector(".password-error").style.display = "block";
	return false;
	} else {
        document.querySelector(".success").innerHTML="Thank You for Signing Up";
        document.querySelector(".success").style.display="block";
	return true;
	}
  }
  
	function clearFunc()
	{
		document.getElementById("input1").value="";
		document.getElementById("input2").value="";
		document.getElementById("input3").value="";
		document.getElementById("input4").value="";
		document.getElementById("input5").value="";
	}