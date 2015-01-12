




<div class="row ">
    <div class="col-md-6 column col-md-offset-3"   >
        <fieldset>
            <!-- Form Name -->
            <legend class="text-center" >
                Post Your Question
            </legend>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="btnReset"></label>
                <div class="col-md-8">
                    <button id="btnReset" name="btnReset" class="btn btn-default">
                        Reset
                    </button>
                    <button id="btnCancel" name="btnCancel" class="btn btn-danger">
                        Cancel
                    </button>
                </div>
            </div>
            </br>
            <form id ="newQuestion"  class="form-horizontal">
                <input id="userIDforQues" name="userIDforQues" placeholder="" style="display: none;" type="text">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtQuesTitle">Title of your question</label>
                    <div class="col-md-6">
                        <input id="txtQuesTitle" name="txtQuesTitle" placeholder="" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtSum">Your problem in summary</label>
                    <div class="col-md-6">
                        <textarea class="form-control input-md"  rows="3" id="txtSum" name="txtSum"></textarea>
                    </div>
                </div>
                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cmbCatagory">Catagory</label>
                    <div class="col-md-5">
                        <select id="cmbCatagory" name="cmbCatagory" required="" class="form-control">
                           
                        </select>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtKeywords">Key word/words</label>
                    <div class="col-md-6">
                        <input id="txtKeywords" name="txtKeywords" placeholder="" class="form-control input-md" type="text">
                        <span class="help-block">separate your keywords using a coma</span>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btnSubmitQuestion"></label>
                    <div class="col-md-4">
                        <button type="submit" id="btnSubmitQuestion" name="btnSubmitQuestion" class="btn btn-success">
                            Post Question
                        </button>
                    </div>
                </div>

        </fieldset>
        </form>
    </div>
</div>
