<script>
    function valideer(nummer1, nummer2) { // makkelijke captcha (gewoon som maken)
        var code = document.getElementById('uitkomst').value;
        if ((nummer1 + nummer2) == code) {
            document.getElementById('contactform').submit();
        }
        else {
            document.getElementById('errorbar').innerHTML = 'Put in the right captcha!';
        }
    }
</script>


<?php
$data = array('class' => 'form-horizontal');
echo form_open("forum/comment_validation/$threadPost->thread_id", $data);

echo "<fieldset>
        <legend>You're about to post a comment.</legend>";

echo "<div class='form-group'>";
echo "<label for='inputName' class='col-lg-2 control-label'>Name</label>";
echo "<div class='col-lg-10'>";
$data = array('class' => 'form-control', 'name' => 'username', 'placeholder' => 'Username', 'value' => set_value('Username'));
echo "<p>";
echo form_input($data);
echo "</p>";
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='inputName' class='col-lg-2 control-label'>Message</label>";
echo "<div class='col-lg-10'>";
$data = array('class' => 'form-control', 'name' => 'comment', 'placeholder' => 'Insert text..');
echo "<p>";
echo form_textArea($data);
echo "</p>";

echo "<p>Answer this math test so we can determine wether you're human or not.</p>";
$random1 = rand(1, 5);
$random2 = rand(1, 5);

echo "<p> What is " . $random1 . " + " . $random2 . "?";

echo "<input id='uitkomst' type='number'  />
                <span style='color:red;' id='errorbar'> </span> ";


$data = array('class' => 'btn btn-primary', 'name' => 'comment_submit', 'onclick' => 'valideer(' . $random1 . ',' . $random2 . ')', 'value' => 'Reply!');
echo "<p>";
echo form_submit($data);
echo "</p>";

echo "</fieldset>";
echo form_close();
echo "</div>";
echo "</div>";
?>

<div class="col-sm-6">
    <?php
    echo validation_errors();
    ?>
</div>