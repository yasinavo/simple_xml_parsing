<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<body>
  <script language="javascript" type="text/javascript">
<!--
//Browser Support Code
function getMeetingData(){
   var ajaxRequest;  // The variable that makes Ajax possible!
   try{

      // Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
   }catch (e){

      // Internet Explorer Browsers
      try{
         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {

         try{
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){

            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }

   // Input field validation
   if(this.fname.value == "") {
         alert("Please enter file number");
         return false;
       }


       if (isNaN(this.fname.value))
       {
         alert("File name contains only numbers, please check.");
         return false;
       }
   // Create a function that will receive data
   // sent from the server and will update
   // div section in the same page.
   ajaxRequest.onreadystatechange = function(){

      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('ajaxDiv');
         ajaxDisplay.innerHTML = ajaxRequest.responseText;
        //  var res = ajaxRequest.responseText;
        //  var result = JSON.parse(res);
        //  ajaxDisplay.innerHTML = JSON.stringify(result);
        //  for (var prop in result) {
        //    console.log(prop + " : "+ result[prop]);
        //  }
      }
   }

   // Now get the value from user and pass it to
   // server script.
   var fname = document.getElementById('fname').value;

   var queryString = "?fname=" + fname ;

   ajaxRequest.open("GET", "getfile.php" + queryString, true);
   ajaxRequest.send(null);
}
//-->
</script>

<form name='myForm'>
    <input name="meeting" id="fname"/>

<input type='button' onclick='getMeetingData()' value='Get Meeting Data'/>

    </form>

    <div id='ajaxDiv'>Your result will display here</div>
</body>
</html>
