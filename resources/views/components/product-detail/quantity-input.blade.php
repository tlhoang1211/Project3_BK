@props(['initVal'=>'', 'name' => ''])

<div x-data="init()">
    <input style="height: 32.5px" type="text" x-model="value"
           {{ $attributes->merge(['class' => 'qty2']) }}
           name="{{ $name }}"
           @input="console.log(value)"
    >
    <div class="inc button_inc" @click="update('+')">+</div>
    <div class="dec button_inc" @click="update('-')">-</div>

    <script>
        function init()
        {
            return {
                value: {{ $initVal }},
                update(sign)
                {
                    if (sign === "+")
                    {
                        this.value++;
                    }
                    else if (sign === "-")
                    {
                        this.value = this.value == 0 ? 0 : this.value--;
                    }
                }
            };
        }
    </script>
</div>
