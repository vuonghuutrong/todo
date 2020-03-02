<main>
    <div class="container">
        <div class="m-5 p-5"></div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php
                    if (empty($data)) {
                        echo '<h4 class="text-center">The work is not found</h4>';
                    } else {
                        ?>
                <form class="p-5 bg-box" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>/update">
                    <div class="form-group">
                        <label for="name">Work name *</label>
                        <input type="text" class="form-control" id="name" required name="name" placeholder="Conference, Meeting, Shopping,..." value="<?php echo $data['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="startdate">Starting date *</label>
                        <input type="date" class="form-control" id="startdate" required name="starting_date" placeholder="2020-02-20" value="<?php echo $data['starting_date'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="enddate">Ending date *</label>
                        <input type="date" class="form-control" id="enddate" required name="ending_date" placeholder="2020-02-21" aria-describedby="endhelp" value="<?php echo $data['ending_date'] ?>">
                        <small id="endhelp" class="form-text text-muted">Calendar will display end date earlier 1 day than this.</small>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline px-4"><input type="radio" name="status" value="0" <?php echo $data['status'] == 0 ? 'checked' : '' ?>>Planing</label>
                        <label class="radio-inline px-4"><input type="radio" name="status" value="1" <?php echo $data['status'] == 1 ? 'checked' : '' ?>>Doing</label>
                        <label class="radio-inline px-4"><input type="radio" name="status" value="2" <?php echo $data['status'] == 2 ? 'checked' : '' ?>>Complete</label>
                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                    <button type="button" class="btn btn-warning" id="delete-btn">Delete</button>
                    <a href="/" class="btn btn-dark">Cancel</a>
                </form>
                <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>/delete" id="delete-form">
                </form>
                <?php
                    } ?>
            </div>
        </div>
    </div>
</main>

<script>
    $('#delete-btn').click(() => {
        let cf = confirm("Are you sure to delete?");
        if (cf) {
            $('#delete-form').submit();
        }
    });
</script>
