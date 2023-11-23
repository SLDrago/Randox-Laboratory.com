<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/seniorLabTech_Dashboard_style.css">
    <title>Senior Lab Technician</title>
    <style>

    </style>

</head>

<body>
<header>
    <a href="#" class="brand"> <img src="assets/images/logo/logo.png" alt="Logo" width="250px" height="70px"></a>

    <div class="menu-btn"></div>
    <div class="navigation" style="height: 50px;">
        <div class="navigation-items" style="height: 50px;">
            <a href="#" class="nav-link"><b>Home</b></a>

            <a href="#"><button><b>Login</button></b></a>
        </div>
    </div>
</header><br><br><br>
<div class="modal-header">
    <h1><span style="font-size: 50px; color: orange;">C</span>onfirmation Details</h1>

</div>
<div class="container">
    <table>
        <thead>
        <tr>
            <th style=" width: 10%;">Report ID</th>
            <th style="width: 20%;">Patient Name</th>
            <th style="width: 20%;">Report Type</th>
            <th style="width: 30%;">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Kalana Piyumantha</td>
            <td>Urine Report</td>

            <td>
                <button class="edit-button btn btn-success" data-toggle="modal" data-target="#1">Edit Report</button>
                <div class="modal" id="1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Red Blood Count Confirm Details</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for blood category, age, and name -->
                                <form id="confirmForm">
                                    <div class="form-group">
                                        <label for="Haemoglobin">Haemoglobin:</label>
                                        <input type="text" class="form-control" id="Haemoglobin" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="whiteblood">White Blood Count x109/L:</label>
                                        <input type="text" class="form-control" id="whiteblood" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Platelets">Platelets x109/L :</label>
                                        <input type="text" class="form-control" id="Platelets" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mcv">MCV:</label>
                                        <input type="text" class="form-control" id="mcv" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pcv">PCV:</label>
                                        <input type="text" class="form-control" id="pcv" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="rdw">RDW::</label>
                                        <input type="text" class="form-control" id="rdw" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mch">MCH:</label>
                                        <input type="text" class="form-control" id="mch" required>
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="submitConfirmForm()">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>2</td>
            <td>Dilshan Oshada</td>
            <td>Full Blood Report</td>

            <td>
                <button type="button" class="edit-button btn btn-primary" data-toggle="modal"
                        data-target="#2" >Edit Report</button>
                <div class="modal" id="2">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Lipid Profile Confirm Details</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for blood category, age, and name -->
                                <form id="confirmForm">
                                    <div class="form-group">
                                        <label for="cholesteroll">Cholestrol-Total</label>
                                        <input type="text" class="form-control" id="cholesteroll" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="trigleyecerides">Triglycerides</label>
                                        <input type="text" class="form-control" id="trigleyecerides" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hdl">Cholestrol - H.D.L:</label>
                                        <input type="text" class="form-control" id="hdl" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ldl">Cholestrol - L.D.L:</label>
                                        <input type="text" class="form-control" id="ldl" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="vldl">VLDL:</label>
                                        <input type="text" class="form-control" id="vldl" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cho/hdl">Cho/HDL:</label>
                                        <input type="text" class="form-control" id="cho/hdl" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ldl/hdl">LDL/HDL:</label>
                                        <input type="text" class="form-control" id="ldl/hdl" required>
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="submitConfirmForm()">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Thilina Pathum</td>
            <td>Lipid Profile</td>

            <td>
                <button type="button" class="edit-button btn btn-primary" data-toggle="modal"
                        data-target="#3">Edit Report</button>
                <div class="modal" id="3">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Urine Report Confirm Details</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for blood category, age, and name -->
                                <form id="confirmForm">
                                    <div class="form-group">
                                        <label for="redblood">Red Blood Count:</label>
                                        <input type=" text" class="form-control" id="redblood" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="protein">Protein:</label>
                                        <input type="text" class="form-control" id="protein" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="glucose">Glucose:</label>
                                        <input type="text" class="form-control" id="glucose" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="specificgravity">Specific Gravity:</label>
                                        <input type="text" class="form-control" id="specificgravity" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="color">Color:</label>
                                        <input type="text" class="form-control" id="color" required>
                                    </div>

                                    <button type="button" class="btn btn-primary" onclick="submitConfirmForm()">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    // Function to handle the submission of the confirm form
    function submitConfirmForm() {
        // Get values from the form
        var bloodCategory = document.getElementById("bloodCategory").value;
        var age = document.getElementById("age").value;
        var name = document.getElementById("name").value;

        // Display the values (you can customize this part based on your needs)
        alert("Confirmation Details:\nBlood Category: " + bloodCategory + "\nAge: " + age + "\nName: " + name);

        // Close the modal
        $('#confirmModal').modal('hide');
    }
</script>

</body>

</html>
