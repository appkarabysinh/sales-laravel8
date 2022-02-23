@php $editing = isset($card) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="card_title"
            label="Card Title"
            value="{{ old('card_title', ($editing ? $card->card_title : '')) }}"
            maxlength="255"
            placeholder="Card Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="card_description"
            label="Card Description"
            value="{{ old('card_description', ($editing ? $card->card_description : '')) }}"
            maxlength="255"
            placeholder="Card Description"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="product_count"
            label="Product Count"
            value="{{ old('product_count', ($editing ? $card->product_count : '')) }}"
            maxlength="255"
            placeholder="Product Count"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="card_price_sale"
            label="Card Price Sale"
            value="{{ old('card_price_sale', ($editing ? $card->card_price_sale : '')) }}"
            maxlength="255"
            placeholder="Card Price Sale"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="product_id" label="Product" required>
            @php $selected = old('product_id', ($editing ? $card->product_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Product</option>
            @foreach($products as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
