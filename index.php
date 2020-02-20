<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Test</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
            <span class="navbar-text"></span>
        </div>
    </nav>
    <div class="d-flex flex-lg-column">
        <h1 class="title">Register Form</h1>
        <div class="d-flex justify-content-center shadow p-3 mb-5 bg-white rounded" style="margin: 0 auto; width: 40%;">
            <form name="register" id="auth" action="../validation/auth.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputName">Name:</label>
                    <input type="text" name="username" class="form-control" id="inputName" aria-describedby="nameHelp" oninput="myFunction('inputName')">
                    <div class="error" id="nameErr"></div>
                </div>
    
                    <div class="form-group">
                        <label for="inputEmail">Email:</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                        <div class="error" id="emailErr"></div>
                    </div>
                    <div>
                        <div class="form-group">
                            <input type="submit" name="add" class='btn btn-secondary' value="Add Phone +">
                            <input type="hidden" name="countPhone">
                        </div>
                    </div>
    
                    <?php
                    for($i = 0; $i < $phone; $i++){
                        $valueInput = $_POST['phone'][$i] ?? '';
                        $counter = $i + 1;
                        echo "<div class='form-group'>
                                 <label for='phone'>Your phone {$counter}</label>
                                    <div class='wrapInput'>
                                       <input type='tel' name='phone[]' class='form-control' value='{$valueInput}' placeholder='Enter your phone {$counter}'>
                                       <button type='submit' class='btn btn-danger' style='margin-left: 20px;' value='{$i}' name='delete'>Delete</button>                                                                 
                                    </div>
                             </div>";}
                    ?>
    
                    <div class="form-group">
                        <label for="inputAge">Age:</label>
                        <input type="number" name="age" class="form-control" id="inputAge" aria-describedby="ageHelp">
                    </div>
    
                    <div class="custom-file" style="margin-bottom: 20px;">
                        <input type="file" class="custom-file-input" id="customFile" name="photo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="form-group">
                        <label for="textareaSummary">Summary:</label>
                        <textarea class="form-control" name="summary" id="textareaSummary" rows="3"></textarea>
                    </div>
                    <div class="wrapBtn">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </div>
    
                </form>
            </div>
            <div id="demo"></div>
        </div>

    <script src="/js/script.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

    <script>
    $(document).ready(function () {
    bsCustomFileInput.init()
    })
</script>
</body>
</html>