{{-- {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition']) }} --}}
<!-- Modal  -->
<div class="w-full h-full">
  <div id="modal-bg" class="w-full h-full bg-slate-200 opacity-75 top-0 absolute "></div>
  <div id="modal-box" class="sm:w-[385px] sm:min-w-[30vw] shadow-md min-w-[60vw] flex flex-col items-center gap-2 -translate-y-1/2 px-8 py-6 bg-white rounded-lg top-1/2 left-1/2 -translate-x-1/2 absolute ">
    <div class="w-full py-2">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="w-full flex flex-row justify-between  py-4">
        {{ $footer }}
    </div>
  </div>
</div>

<script>
  const modalbg = document.getElementById('modal-bg');
  const modalSwitch = document.getElementById('modal-switch');
  const modalBox = document.getElementById('modal-box');
  const modalClose = document.getElementById('modal-close');
  modalbg.addEventListener("click", function() {
    modalBox.classList.add('hidden')
    modalbg.classList.add('hidden')
  });
  modalSwitch.addEventListener("click", function() {
    modalBox.classList.remove('hidden')
    modalbg.classList.remove('hidden')
  });
  modalClose.addEventListener("click", function() {
    modalBox.classList.remove('hidden')
    modalbg.classList.remove('hidden')
  });
</script>