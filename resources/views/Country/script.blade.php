<script>
    $(document).ready(function() {
        $('nav').remove();
    });

    $('#country-list').change(function() {
        var timezone = $(this).val();
        if (timezone) {
            // var country = $('#country-list option:selected').text();
            $.ajax({
                url: '/timezone',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "timezone": timezone,
                },
                success: function (response) {
                    if (response.status == 'success') {
                        // $('#country-label').text(country)
                        $('#current-time').text(response.time)
                        $('#show-time').removeClass('hidden');
                    } else {
                        toastr.error(response.msg ? response.msg : 'Failed to load time!');
                    }
                }
            })
            
        } else {
            $('#show-time').addClass('hidden');

        }
    })

</script>