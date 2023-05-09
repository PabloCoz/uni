<div>
    <button class="text-center" wire:click="$set('open', true)">
        <i class="fa-solid fa-file"></i>
    </button>

    <x-modal name="voucher" show="">
        <x-slot name="title">
            Voucher
        </x-slot>
    </x-modal>
</div>
