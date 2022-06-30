<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function generateTable() {
    var form = document.getElementById('filter-blogs');
    var formData= new FormData(form);
    $.ajax({
        url: '/blog-list',
        type: 'POST',
        contentType: false,
        processData: false,
        data: formData,
        success: function (response) {
            $('#blog-div').html(response)
        }
    });
}
$(document).ready(function() {
    generateTable();
});

$('#filter-blogs').on('submit',function(event) {
    event.preventDefault();
    generateTable();
})

</script>