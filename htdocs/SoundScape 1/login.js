function validateForm() {
	var email = document.getElementById("input1").value;
	var pwd = document.getElementById("input2").value;

    document.querySelector(".email-error").style.display = "none";
    document.querySelector(".password-error").style.display = "none";
    if (email === "") {
        document.querySelector(".email-error").innerHTML="Please enter your user email id";
        document.querySelector(".email-error").style.display = "block";
	return false;
	}
    else if (!filter.test(email)) {
        document.querySelector(".email-error").innerHTML="Invalid email";
        document.querySelector(".email-error").style.display = "block";
	return false;
	} 
    else if (pwd === "") {
        document.querySelector(".password-error").innerHTML="Please enter Password";
        document.querySelector(".password-error").style.display = "block";
	return false;
	} 
    else 
    {
        document.querySelector(".success").innerHTML="Thank You for Signing Up";
        document.querySelector(".success").style.display="block";
	return true;
	}
  }