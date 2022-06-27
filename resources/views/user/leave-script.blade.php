<script type="text/javascript">
    $(document).ready(function() {
        $('#leave-date').datepicker();
    })
    $('button').click(function(){
        leaveDate = $('#leave-date').val();
        var currentDate = new Date();
        var selectedDate = new Date(leaveDate);
        diff = selectedDate - currentDate;
        diffDays = Math.ceil(diff / (1000 * 60 * 60 * 24)); 
        if (diffDays <5) {
            toastr.warning('Try to apply prior 5 days!')
        }
        $.ajax({
            url: '/home/applyLeave',
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "user_id": "{{ auth()->user()->id }}",
                "requested_date": leaveDate
            },
            success: function (response) {
                if (response.status == 'success') {
                    toastr.success('Leave applied successfully!');
                    setTimeout(function() {
                        window.location.replace("{{route('home')}}");
                    }, 2000);
                } else {
                    toastr.error(response.msg ? response.msg : 'Failed to apply leave! please try later');
                    setTimeout(function() {
                        window.location.replace("{{route('home')}}");
                    }, 2000);
                }
            }
        })
    })
</script>