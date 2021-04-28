<?php 
    include 'contry.php';
?>

<form id="signup" class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-field">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" autocomplete="off">
        <input type="text" name="honey" id="honeyPot" autocomplete="off">
        <small><?php echo $nameErr; ?></small>
    </div>
    <div class="form-field">
        <label for="lastname">Lastname:</label>
        <input type="text" name="lastname" id="lastname" autocomplete="off">
        <small><?php echo $lastnameErr; ?></small>
    </div>
    <div class="form-field gender">
        <p>Gender:</p>
        <input type="radio" id="gender1"
        name="gender" value="male">
        <label for="gender1">Male</label>
        <input type="radio" id="gender2"
        name="gender" value="female">
        <label for="gender2">Female</label>

        <input type="radio" id="gender3"
        name="gender" value="other">
        <label for="gender3">Other</label>

        <small><?php echo $genderErr; ?></small>
    </div>

    <div class="form-field">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" autocomplete="off">
        <small><?php echo $emailErr; ?></small>
    </div>

    <div class="form-field">
        <label for="country">Country:</label>
        <select name="country" id="country">
            <option value="">--Please choose an option--</option>
            <?php 
            foreach ($country as $key => $value) {
                echo '<option value="'.$key.'">'.$value.'</option>';
            }
            ?>
        </select>
        <small><?php echo $countryErr; ?></small>
    </div>


    <div class="form-field">
        <label for="subject">Subject:</label>
        <select name="subject" id="subject">
            <option value="">--Please choose an option--</option>
            <option value="question">Question ?</option>
            <option value="problem">Problem ?</option>
            <option value="other">Other ?</option>
        </select>
        <small><?php echo $subjectErr; ?></small>
    </div>

    <div class="form-field">
        <label for="textarea">Your message:</label>
        <textarea name="textarea" id="textarea" rows="5"></textarea>
        <small><?php echo $textareaErr; ?></small>
    </div>
    <!-- <div class="form-field">
        <input id="send" name="send" type="submit" value="Sign Up" class="btn">
    </div> -->
    <button type="submit" id="send" name="send" class="btn">Submit</button>
</form>