<script type="text/javascript">
    $('#blog-form').on('submit',function(event){
    event.preventDefault();
    var datas= new FormData(this)
    $.ajax({
        type: 'POST',
        url: $('#blog-form').attr('action'),
        enctype: 'multipart/form-data',
        data: datas,          
        processData: false,
        contentType: false,                      
        success: function (response) {
            // response = $.parseJSON(response);
            if(response.status=='success'){
                toastr.success('Successfully created new blog!');
                window.location.replace("{{route('blog')}}");
            } else {
                toastr.error('Failed to create! please try later.');
            }
        }
    });
});
</script>