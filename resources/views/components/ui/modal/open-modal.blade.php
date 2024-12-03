<div>
    <button id='modal-trigger-{{$modalId}}'>
        Open Modal
    </button>
    <script>
        document.getElementById('modal-trigger-{{$modalId}}').addEventListener('click', (e)=>{
            e.preventDefault();
           const modal= document.getElementById('modal-{{$modalId}}');
            modal.classList.add('flex');
            modal.classList.remove('hidden');
        });
    </script>
</div>