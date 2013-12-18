<!-- Controller Specific JS/CSS -->
<link rel="stylesheet" href="/css/meals.css" type="text/css">

<div class="well">

<form class="form-horizontal" method='post' action='/meals/p_add'>
  <h4>Meal Log</h4>
  <span class="help-block">Fill this form out to the best of your ability.</span>

  <div class="form-group">
    <label class="col-sm-2 control-label" for="date">Date</label>
    <div class="col-sm-3">
      <input type="date" id="date" class="form-control" placeholder="Date">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label" for="meal_kind">Meal Type</label>
      <div class="col-sm-3" id="meal_kind">
        <select class="form-control">
          <option>Breakfast/Brunch</option>
          <option>Lunch</option>
        </select>
      </div>
<!--   </div>
  
  <div class="form-group"> -->
    <label class="col-sm-2 control-label" for="number_served_unique">Number Served</label>
    <div class="col-sm-3">
      <input type="number" min="0" id="date" class="form-control" placeholder="Number served?">
    </div>
  </div>
 
  
  <div class="form-group">
    <label class="col-sm-2 control-label" for="shift_head">Shift Head</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="shift_head" placeholder="Enter name">
    </div>
 <!--  </div> -->
  <!-- take out to put them on the same row-->
  <!--<div class="form-group"> -->
    <label class="col-sm-2 control-label" for="vibe">Vibe</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="vibe" placeholder="Enter name">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label" for="menu">Menu</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows="5" type="text" name="menu" placeholder="What did you make today?"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label" for="notes">Notes/Comments</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows="5" type="text" name="notes" placeholder="Anything of note from today's shift?"></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-2 control-label" for="meal_photo">Meal Photo</label>
    <div class="col-sm-8">
        <input type="file" id="meal_photo">
        <p class="help-block">Only jpg, jpeg, gif, or png file types allowed.</p>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-8">
      <input class="btn btn-primary" type='Submit' value='Log Meal!'>
    </div>
  </div>
</form>


        <h4>Upload photo of your breakfast:</h4><p id="filetypes">(only jpg, jpeg, gif, or png file types allowed)</p>
        
                <input type='file' name='uploads'></br>
                <input type='submit'>

         <?php if($message == "filetype_error"): ?>
        <div class='error'>
            <p>Upload failed. Invalid file type. Please try again.</p>
        </div>
        <br/>
    <?php endif; ?>  



</div>