@props(['initVal'=>'', 'name' => ''])

<div x-data="{value: {{ $initVal }} }"
     x-init="$watch('value', value => console.log(value))"
>
    <input style="height: 32.5px" type="text" :value="value"
           class='qty2'
           name="{{ $name }}"
    >
    <div class="inc button_inc" @click="$dispatch('input', value++)">+</div>
    <div class="dec button_inc" @click="$dispatch('input', value === 0 ? 0 : value--)">-</div>
</div>
