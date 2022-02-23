@php $editing = isset($orderDetail) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="product_id"
            label="Product Id"
            value="{{ old('product_id', ($editing ? $orderDetail->product_id : '')) }}"
            maxlength="255"
            placeholder="Product Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="order_id"
            label="Order Id"
            value="{{ old('order_id', ($editing ? $orderDetail->order_id : '')) }}"
            maxlength="255"
            placeholder="Order Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="price"
            label="Price"
            value="{{ old('price', ($editing ? $orderDetail->price : '')) }}"
            maxlength="255"
            placeholder="Price"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="product_count"
            label="Product Count"
            value="{{ old('product_count', ($editing ? $orderDetail->product_count : '')) }}"
            maxlength="255"
            placeholder="Product Count"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
