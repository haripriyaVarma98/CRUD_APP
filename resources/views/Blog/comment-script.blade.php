<script>
    $('#comment-form').on('submit',function(event){
        event.preventDefault();
        var comment = $('#comment').val();
        var blog_id = $(this).data('blog');
        if (comment!='') {
            $.ajax({
                url: $('#comment-form').attr('action'),
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "comment": comment,
                    "blog_id": blog_id,
                },
                success: function (response) {
                    if (response.status == 'success') {
                        toastr.success('Comment posted successfully!');
                        addComment(comment);
                        $('#comment').val('');
                    } else {
                        toastr.error(response.msg ? response.msg : 'Failed to create! please try later');
                    }
                }
            })
        } else {
            toastr.warning('Comment can not be empty!')
        }
    });

    function addComment(comment) {
        var newRow = `<section class="flex text-m bg-gray-100 border border-gray-200 rounded-xl px-8 py-4 my-4">
                        <div class="comment-body">
                            <header class="comment-row ">
                                <h3 class="font-bold">`+"{{auth()->user()->name ?? ''}}"+`</h3>
                                <p class="text-xs">Commented <time> just now </time></p>
                            </header>
                            <p>`+comment+`</p>
                        </div>
                    </section>`;
        $('#comment-section').append(newRow);
    }
</script>