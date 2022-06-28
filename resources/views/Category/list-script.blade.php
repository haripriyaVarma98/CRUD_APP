<style>
    .ui-widget.custom-bg {
        font-family: Verdana,Arial,sans-serif;
        font-size: .8em;
    }
    .ui-dialog.custom-bg .ui-widget-header {
        background: gray !important;
        border: 0;
        color: #fff;
        font-weight: normal;
    }
    .ui-widget-overlay {
        background: rgb(199, 195, 195) !important;
    }
</style>

<script type="text/javascript">
$( function() {
    dialog = $( "#dialog-form" ).dialog({
        autoOpen: false,
        modal: true,
        dialogClass: 'custom-bg',
        buttons: {
            'Save': addCategory,
            Cancel: function() {
            dialog.dialog( "close" );
            }
        },
        close: function() {
            form[ 0 ].reset();
        }
        });
        form = dialog.find( "form" ).on( "submit", function( event ) {
        event.preventDefault();
        addCategory();
    });
})

function addCategory() {
    var category = $('#new-category').val()
    if ($('#new-category').attr("data-id")) {
        updateCategory(category, $('#new-category').data("id"))
    }else {
        $.ajax({
            url: '/categories/save',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "name": function () {
                    return category
                },
            },
            success: function (response) {
                if (response.status == 'success') {
                    toastr.success('Category added successfully!');
                    addRow(category,response.id);
                } else {
                    toastr.error(response.msg ? response.msg : 'Failed to create! please try later');
                }
            }
        });
    }
    dialog.dialog( "close" );
}

function updateCategory(updatedName, id) {
    $.ajax({
        url: '/categories/update',
        type: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            "id": id,
            "name":updatedName,
        },
        success: function (response) {
            if (response.status == 'success') {
                toastr.success('Category updated successfully!');
                updateRow(id, updatedName);
            } else {
                toastr.error(response.msg ? response.msg : 'Failed to update! please try later');
            }
        }
    });
    $('#new-category').removeAttr('data-id');
}

function updateRow(id, name) {
    $('#'+id).children('.category-name').text(name);
}

$(document).ready(function() {
    setTemplate();
});

function setTemplate() {
    if ($('#category-table tbody tr').length < 1) {
        $('#category-table tbody')
        .append(`<tr class="text-center border py-6">
            <td colspan="3">no category found!</td>
        </tr>`);
    }
}

$('#addNew').click(function() {
    $( "#dialog-form" ).dialog({'title':'Create new category'})
    dialog.dialog( "open" );
})

function addRow(category,id) {
$('.category-row:last')
    .clone()
    .attr('id', id)
    .appendTo($('#category-table tbody'))
    .children('.category-name').text(category)
}

$('.edit-category').click(function() {
    $('#new-category').val($(this).closest('td').next('.category-name').text())
    $('#new-category').attr('data-id',$(this).closest('tr').attr('id'))
    $( "#dialog-form" ).dialog({'title':'Update category'})
    dialog.dialog( "open" );
})

$('.delete-category').click(function() {
    var id = $(this).closest('tr').attr('id')
    if (confirm('Are you sure to delete this category?')) {
        $.ajax({
            url: '/categories/delete',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
            },
            success: function (response) {
                if (response.status == 'success') {
                    toastr.success('Category deleted successfully!');
                    $('#'+id).remove();
                } else {
                    toastr.error(response.msg ? response.msg : 'Failed to update! please try later');
                }
            }
        });
    }
})

</script>
