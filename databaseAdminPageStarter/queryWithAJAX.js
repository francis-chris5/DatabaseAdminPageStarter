


	/*
	 * AJAX := Asynchronous JavaScript And XML
	 * LINE NUMBER:
	 * 15.) get value from text-area
	 * 16.) make reference to output region element
	 * 17.) create a request for data from the server object
	 * 18.) create the request in a POST method (runQuery script -> request a string, set equal to query in text-area
	 * 19.) send the request just created
	 * 20 - 21.) check for ready state:  if : 4 = complete, 200 = connection made and ready, ( https://www.w3schools.com/xml/ajax_xmlhttprequest_response.asp follow link to full list of server codes)
	 * 22.) print the response from the server in the output region element
	 */
function runQuery(){
    let query = document.getElementById('query').value;
    let results = document.getElementById('results');
    let request = new XMLHttpRequest();
	request.open("POST", "runQuery.php?query=" + query, true);
	request.send();
	request.onreadystatechange = function(){
		if(request.readyState == 4 && request.status == 200){
			results.innerHTML = request.responseText;
		}
	}
}//end runQuery()




	/*
	 * This just resets the page to the initial load condition
	 */
function resetQuery(){
    let query = document.getElementById('query');
    let results = document.getElementById('results');
    query.value = "";
    results.innerHTML = "(Query Results Will Go Here)";
}//end resetQuery()
