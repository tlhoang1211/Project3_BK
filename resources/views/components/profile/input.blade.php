@props(['label' => 'Label', 'defaultValue' => '', 'type' => 'text', 'name'])

<div class="input-with-label">
    <div class="input-with-label__wrapper">
        <div class="input-with-label__label"><label>{{ $label }}</label></div>
        <div class="input-with-label__content">
            <div class="input-with-validator-wrapper">
                <div class="input-with-validator">
                    <input type="{{ $type }}"
                           placeholder=""
                           name="{{ $name }}"
                           value="{{ $defaultValue }}">
                </div>
            </div>
        </div>
    </div>
</div>
