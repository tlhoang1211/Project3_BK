@props(['modalId' => ''])

<!-- Button trigger modal -->
<div type="button" data-bs-toggle="modal" data-bs-target="#{{$modalId}}">
    {{$slot}}
</div>
