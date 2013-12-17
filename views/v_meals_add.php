<!-- Controller Specific JS/CSS -->
<link rel="stylesheet" href="/css/meals.css" type="text/css">

<div class="well">
<h4>Meal Log</h4>

<form method='post' action='/meals/p_add'>

        Menu<br> <textarea class="input.lg" name='content'></textarea>
        
        <br><br>
        
        <input type='Submit' value='Add new post'>
            <h4>Upload photo of your breakfast:</h4><p id="filetypes">(only jpg, jpeg, gif, or png file types allowed)</p>
            
                    <input type='file' name='uploads'></br>
                    <input type='submit'>

             <?php if($message == "filetype_error"): ?>
            <div class='error'>
                <p>Upload failed. Invalid file type. Please try again.</p>
            </div>
            <br/>
        <?php endif; ?>  
</form>
<!-- <form method='POST' enctype="multipart/form-data" action='/posts/p_upload/'>
                     
            </form>   --> 

</div>