
<div class="container">
	<div class="row clearfix">
		<div class="col-md-8 col-md-offset-3 column">
			<h2><?php echo $question['title']; ?></h2>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-10 column">
			<blockquote>
                <p ><?php echo $question['sum']; ?></p></br>
                <footer>Posted by 
                    <cite title="Author"><?php echo $question['userID']; ?></cite>
                </footer>
            </blockquote> 
            <div class="col-md-3 column regUser">
			   <button type="button" questionID="<?php echo $question['questionID']; ?>" class="btn btn-success btn-xs btnLikeQ">like</button>
			    <button questionID="<?php echo $question['questionID']; ?>" type="button" class="btn btn-danger btn-xs btnDislikeQ">dislike</button>
			</div>
			
            <div class="col-md-4 column col-md-offset-4 pull-right">
                <span class="label label-warning"> <?php echo $question['views']; ?> Views</span> 
                <span class="label label-info"><?php echo $like['likes']; ?> Likes</span>
                <span class="label label-info"><?php echo $dislike['dislikes']; ?> Dislikes</span> 
                <span class="label label-danger regUser reportThisQuestion " questionID="<?php echo $question['userID']; ?>">Report</span>
           </div>
		</div>
	</div>
    </br>
	<div class="row clearfix">
		<div class="col-md-3 column">
			<button id = "btnPostAnswer" type="button" questionID="<?php echo $question['questionID']; ?>" class="regUser btn btn-lg btn-primary btn-block">
				Post Answer
			</button>
		</div>
	</div>
    </br>
    
    <?php foreach ($answres as $raw): ?>
        
        
        <div class="row clearfix">
             
        <div class="col-md-10 col-md-offset-1 column well">
            <a href="#" class="pull-left 
            <?php
            $noOfVotesAns = intval($raw['votes']);
            $noOfLikesAns = intval($raw['likes']);
            $noOfDislikesAns = $noOfVotesAns - $noOfLikesAns;

            if ($noOfLikesAns > $noOfDislikesAns) {
                echo " liked";
                echo "\">" . $noOfLikesAns;
            } else if ($noOfLikesAns == $noOfDislikesAns) {
                echo ' fiftyfifty';
                echo '">'. $noOfDislikesAns;
            } else {
                echo " disliked";
                echo "\">" . $noOfDislikesAns;
            }
           ?>
           </a>
            <div class="media-body">
                <blockquote>
                    <p><?php echo $raw['answer']; ?></p>
                    <footer> Answer by : <?php echo $raw['userId']; ?></footer>
                </blockquote>
               
                <div  class="col-md-2 column regUser">
                    <button type="button" answerid="<?php echo $raw['answerId']; ?>" class="btn btn-success btn-xs btnLikeA">like</button>
                    <button answerid="<?php echo $raw['answerId']; ?>" type="button" class="btn btn-danger btn-xs btnDislikeA">dislike</button>
                </div>
                <div class="col-md-6 column col-md-offset-3 pull-right"> 
                    <span class="label label-info"><?php echo $noOfLikesAns; ?> Likes</span>
                    <span class="label label-info"><?php echo $noOfDislikesAns; ?> Dislikes</span>
                </div>
                <br>
            </div>
        </div>
    </div>
        
    <?php endforeach ?>
    
    


</div>