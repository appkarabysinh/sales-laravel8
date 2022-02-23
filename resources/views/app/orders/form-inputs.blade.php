@php $editing = isset($order) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="order_title"
            label="Order Title"
            value="{{ old('order_title', ($editing ? $order->order_title : '')) }}"
            maxlength="255"
            placeholder="Order Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="store_id" label="Store" required>
            @php $selected = old('store_id', ($editing ? $order->store_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Store</option>
            @foreach($stores as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
