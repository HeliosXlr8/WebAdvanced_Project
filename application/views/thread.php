<!DOCTYPE HTML>

<?php
//ik wou hier doen, op ELKE thread een comment button behalve op de eerste (FAQ staat vast op 1)
$URL = "";
if ($threadPost->thread_id != 1) {
    $URL = base_url() . "forum/New_Comment/" . $threadPost->thread_id;
    echo "<a href='$URL' class='btn btn-primary' id='rightBtn'>Comment</a>";
}
?>

<table class="table table-striped table-hover " id="forumTable">
    <thead>
        <!--<tr><th width="10%"></th><th></th><th></th><th></th><th></th><th></th></tr>-->
        <tr class="info">
            <th colspan="1" width="15%"><?php echo "<br><br>" . "Posted by: " . $threadPost->postedBy ?></th>
            <th colspan="4"><?php echo "<h3>" . $threadPost->title . "</h3>" . "<br>" . $threadPost->post; ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = count($comments);
        for ($j = 0; $j < $result; $j++) {

            echo "<tr class='active'>"
            . "<td colspan='1' width='15%'> <br><br> Posted by: " . $comments[$j]->postedBy . "</td>"
            . "<td colspan='4'> <br><br>" . $comments[$j]->comment . "</td>"
            . "</tr>";
        }
        /* info=blue, succes=green,danger=red,warning=yellow,active=green */
        ?>
    </tbody>
</table> 

<script>
    $(function () {
        $("#accordion").accordion({
            heightStyle: "content"
        });
    });
</script>

<?php
if ($threadPost->thread_id == 1) {
    echo ""
    . ""
    . "<link rel = 'stylesheet' href = '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css'>"
    . "<script src = '//code.jquery.com/jquery-1.10.2.js'></script>"
    . "<script src = '//code.jquery.com/ui/1.11.4/jquery-ui.js'></script>"
    . "<link rel='stylesheet' href='/resources/demos/style.css'>"
    . "<body>
    <div id='accordion'>
        <h3>How TED works</h3>
        <div>
            <p>TED is owned by a nonprofit, nonpartisan foundation. Our agenda is to make great ideas accessible and spark conversation. Everything we do — from our TED Talks videos to the projects sparked by the TED Prize, from the global TEDx community to the TED-Ed lesson series — is driven by this goal: How can we best spread great ideas?</p>
        </div>


        <h3>What does TED do with its money?</h3>
        <div>
            <ul>
                <li>The TED Prize takes a great idea each year and seeks to achieve goals of global impact.</li>
                <li>TED.com and our mobile apps allow great ideas to be easily accessible anywhere in the world, for free.</li>
                <li>The TED Fellows program supports extraordinary new voices as they develop their careers in science, the arts, social justice and more.</li>
                <li>TEDx supports the creation of independently run TED-style events in communities around the world.</li>
            </ul>
        </div>


        <h3>Does TED ban discussion of GMOs and food?</h3>
        <div>
            In 2013, another website created this meme in order to draw page views (and sell vitamin supplements). The story went viral because it seemed simply too awful to believe. And indeed it was not true. TED does not ban discussion of GMOs and food. Our formal response includes a long list of TED Talks about food, GMOs, food science and the sustainability and health of our food supply.
        </div>


        <h3>Is TED biased?</h3>
        <div>
            Not every talk given at a TED conference or a TEDx event makes it to the front page of TED.com. Some speakers have suggested that their live talks didn't become TED Talks because of a bias against their political stance. In truth, TED is nonpartisan and we do our best to post talks that will contribute to a productive conversation. TED is not a place for partisan slams and one-sided arguments.        
        </div>


        <h3>Is TED full of pseudoscience?</h3>
        <div>
            As the global TEDx movement grows, some local events have been targeted by speakers who make unsupported claims about science and health — from perpetual motion to psychic healing. TEDx's science guidelines clearly state that science and health information shared from the stage must be supported by peer-reviewed research. If you have concerns about the content of a TEDx talk, please write to tedx@ted.com and let us know.
        </div>
    </div>";
}
?>