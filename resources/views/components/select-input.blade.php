@props(['disabled' => false, 'options' => [], 'selected' => null, 'default' => null])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    <option value="">Chọn thông tin</option>
    @foreach($options as $key => $value)
        <option value="{{ $key }}" {{ $selected === $key || $default === $value ? 'selected' : '' }}>
            {{ $value }}
        </option>
    @endforeach
</select>
