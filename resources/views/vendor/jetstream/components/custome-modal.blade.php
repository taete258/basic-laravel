{{-- {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition']) }} --}}
<!-- Modal  -->

<span class="z-auto">
    <div class="hidden" id="modal-box">
      <div class="fixed inset-0 bg-gray-600 bg-opacity-50 transition-opacity" aria-hidden="true"></div>
      <div  class="sm:w-[450px] sm:min-w-[50vw] min-w-[80vw] items-center gap-2 -translate-y-1/2 px-4 py-6 bg-white rounded-lg top-1/2 left-1/2 -translate-x-1/2 absolute ">
        <div class="w-full py-2">
            <div class="text-lg px-2">
                {{ $title }}
            </div>
            <div class="mt-4 max-h-[600px] px-2 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-200" id="content">
                {{ $content }}
            </div>
        </div>
        <div class="w-full flex flex-row justify-between bg-white pt-4 px-2">
            {{ $footer }}
        </div>
       
      </div>
     
    </div>
</div>
