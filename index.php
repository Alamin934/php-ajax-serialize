<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Ajax Serialize</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        *{
            font-family: Roboto;
            margin: 0px;
            padding: 0px;
        }
        .heading{
            background: #6C66EF;
            color: #fff;
            padding: 30px;
            text-align: center;
        }
        .success-msg{
            background-color: #DEF1D8;
            color: green;
            padding: 10px;
            margin: 10px;
        }
        .error-msg{
            background-color: #EFDCDD;
            color: red;
            padding: 10px;
            margin: 10px;
        }
        .process-msg{
            background-color: rgb(231, 216, 0);
            color: black;
            padding: 10px;
            margin: 10px;
        }
        </style>
</head>
<body>
    <div>
        <div class="heading mb-5">
            <h1>PHP & Ajax Serialize Form</h1>
        </div>
        <div>
        <form id="submit-form" method="POST">
            <table class="table table-borderless w-75 mx-auto">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" id="name" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td>
                            <input type="number" name="age" id="age" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1"  value="male">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>
                            <select class="form-select" aria-label="Default select example" name="country">
                                <option selected>Select Your Country</option>
                                <option value="bd">Bangladesh</option>
                                <option value="pk">Pakistan</option>
                                <option value="jp">Japan</option>
                                <option value="eng">England</option>
                                <option value="ind">Indonesia</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" id="submit" class="btn btn-info">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div id="response"></div>
        </div>
    </div>


    
    <script src="../js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(document).on("click","#submit",function(e) {
                e.preventDefault();
                var name = $("#name").val();
                var age = $("#age").val();

                if(name == "" || age == "" || !$('input:radio[name=gender]').is(':checked')){
                    $("#response").fadeIn();
                    $("#response").removeClass("success-msg").addClass("error-msg").html("All fields are required");
                    setTimeout(function(){
                        $("#response").fadeOut();
                    }, 4000);
                }else{
                    $("#response").html($('#submit-form').serialize());
                    $.ajax({
                        url: "save-form.php",
                        type: "POST",
                        data: $('#submit-form').serialize(),
                        beforesend: function(){
                            $("#response").fadeIn();
                            $("#response").removeClass("success-msg error-msg").addClass("process-msg").html("Loading....");
                        },
                        success: function(data){
                            $("#submit-form").trigger("reset");
                            $("#response").fadeIn();
                            $("#response").removeClass("error-msg").addClass("success-msg").html(data);
                            setTimeout(function(){
                                $("#response").fadeOut();
                            }, 4000);
                        }
                    });
                }
            });
        });
    </script>
  </body>
</html>