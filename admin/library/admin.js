// JavaScript Document

function validateForm()
{
var x=document.forms["form2"]["txtusername"].value;
if (x==null || x=="")
  {
  alert("Username must be filled out");
  return false;
  }
var x=document.forms["form2"]["txtpassword"].value;
if (x==null || x=="")
  {
  alert("Password must be filled out");
  return false;
  }
}

