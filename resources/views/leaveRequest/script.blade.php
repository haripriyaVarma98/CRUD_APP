<script type="text/javascript">
    $(document).ready(function() {
        $('nav').remove();
    });

    $('.rejectBtn').click(function() {
        id = $(this).data('id');
        if(confirm("Are you sure you want to reject this request?")){
            $.ajax({
                url: '/appliedLeaves/reject',
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr.success('Rejected successfully!');
                        location.reload();
                    } else {
                        toastr.error('Failed to reject! Please try later.');
                    }
                }
            })
        }
    })

    $('.approveBtn').click(function() {
        id = $(this).data('id');
        if(confirm("Are you sure you want to approve this request?")){
            $.ajax({
                url: '/appliedLeaves/approve',
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr.success('Approved successfully!');
                        location.reload();
                    } else {
                        toastr.error('Failed to approve! Please try later.');
                    }
                }
            })
        }
    })
    $('#actionBtn').click(function() {
        if ($('#menu').hasClass('hidden')) {
            $('#menu').removeClass('hidden')
        } else {
            $('#menu').addClass('hidden')
        }
    })

    $('#massApprove').click(function() {
        var selectedIds = []
        $('input[name="leave-rqst"]:checked').each(function() {
            selectedIds.push(this.id);
        });
        if (selectedIds.length) {
            if(confirm("Are you sure you want to approve these request?"))
                $.ajax({
                    url: '/appliedLeaves/massAction',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "requests": selectedIds,
                        "type" : "approve",
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            toastr.success('Approved successfully!');
                            location.reload();
                        } else {
                            toastr.error('Failed to approve! Please try later.');
                        }
                    }
                })
        } else {
            toastr.warning('Please select atleast one item')
        }
    })

    $('#massReject').click(function() {
        var selectedIds = []
        $('input[name="leave-rqst"]:checked').each(function() {
            selectedIds.push(this.id);
        });
        if (selectedIds.length) {
            if(confirm("Are you sure you want to reject these request?"))
                $.ajax({
                    url: '/appliedLeaves/massAction',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "requests": selectedIds,
                        "type" : "reject",
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            toastr.success('Rejected successfully!');
                            location.reload();
                        } else {
                            toastr.error('Failed to reject! Please try later.');
                            location.reload();
                        }
                    }
                })
        } else {
            toastr.warning('Please select atleast one item')
        }
    })
</script>