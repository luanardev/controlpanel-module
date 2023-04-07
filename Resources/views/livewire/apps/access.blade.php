<div class="row">
    @if($browseMode)
        @include('controlpanel::livewire.apps.access.view')
    @endif

    @if($createMode)
        @include('controlpanel::livewire.apps.access.create')
    @endif

    @if($editMode)
        @include('controlpanel::livewire.apps.access.update')
    @endif
</div>