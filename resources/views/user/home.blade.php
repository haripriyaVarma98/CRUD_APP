<x-layout>
    <x-flash-msg/>
    <section class="px-6 py-8">
        <h1 class="text-center font-bold text-xl">User profile</h1>
        <main class="max-w-lg mx-auto bg-gray-100 mt-10 border border-gray-200 p-6 rounded-xl">
            <div class="mb-6 form-inline">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Name
                </label>
                <input class="border border-gray-400 p-2 w-full rounded" type="text" name="name" id="name"
                    value="{{ auth()->user()->name }}" readonly>
            </div>
            <div class="mb-6 form-inline">
                <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    User Name
                </label>
                <input class="border border-gray-400 p-2 w-full rounded" type="text" name="username" id="username"
                    value="{{ auth()->user()->username }}" readonly>
            </div>
            <div class="mb-6 form-inline">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Email
                </label>
                <input class="border border-gray-400 p-2 w-full rounded" type="text" name="email" id="email"
                    value="{{ auth()->user()->email }}" readonly>
            </div>
            <div class="mb-6 form-inline">
                <div class="block mb-2">
                    <label for="address" class="uppercase font-bold text-xs text-gray-700">address</label>
                </div>
                <div>
                    <table id="address-table" class="w-full">
                        <tbody>
                            @foreach (auth()->user()->address as $val)
                            <tr class="p-2 w-full rounded bg-white border border-gray-200" id='address-row-{{$val->id}}'>
                                <td class='address-td w-full p-2' data-id="{{$val->id}}">{!! nl2br($val->address) !!}</td>
                                <td class="float-right w-10 ml-2" data-id="{{$val->id}}">
                                    <a href="#" class='editAddress btn btn-link text-blue-500 font-semibold' title='Edit'><span
                                            class='fa fa-edit'></span></a>
                                    <a href="#" class='deleteAddress btn btn-link text-blue-500 font-semibold' title='Delete'><span
                                            class='fa fa-remove'></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>
</x-layout>

<script type="text/javascript">

    $('.deleteAddress').click(function(){
        if ($('#address-table tbody tr').length>1) {
            id = $(this).parents('td').data('id')
            $.ajax({
                url: '/address/delete?id='+id,
                type: "GET",
                success:function(response){
                    console.log(response);
                    if (response.status=='success') {
                        alert('Address deleted successfully!');
                        $('#address-row-'+id).remove();
                    }else{
                        alert('Failed to delete!'+response.msg);
                    }
                }
            })
        } else {
            alert('Failed to delete! Minimum one address should be given!');
        }
    })

    $('.editAddress').click(function(){
        id = $(this).parents('td').data('id')
        var data = $(this).parents('tr').find('.address-td').text();
        $(this).parents('tr').find('.address-td').html(`<textarea class="update-address w-full border p-1">`+data +`</textarea>`)
    })
    
    $(document).on("keyup",".update-address",function(e){
        var new_address = $(".update-address").val();
        var currentRow = $(this).parents('td')
        if (e.key == "Enter") {
            id = currentRow.data('id')
            $.ajax({
                url: '/address/update/'+id,
                type: "POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "address": new_address
                },
                success:function(response){
                    if (response.status=='success') {
                        alert('Address updated successfully!');
                        currentRow.find('textarea').remove();
                        currentRow.text(new_address)
                    }else{
                        alert('Failed to update!');
                    }
                }
            })
        }
    })

</script>