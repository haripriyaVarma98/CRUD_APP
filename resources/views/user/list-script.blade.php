<script type="text/javascript">
var table = $('#usersTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{route("userList")}}',
        type: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            "company_id": function () {
                return $('#company_list').val()
            },
            'formData': function() {
                return JSON.stringify($("#filter-list").serializeObject())
            },
        },
    },
    columns: [
        { data: 'name' },
        { data: 'username' },
        { data: 'email' },
        { data: 'address' },
        { data: 'company' },
    ],
    paging: true,
    // scrollY: 300,
    search: {
        return: true,
    },
    ordering:  false,
    info: true,
});

$(document).ready(function() {
    $('nav').remove();
    table.draw();
});

$('#company_list').change(function() {
    table.draw();
})

$( "#filter-list" ).submit(function(e) {
    e.preventDefault();
    table.draw();
});

</script>
