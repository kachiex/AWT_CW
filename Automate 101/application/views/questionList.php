<?php
//$qList = json_decode($list,true);
$cont = '<div class="row clearfix"><div class="col-md-10 column col-md-offset-1"><ul class="pagination1">';
if ($list != false) {
    foreach ($list as $value) {
        $cont = $cont . '<li><div class="media well "';

        $cont = $cont . '" ><a href="#" class="pull-left ';

        $noOfVotes = intval($value['votes']);
        $noOfLikes = intval($value['likes']);
        $noOfDislikes = $noOfVotes - $noOfLikes;

        if ($noOfLikes > $noOfDislikes) {
            $cont = $cont . 'liked';
            $cont = $cont . '">';
            $cont = $cont . ($noOfLikes);
        } elseif ($noOfLikes == $noOfDislikes) {
            $cont = $cont . 'fiftyfifty';
            $cont = $cont . '">';
            $cont = $cont . $noOfDislikes;
        } else {
            $cont = $cont . 'disliked';
            $cont = $cont . '">';
            $cont = $cont . ($noOfDislikes);
        }

        $cont = $cont . '</a><div class="media-body"><h4 class="media-heading questionDiv" quectionid="' . $value['questionID'] . '"> ';
        $cont = $cont . $value['title'];
        $cont = $cont . ' </h4><blockquote><p>';
        $cont = $cont . $value['sum'];
        $cont = $cont . '</p><footer> Posted by : ' . $value['userID'] . '</footer></blockquote></br><div class="col-md-2 column regUser"><button type="button" questionID="';
        $cont = $cont . $value['questionID'];
        $cont = $cont . '" class="btn btn-success btn-xs btnLikeQ">like</button> <button questionID="';
        $cont = $cont . $value['questionID'];
        $cont = $cont . '" type="button" class="btn btn-danger btn-xs btnDislikeQ">dislike</button></div><div class="col-md-4 column col-md-offset-5 pull-right"> <span class="label label-warning">';
        $cont = $cont . $value['views'];
        $cont = $cont . ' Views</span> <span class="label label-info">';
        $cont = $cont . $noOfLikes;
        $cont = $cont . ' Likes</span><span class="label label-info">';
        $cont = $cont . $noOfDislikes;
        $cont = $cont . ' Dislikes</span> <span class="label label-danger regUser reportThisQuestion " questionID="';
        $cont = $cont . $value['questionID'];
        $cont = $cont . '">Report</span></div></br>';

        if (array_key_exists('Answer', $value)) {
            $cont = $cont . '<div class="media"><a href="#" class="pull-left ';

            $answerData = $value['Answer'];
            $noOfVotesAns = intval($answerData['votes']);
            $noOfLikesAns = intval($answerData['likes']);
            $noOfDislikesAns = $noOfVotesAns - $noOfLikesAns;

            if ($noOfLikesAns > $noOfDislikesAns) {
                $cont = $cont . 'liked';
                $cont = $cont . '">';
                $cont = $cont . ($noOfLikesAns);
            } else if ($noOfLikesAns == $noOfDislikesAns) {
                $cont = $cont . 'fiftyfifty';
                $cont = $cont . '">';
                $cont = $cont . $noOfDislikesAns;
            } else {
                $cont = $cont . 'disliked';
                $cont = $cont . '">';
                $cont = $cont . ($noOfDislikesAns);
            }

            $cont = $cont . '</a><div class="media-body"><h4 class="media-heading"> ';
            $cont = $cont . $answerData['answer'];
            $cont = $cont . ' </h4><p> Posted By : ';

            switch ($answerData['userRankID']) {
                case '1' :
                    $cont = $cont . ' PRIVATE ';
                    break;
                case '2' :
                    $cont = $cont . ' SPECIALIST ';
                    break;
                case '3' :
                    $cont = $cont . ' CORPORAL ';
                    break;
                default :
                    $cont = $cont . ' PRIVATE ';
                    break;
            }

            $cont = $cont . $answerData['userId'] . '</p></br><div class="col-md-2 column regUser"><button type="button" answerID="';
            $cont = $cont . $answerData['answerId'];
            $cont = $cont . '" class="btn btn-success btn-xs btnLikeA">like</button> <button answerID="';
            $cont = $cont . $answerData['answerId'];
            $cont = $cont . '" type="button" class="btn btn-danger btn-xs btnDislikeA">dislike</button></div><div class="col-md-4 column col-md-offset-5 pull-right"> <span class="label label-info">';
            $cont = $cont . $noOfLikesAns;
            $cont = $cont . ' Likes</span><span class="label label-info">';
            $cont = $cont . $noOfDislikesAns;
            $cont = $cont . ' Dislikes</span></div></br></div></div>';

        }

        $cont = $cont . '</div></div> </li>';

    }
    $cont = $cont . '</ul></div></div>';
} else {
    $cont = '<div class="row clearfix"><div class="col-md-12 column center-block "><div class="page-header"><h1>';
    $cont = $cont . 'No Result Found ... <small>Try again with another word</small></h1></div></div></div>';

}
echo $cont;
?>
