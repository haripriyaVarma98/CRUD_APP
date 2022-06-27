<x-layout>
    <div class="relative overflow-x-auto w-full px-6">
        <h1 class="text-center font-bold text-xl">Leave Requests</h1>
        @if (!empty($data))
            <div class="my-2 py-4">
                <a href="#" id='massApprove' class="bg-green-400 text-white rounded py-2 px-2 hover:bg-green-500">Approve</a>
                <a href="#" id='massReject' class="bg-red-400 text-white rounded py-2 px-2 hover:bg-red-500">Reject</a>
            </div>
        @endif
        <table id="usersTable" class="hover stripe py-2 w-full border-collapse border">
            <thead
                class="mb-2 font-bold text-xs w-full text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="border px-6 py-3 w-2"></th>
                    <th class="border px-6 py-3">Employee name</th>
                    <th class="border px-6 py-3">Leave date</th>
                    <th class="border px-6 py-3" style="width: 17%;">No of remaining leaves</th>
                    <th class="border px-6 py-3">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                <tr class="text-center border py-6">
                    <td class="border">
                        <input type="checkbox" name="leave-rqst" id="{{$value->id}}">
                    </td>
                    <td class="border py-3">{{$value->user->name}}</td>
                    <td class="border py-3">{{date('d-m-Y',strtotime($value->requested_date))}}</td>
                    <td class="border py-3">{{$value->user->available_leave_days}}</td>
                    <td class="border ">
                        <a href="#" id='' data-id="{{$value->id}}" class="approveBtn bg-green-400 text-white rounded py-2 px-2 hover:bg-green-500">Approve</a>
                        <a href="#" id='' data-id="{{$value->id}}" class="rejectBtn bg-red-400 text-white rounded py-2 px-2 hover:bg-red-500">Reject</a>
                    </td>
                </tr>
                @endforeach
                @if (empty($data))
                    <tr class="text-center border py-6">
                        <td colspan="4">no requests found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-layout>
@include('leaveRequest.script')