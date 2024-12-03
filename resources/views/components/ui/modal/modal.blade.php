<div id="modal-{{$modalId}}" class="z-50 fixed inset-0 hidden items-center justify-center bg-gray-300/40">
    <div class="relative w-[500px] max-w-[95vw] bg-white py-6 px-4 rounded">
        <x-ui.modal.close-modal modalId={{ $modalId }} />
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
