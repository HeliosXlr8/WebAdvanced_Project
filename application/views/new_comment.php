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

<form class="form-horizontal" action="#" method="post">
    <fieldset>
        <legend>You're about to post a comment.</legend>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="inputUserName" placeholder="Name">
            </div>
        </div>

        <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Message</label>
            <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="textArea"></textarea>
                <span class="help-block">Reply to this thread.</span>

                <p>
                    Answer this math test so we can determine wether you're human or not.
                </p>
                <?php
                $random1 = rand(1, 5);
                $random2 = rand(1, 5);

                echo "<p> What is " . $random1 . " + " . $random2 . "?";
                ?>
                <input id="uitkomst" type="number"  />
                <span style='color:red;' id='errorbar'> </span> 
                <?php
                echo "</p>";
                echo "<input type='button' value='Reply!' class='btn btn-primary' name='submitBtn' onclick='valideer(" . $random1 . "," . $random2 . ")' />"
                ?>

                
            </div>
        </div>
    </fieldset>
</form>