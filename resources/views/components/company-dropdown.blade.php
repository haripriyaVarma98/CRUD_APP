@props(['companies'])
<select {{ $attributes(['class' => 'text-gray-700']) }} >
    <option value="">choose company</option>
    @foreach ($companies as $key => $company)
        <option value="{{ $company->id }}">{{ $company->name }}</option>
    @endforeach
</select>
