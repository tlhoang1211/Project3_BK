@props(['options' => [], 'selected' => ''])

<div class="custom-select-form">
    <select name="volume" {{ $attributes->merge(['class' => 'wide']) }}>
        @foreach($options as $option)
            <option {!! $option === $selected ? 'selected' : ''!!} value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>
</div>
