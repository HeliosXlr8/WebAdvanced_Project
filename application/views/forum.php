<!DOCTYPE html>
<table class="table table-striped table-hover ">
    <thead>
        <tr class="info">
            <th>#</th>
            <th>Title</th>
            <th>Posted By</th>
            <th>Thread made at</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = count($threads);
        $baseURL = base_url() . 'forum/Thread';
        for ($j = 0; $j < $result; $j++) {
            $id = $threads[$j]->thread_id;
            echo "<tr class='active'>"
            . "<td>" . $id . "</td>"
            . "<td><a href='$baseURL/$id'> " . $threads[$j]->title . "</a></td>"
            . "<td><a href='#'> " . $threads[$j]->postedBy . "</a></td>"
            . "<td>" . $threads[$j]->timestamp . "</td>"
            . "</tr>";
        }
        /* info=blue, succes=green,danger=red,warning=yellow,active=green */
        ?>
    </tbody>
</table> 

<ul class="pagination">
    <li class="disabled"><a href="#">«</a></li>
    <li class="active"><a href="#">1</a></li>
</ul>