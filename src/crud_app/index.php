<h2>Input Your Information Below:</h2>
<form name="form1" method="post" action="process.php">
<div class="form-group">
    <div class="row">
    <div class="col">
        <label for="fname">First Name:</label>
        <input type="text" class="form-control" id="fname" name="fname" required>
    </div>
    <div class="col">
        <label for="lname">Last Name:</label>
        <input type="text" class="form-control" id="lname" name="lname" required>
    </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
    <div class="col">
        <label for="city">City:</label>
        <input type="text" class="form-control" id="city" name="city" required>
    </div>
    <div class="col">
        <label for="groupid">Group ID:</label>
        <select class="form-control" id="groupid" name="groupid">
            <option value="BBCAP22">BBCAP22</option>
            <option value="BBCAP19">BBCAP23</option>
            <option value="BBCAP20">BBCAP24</option>
            <option value="BBCAP21">BBCAP25</option>
            <option value="BBCAP21">BBCAP26</option>
            <option value="Others">Others</option>
        </select>
    </div>
    </div>
</div>
<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>