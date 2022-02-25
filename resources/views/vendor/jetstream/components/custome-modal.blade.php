{{-- {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition']) }} --}}
<!-- Modal  -->

<span class="z-auto">
    <div class="w-full h-full hidden" id="modal-box">
      <div class="w-full h-full bg-slate-200 opacity-75 top-0 left-0 absolute"></div>
      <div  class="sm:w-[385px] sm:min-w-[40vw] min-w-[80vw] flex flex-col items-center gap-2 -translate-y-1/2 px-8 py-6 bg-white rounded-lg top-1/2 left-1/2 -translate-x-1/2 absolute ">
        <div class="w-full py-2">
            <div class="text-lg">
                {{ $title }}
            </div>
            <div class="mt-4" id="content">
                {{ $content }}
            </div>
        </div>
    
        <div class="w-full flex flex-row justify-between  py-4">
            {{ $footer }}
        </div>
      </div>
    </div>
</div>
