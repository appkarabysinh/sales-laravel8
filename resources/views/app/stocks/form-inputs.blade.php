@php $editing = isset($stock) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="product_count_remaining"
            label="Product Count Remaining"
            value="{{ old('product_count_remaining', ($editing ? $stock->product_count_remaining : '')) }}"
            maxlength="255"
            placeholder="Product Count Remaining"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
