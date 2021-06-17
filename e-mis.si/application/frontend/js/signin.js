function check(form)
{

if(form.email.value == "info@e-mis.com" && form.pwd.value == "emis")
{
	return true;
}
else
{
	alert("Error Password or Username")
	return false;
}
}