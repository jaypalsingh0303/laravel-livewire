<div>
    <div class="card card-body mt-3 w-50 m-auto">
        @include('layouts.alert-message')

        <form wire:submit.prevent='save'>
            <div class="mb-2">
                <label class="form-label">Name</label>
                <input type="text" name="name" wire:model='name' class="form-control">
            </div>

            <div class="mb-2">
                <label class="form-label">Email</label>
                <input type="email" name="email" wire:model='email' class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Resume</label>
                <input type="file" name="file" wire:model='file' accept="application/pdf" class="form-control">
            </div>

            <div>
                <button class="btn btn-success" wire:loading.attr='disabled'>
                    <span wire:loading>
                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        Submitting...
                    </span>

                    <span wire:loading.remove>
                        Submit
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
