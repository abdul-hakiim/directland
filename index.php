<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abdul Hakiim Rosli</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){   //jQuery function that waits for the document to be ready before executing code inside the function
            //first block
            $("#postcode").change(function(){   //event listener that listen for a change event for element id postcode
                var postcode = $(this).val();   //getting the value of postcode input field and store it in a variable
                $.ajax({    //jQuery function that creates an AJAX request to the server
                    url: "get_state.php",   //specifies the URL of the server-side script that handle the AJAX request to the server
                    type: "POST",   //specifies the type of the request which is POST
                    data: {postcode: postcode}, //sending the poscode value as data to the server-side
                    success: function(data){    //callback function that will execute if server successfully respond to request
                        $("#state").val(data);  //set the value of the state input field to the data returned by the server
                    }
                });
            });
            //second block which is particularly same as first block
            $("#submit_btn").click(function(e){
                e.preventDefault();     //prevent the default form submission behaviour
                var name = $("#name").val();
                var dob = $("#dob").val();
                var address = $("#address").val();
                var postcode = $("#postcode").val();
                var state = $("#state").val();
                $.ajax({
                    url: "submit.php",
                    type: "POST",
                    data: {name: name, dob: dob, address: address, postcode: postcode, state: state},
                    success: function(data){
                        alert("Data submitted successfully!");  //pop up notification
                    }
                });
            });
        });
    </script>

    <style>
        h1 {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        /* Form styling */
        form {
            width: 500px;
            margin: auto;
            padding: 20px;
            background-color: #f2f2f2;
        }

        /* Label styling */
        label {
            display: block;
            font-size: 20px;
            margin-bottom: 10px;
        }

        /* Input styling */
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Submit button styling */
        button[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        /* Disabled input styling */
        input[disabled] {
            background-color: #ddd;
        }
    </style>

</head>
<body>
    <h1>Application Form</h1>
    <form>
        <label>Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label>DOB:</label>
        <input type="date" id="dob" name="dob" required><br><br>
        <label>Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        <label>Postcode:</label>
        <input type="text" id="postcode" name="postcode" required><br><br>
        <label>State:</label>
        <input type="text" id="state" name="state" disabled><br><br>
        <button type="submit" id="submit_btn">Submit</button>
    </form>
</body>
</html>