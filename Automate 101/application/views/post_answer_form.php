<div class="row ">
    <div class="col-md-6 column col-md-offset-3"   >
        <fieldset>
            <!-- Form Name -->
            <legend class="text-center" >
                Post Your Answer
            </legend>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="btnReset"></label>
                <div class="col-md-8">
                    <button id="btnResetAns" name="btnReset" class="btn btn-default">
                        Reset
                    </button>
                    <button id="btnCancelAns" name="btnCancel" class="btn btn-danger">
                        Cancel
                    </button>
                </div>
            </div>
            </br>
            <form id ="newAnswer"  class="form-horizontal">
                <input id="idforQues" name="idforQues" value="<?php echo $questionID; ?>" style="display: none;" type="text">
                <input id="idforUser" name="idforUser"  style="display: none;" type="text">
                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtAns">Your answer</label>
                    <div class="col-md-6">
                        <textarea class="form-control input-md"  rows="10" id="txtAns" name="txtAns"></textarea>
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btnSubmitAnswer"></label>
                    <div class="col-md-4">
                        <button type="button" id="btnSubmitAnswer" name="btnSubmitAnswer" class="btn btn-success">
                            Post Answer
                        </button>
                    </div>
                </div>

        </fieldset>
        </form>
    </div>
</div>

