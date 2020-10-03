<div class="accordion">
    <button type="button" aria-controls="{{ $id }}" aria-expanded="true">
        {!! $headline !!}

        <i class="icon-caret"></i>
    </button>

    <div id="{{ $id }}" class="accordion-inner">
        {!! $text !!}
    </div>
</div>
