<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="script/css/chatstyle.css" />
<!------ Include the above in your HEAD tag ---------->

<!------ Include the above in your HEAD tag ---------->
<?php
include 'script/koneksi.php';
$id_user = $_SESSION['id'];
$id_chatroom = $_GET['id'];
$getChatQuery = "SELECT chat.*, tabel_user.nama, tabel_user.id FROM chat, tabel_user WHERE chat.id_chatroom = $id_chatroom && chat.id_user = tabel_user.id";
$executeChat = mysqli_query($koneksi, $getChatQuery);

function get_time_difference_php($created_time)
{
    date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
    $str = strtotime($created_time);
    $today = strtotime(date('Y-m-d H:i:s'));

    // It returns the time difference in Seconds...
    $time_differnce = $today - $str;

    // To Calculate the time difference in Years...
    $years = 60 * 60 * 24 * 365;

    // To Calculate the time difference in Months...
    $months = 60 * 60 * 24 * 30;

    // To Calculate the time difference in Days...
    $days = 60 * 60 * 24;

    // To Calculate the time difference in Hours...
    $hours = 60 * 60;

    // To Calculate the time difference in Minutes...
    $minutes = 60;

    if (intval($time_differnce / $years) > 1) {
        return intval($time_differnce / $years) . " years ago";
    } else if (intval($time_differnce / $years) > 0) {
        return intval($time_differnce / $years) . " year ago";
    } else if (intval($time_differnce / $months) > 1) {
        return intval($time_differnce / $months) . " months ago";
    } else if (intval(($time_differnce / $months)) > 0) {
        return intval(($time_differnce / $months)) . " month ago";
    } else if (intval(($time_differnce / $days)) > 1) {
        return intval(($time_differnce / $days)) . " days ago";
    } else if (intval(($time_differnce / $days)) > 0) {
        return intval(($time_differnce / $days)) . " day ago";
    } else if (intval(($time_differnce / $hours)) > 1) {
        return intval(($time_differnce / $hours)) . " hours ago";
    } else if (intval(($time_differnce / $hours)) > 0) {
        return intval(($time_differnce / $hours)) . " hour ago";
    } else if (intval(($time_differnce / $minutes)) > 1) {
        return intval(($time_differnce / $minutes)) . " minutes ago";
    } else if (intval(($time_differnce / $minutes)) > 0) {
        return intval(($time_differnce / $minutes)) . " minute ago";
    } else if (intval(($time_differnce)) > 1) {
        return intval(($time_differnce)) . " seconds ago";
    } else {
        return "few seconds ago";
    }
}
?>

<script>
    $('document').ready(function() {
        setInterval(function() {
            getRealData()
        }, 1000); //request every x seconds

    });

    function getRealData() {
        $.ajax({
            type: "POST",
            data: {
                name: name
            },
            cache: false,
            success: function() {
                /// some code to get result
            }
        })
    }
</script>
<div class="container" style="margin-top: 12vh;">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"> <span class="glyphicon glyphicon-comment"></span> Group Chat <div class="btn-group pull-right"> <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-chevron-down"></span> </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh"> </span>Refresh</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign"> </span>Available</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove"> </span>Busy</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span> Away</a></li>
                            <li class="divider"></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span> Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body" style="height: 200px;">
                    <ul class="chat">
                        <?php
                        while ($data = mysqli_fetch_assoc($executeChat)) {

                            $randomColor = sprintf('%06X', mt_rand(0, 0xFFFFFF));
                            if ($id_user == $data['id']) {
                        ?>

                                <li class="right clearfix"><span class="chat-img pull-right"> <img src="http://placehold.it/50/<?php echo $randomColor; ?>/fff&text=<?php echo substr($data['nama'], 0, 1); ?>" alt="User Avatar" class="img-circle" /> </span>
                                    <div class="chat-body clearfix">
                                        <div class="header"> <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo get_time_difference_php($data['time']); ?></small> <strong class="pull-right primary-font"><?php echo $data['nama']; ?></strong> </div>
                                        <p><?php echo $data['message']; ?></p>
                                    </div>
                                </li>
                            <?php
                            } else {
                            ?>

                                <li class="left clearfix"><span class="chat-img pull-left"> <img src="http://placehold.it/50/<?php echo $randomColor; ?>/fff&text=<?php echo substr($data['nama'], 0, 1); ?>" alt="User Avatar" class="img-circle" /> </span>
                                    <div class="chat-body clearfix">
                                        <div class="header"> <strong class="primary-font"><?php echo $data['nama']; ?></strong> <small class="pull-right text-muted"> <span class="glyphicon glyphicon-time"></span><?php get_time_difference_php($data['time']); ?></small> </div>
                                        <p><?php echo $data['message']; ?></p>

                                    </div>
                                </li>
                            <?php
                            }
                            ?>

                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="panel-footer">
                    <form method="post" action="">
                        <div class="input-group">
                            <input id="btn-input" type="text" name="chattext" class="form-control input-sm" placeholder="Type your message here..." required />
                            <span class="input-group-btn">
                                <input type="submit" name="sendchat" class="btn btn-warning btn-sm" id="btn-chat"> Send </input>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    @$chattext = $_POST['chattext'];
    @$sendchat = $_POST['sendchat'];
    $date = date('Y-m-d H:i:s');
    $sendChatQuery = "INSERT INTO chat VALUES('','$id_user','$chattext','$id_chatroom','$date')";
    if ($sendchat) {
        mysqli_query($koneksi, $sendChatQuery);
        $chattext = '';
        
    }
?>