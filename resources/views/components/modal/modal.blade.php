@props(['id' => '', 'title' => '', 'closeText' => 'Close', 'width' => '', 'generatedMultiply' => false])

<!-- Modal -->
<div class="modal fade" id="{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style='{{$width ? "min-width: $width" : ""}}'>
        <div class="modal-content">
            <div class="modal-header" style="background: #3A87AD; margin-left: 0">
                <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke">{{ $title }}</h5>
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{!! $closeText !!}</button>

                {{ $acceptButton ?? '' }}

            </div>
        </div>
    </div>
</div>
