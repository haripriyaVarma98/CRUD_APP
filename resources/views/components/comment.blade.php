@props(['comments'])
<div class="px-4 py-2">
    <table class="flex text-m" id="comments-table">
        {{-- <thead>
            <th class="font-bold text-blue-500"> Author name :</th>
        </thead> --}}
        <tbody class="comment-tbody">
            @foreach ($comments as $value)
                <tr class="comment-row">
                    {{-- <td class="font-bold text-blue-500"> {{$value->user->name}} :</td> --}}
                    <td class="pl-8 my-4 font-semibold comment"> {{$value->comment}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>