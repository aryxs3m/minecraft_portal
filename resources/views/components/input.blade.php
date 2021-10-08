<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input class="form-control" id="{{ $name }}" name="{{ $name }}"
           @if(!empty($type)) type="{{ $type }}" @else type="text" @endif
           @if(!empty($value)) value="{{ $value }}" @endif
           @if(!empty($valueFrom)) value="{{ $valueFrom->{$name} }}" @endif
    >
</div>
