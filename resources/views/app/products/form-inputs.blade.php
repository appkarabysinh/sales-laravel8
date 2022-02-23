@php $editing = isset($product) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $product->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="pd_name"
            label="Pd Name"
            value="{{ old('pd_name', ($editing ? $product->pd_name : '')) }}"
            maxlength="255"
            placeholder="Pd Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="price_head"
            label="Price Head"
            value="{{ old('price_head', ($editing ? $product->price_head : '')) }}"
            maxlength="255"
            placeholder="Price Head"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="number_box"
            label="Number Box"
            value="{{ old('number_box', ($editing ? $product->number_box : '')) }}"
            maxlength="255"
            placeholder="Number Box"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="number_in_one_box"
            label="Number In One Box"
            value="{{ old('number_in_one_box', ($editing ? $product->number_in_one_box : '')) }}"
            maxlength="255"
            placeholder="Number In One Box"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
