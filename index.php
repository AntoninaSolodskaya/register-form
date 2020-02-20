<?php

    include "templates/header.php";
    include "templates/navbar.php";
    include "classes/Validator.php";
    include "classes/User.php";

    $phone = (isset($_POST['countPhone'])) ? $_POST['countPhone'] : 1;

    if(isset($_POST['add'])) $phone++;
    if(isset($_POST['delete']) && $phone > 1) {
        $valueDelete = $_POST['delete'];
        $lastSymbol = $valueDelete[strlen($valueDelete)-1];
        unset($_POST['phone'][$lastSymbol-1]);
        $_POST['phone'] = array_values($_POST['phone']);
        $phone--;
    }

    $image = $_FILES['photo']['name'];
    $target = "images/" . md5(time() . basename($image));


    if(isset($_POST['submit'])) {
       $validation = new Validator($_POST);
       $errors = $validation->validateForm();

        if(!$errors) 
            $_POST = array();
        
        $user = new User();
        $phoneArr = implode( ',',$_POST['phone']);
        $user->create([
            "username" => $_POST['username'],
            "email" => $_POST['email'],
            "summary" => $_POST['summary'],
            "age" => $_POST['age'],
            "phone" => $phoneArr,
            "photo" => $target
        ]);
    }

?>

    <div class="d-flex flex-lg-column">
        <h1 class="title">Register Form</h1>
        <div class="d-flex justify-content-center shadow p-3 mb-5 bg-white rounded" style="margin: 0 auto; width: 40%;">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" class="wrapper">
                <div class="form-group">
                    <label for="inputName">Name:</label>
                    <input type="text" name="username" class="form-control" id="inputName" aria-describedby="nameHelp" value="<?php echo htmlspecialchars($_POST['username']) ?? '' ?>">
                    <div class="error">
                        <?php echo $errors['username'] ?? '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail">Email:</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" value="<?php echo htmlspecialchars($_POST['email']) ?? '' ?>">
                    <div class="error">
                        <?php echo $errors['email'] ?? '' ?>
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <input type="submit" name="add" class='btn btn-secondary' value="Add Phone +">
                        <input type="hidden" name="countPhone" value="<?php echo $phone ?? "" ?>">
                        <div class="error">
                            <?php echo $errors['phone'] ?? '' ?>
                        </div>
                    </div>
                </div>

                <?php
                    for($i = 1; $i <= $phone; $i++){
                        $valueInput = isset($_POST['phone'][$i-1]) ? $_POST['phone'][$i-1] : '';
                        echo "<div class='form-group'>
                                    <label for='phone'>Your phone $i</label>
                                    <div class='wrapInput'>
                                         <input type='tel' name='phone[]' class='form-control' value='$valueInput' placeholder='Enter your phone $i'>
                                         <input type='submit' class='btn btn-danger' name='delete' value='Delete' style='margin-left: 20px;'>
                                         </div>
                                </div>";}
                    ?>

                <div class="form-group">
                    <label for="inputAge">Age:</label>
                    <input type="number" name="age" class="form-control" id="inputAge" aria-describedby="ageHelp" value="<?php echo htmlspecialchars($_POST['age']) ?? '' ?>">
                    <div class="error">
                        <?php echo $errors['age'] ?? '' ?>
                    </div>
                </div>

                <div class="custom-file" style="margin-bottom: 20px;">
                    <input type="file" class="custom-file-input" id="customFile" name="photo">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <div class="error">
                        <?php echo $errors['photo'] ?? '' ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="textareaSummary">Summary:</label>
                    <textarea class="form-control" name="summary" id="textareaSummary" rows="3"><?php echo htmlspecialchars($_POST['summary']) ?? '' ?></textarea>
                    <div class="error">
                        <?php echo $errors['summary'] ?? '' ?>
                    </div>
                </div>
                <div class="wrapBtn">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </div>

            </form>
        </div>
    </div>
<?php include "templates/footer.php"; ?>
