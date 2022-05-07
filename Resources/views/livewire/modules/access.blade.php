<div class="row">		
	@if($browseMode)
		@include('controlpanel::livewire.modules.access.view')
	@endif
	
	@if($createMode)	
		@include('controlpanel::livewire.modules.access.create')
	@endif

	@if($editMode)
		@include('controlpanel::livewire.modules.access.update')
	@endif
</div>