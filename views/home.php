<main>
    <div class="p-5 m-3"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div id="calendar" class="p-1 bg-box box-shadow">
                <div class="text-center bg-box p-1">
                    <span class="badge badge-primary fc-custom-type-0">Planning</span>
                    <span class="badge badge-primary fc-custom-type-1">Doing</span>
                    <span class="badge badge-primary fc-custom-type-2">Complete</span>
                </div></div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        let works = [
        <?php
        foreach ($data as $work) {
            echo '{id: ' . $work['id'] . ',' . ' title: "' . $work['name'] . '", start: "' . $work['starting_date'] . '", end: "' . $work['ending_date'] . '", url: "/work/' . $work['id'] . '", status: ' . $work['status'] .'  },';
        }
        ?>];

        $('#calendar').fullCalendar({
            navLinks:true,
            eventLimit: true,
            events: works,
            plugins: ['dayGrid','timeGrid'],
            header: {
                right: 'custom1 today prev,next'
            },
            customButtons: {
                custom1: {
                    text: 'Add',
                    click: function () {
                        window.location.href = '/work/create'
                    } 
                },
            }
        });
    });
</script>