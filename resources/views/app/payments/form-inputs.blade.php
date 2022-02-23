@php $editing = isset($payment) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="order_id" label="Order" required>
            @php $selected = old('order_id', ($editing ? $payment->order_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Order</option>
            @foreach($orders as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="payment_title"
            label="Payment Title"
            value="{{ old('payment_title', ($editing ? $payment->payment_title : '')) }}"
            maxlength="255"
            placeholder="Payment Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="price_payment"
            label="Price Payment"
            value="{{ old('price_payment', ($editing ? $payment->price_payment : '')) }}"
            maxlength="255"
            placeholder="Price Payment"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
