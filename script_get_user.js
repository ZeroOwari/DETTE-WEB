var xhr = new XMLHttpRequest();
var url = 'ajax/get_user.php'; 
xhr.open("GET", url, true);
xhr.onload = function() {
     // Parse the JSON response
     var response = JSON.parse(xhr.responseText);
     console.log(response);
     // Display the user data in the form
     document.getElementById("nom").value = response['nom'];
     document.getElementById("prenom").value = response['prenom'];
     document.getElementById("email").value = response['email'];

}

xhr.onerror = function() {
    document.getElementById("error").innerText = "Network error. Unable to connect to the server.";
};

// Send the request
xhr.send();