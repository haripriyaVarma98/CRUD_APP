<script type="text/javascript">
    $(document).ready(function() {
        let hasAddress = $('#address-table tbody tr').length > 0 ? true : false;
        if (!hasAddress) {
            $('#add_new_address').trigger('click')
            $('#add_new_address').hide()
        }
    })

    $('#add_new_address').click(function() {
        var new_row = `<tr class="p-2 w-full rounded">
            <td colspan='2'>
                <textarea class="new_address border border-gray-400 p-2 mt-1 w-full rounded"></textarea>
            </td>
            </tr>`;
        $(new_row).appendTo('#address-table tbody');
    })

    $(document).on("keyup", ".new_address", function(e) {
        var new_address = $(".new_address").val();
        var currentRow = $(this).parents('tr')
        if (e.key == "Enter") {
            $.ajax({
                url: '/address/save',
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id": "{{ auth()->user()->id }}",
                    "address": new_address
                },
                success: function(response) {
                    if (response.status == 'success') {
                        alert('Address added successfully!');
                        location.reload();
                    } else {
                        alert('Failed to add new address!' + response.msg);
                    }
                }
            })
        }
    })

    $('.deleteAddress').click(function() {
        if ($('#address-table tbody tr').length > 1) {
            id = $(this).parents('td').data('id')
            $.ajax({
                url: '/address/delete?id=' + id,
                type: "GET",
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        alert('Address deleted successfully!');
                        $('#address-row-' + id).remove();
                    } else {
                        alert('Failed to delete!' + response.msg);
                    }
                }
            })
        } else {
            alert('Failed to delete! Minimum one address should be given!');
        }
    })

    $('.editAddress').click(function() {
        id = $(this).parents('td').data('id')
        var data = $(this).parents('tr').find('.address-td').text();
        $(this).parents('tr').find('.address-td').html(`<textarea class="update-address w-full border p-1">` +
            data + `</textarea>`)
    })

    $(document).on("keyup", ".update-address", function(e) {
        var new_address = $(".update-address").val();
        var currentRow = $(this).parents('td')
        if (e.key == "Enter") {
            id = currentRow.data('id')
            $.ajax({
                url: '/address/update/' + id,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "address": new_address
                },
                success: function(response) {
                    if (response.status == 'success') {
                        alert('Address updated successfully!');
                        currentRow.find('textarea').remove();
                        currentRow.text(new_address)
                    } else {
                        alert('Failed to update!');
                    }
                }
            })
        }
    })
</script>
