// Create a new XMLHttpRequest object
var xhr = new XMLHttpRequest();
var url = 'ajax/login_error.php'; // Ensure this is the correct path to your PHP script
xhr.open("GET", url, true);
xhr.onload = function() { 
    // Check if the request was successful
    if (xhr.status === 200) {
        try {
            // Parse the JSON response
            var response = JSON.parse(xhr.responseText);
            console.log(response);
            // Get the error element from the current page
            var errorElement = document.getElementById("error");
            // If there is an error message in the response, display it
            if (response && Object.keys(response).length > 0) {
                // Assuming the errors are an object with key-value pairs
                var errorMessages = Object.values(response).join(', ');
                errorElement.innerText = errorMessages;
            } else {
                errorElement.innerText = "";
            }
        } catch(e) {
            // Handle JSON parsing error
            console.error("Could not parse JSON response", e);
        }
    }
};

// Handle network errors
xhr.onerror = function() {
    document.getElementById("error").innerText = "Network error. Unable to connect to the server.";
};

// Send the request
xhr.send();
