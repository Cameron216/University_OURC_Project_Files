//validate function
function validate(){
//declare varibles for each form field
	var jrunnerid = document.forms["submitrunnertime"]["RunnerID"].value;
	var jeventid = document.forms["submitrunnertime"]["EventID"].value;
	var jdate = document.forms["submitrunnertime"]["Date"].value;
	var jfinishtime = document.forms["submitrunnertime"]["FinishTime"].value;
	var jposition = document.forms["submitrunnertime"]["Position"].value;
	var jcategoryid = document.forms["submitrunnertime"]["CategoryID"].value;
	var jagegrade = document.forms["submitrunnertime"]["AgeGrade"].value;
	var jpb = document.forms["submitrunnertime"]["PB"].value;

//message to be returned to user
	var message = "These details are entered incorrectly: ";

//varible to decide if form fields are entered in correctly
	var problem = false;

//test for each form field to see if they are the correct format. If value is not requied then set a default value
	if(!jrunnerid.match(/^[1-9]+$/)){
		message = message + "\n Runner ID must be a number between 1-9999";
		problem = true;
	}


	if(!jeventid.match(/^[1-9]+$/)){
		message = message + "\n Event ID must be a number between 1-9999";
		problem = true;
	}


	if(!jdate.match(/\d{4}\-\d{1,2}\-\d{1,2}/)){
		message = message + "\n Date must be in the form of YYYY-MM-DD";
		problem = true;
	}


	if(!jfinishtime.match(/\d{1,2}\:\d{1,2}\:\d{1,2}/)){
		message = message + "\n Finish Time must be in the form of HH:MM:SS";
		problem = true;
	}


	if(!jposition.match(/^([1-9][0-9]{0,3}|10000)$/)){
		if(jposition.match(/^$/)){
			var pos = document.getElementById("position");
			pos.value = "-1";
		}else{
			message = message + "\n Position must be a number between 1-10000";
			problem = true;
		}
	}


	if(!jcategoryid.match(/^([1-9]|10)$/)){
		if(jcategoryid.match(/^$/)){
			var cat = document.getElementById("categoryid");
			cat.value = "-1";
		}else{
			message = message + "\n Category ID must be a number between 1-10";
			problem = true;
		}
	}


	if(!jagegrade.match(/^[0-9]+\.[0-9]{2}$/ || "-1")){
		if(jagegrade.match(/^$/)){
			var age = document.getElementById("agegrade");
			age.value = "-1";
		}else{
			message = message + "\n Age Grade must be in for form of a number with maximum 2 decimal places";
			problem = true;
		}
	}


	if(!jpb.match(/^[0-1]/)){
		if(jpb.match(/^$/)){
			var pb = document.getElementById("pb");
			pb.value = "0";
		}else{
			message = message + "\n PB must be in the form of: 1 for true, or 0 for false";
			problem = true;
		}
	}


//returns message if problem is = true
	if(problem){
		alert(message);
		return false;
	}
}