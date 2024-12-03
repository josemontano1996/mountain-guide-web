<div>
    <button class="absolute top-2 right-2" id="close-modal-{{$modalId}}">
        <x-ui.close-svg />
    </button>
    <script defer>
        document.getElementById('close-modal-{{$modalId}}').addEventListener('click',(e)=>{
        e.preventDefault();
        const modal= document.getElementById('modal-{{$modalId}}');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
       })
    </script>
</div>