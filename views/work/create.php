<main>
    <div class="container">
        <div class="m-5 p-5"></div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form class="p-5 bg-box" method="POST" action="/work/store">
                    <div class="form-group">
                        <label for="name">Work name *</label>
                        <input type="text" class="form-control" id="name" required name="name" aria-describedby="nameHelp" placeholder="Conference, Meeting, Shopping,...">
                    </div>
                    <div class="form-group">
                        <label for="startdate">Starting date *</label>
                        <input type="date" class="form-control" id="startdate" required name="starting_date" placeholder="2020-02-20">
                    </div>
                    <div class="form-group">
                        <label for="enddate">Ending date *</label>
                        <input type="date" class="form-control" id="enddate" required name="ending_date" placeholder="2020-02-21">
                        <small id="endhelp" class="form-text text-muted">Calendar will display end date earlier 1 day than this.</small>
                    </div>
                    <button type="submit" class="btn btn-danger">Add</button>
                    <a href="/" class="btn btn-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>