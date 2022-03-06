<span class="z-auto">
    <div class="hidden" id="modal-box">
      <div class="fixed inset-0 bg-gray-600 bg-opacity-50 transition-opacity" aria-hidden="true"></div>
      <div  class="sm:w-[450px] sm:min-w-[50vw] min-w-[90vw] items-center gap-2 -translate-y-1/2 px-2 py-6 bg-white rounded-lg top-1/2 left-1/2 -translate-x-1/2 absolute ">
        <div class="w-full py-2">
            <div class="text-lg px-5">
                {{ $title }}
            </div>
            <div class="mt-4 max-h-[600px] px-5 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-200" id="content">
                {{ $content }}
            </div>
        </div>
        <div class="w-full flex flex-row justify-between bg-white pt-4 px-5">
            {{ $footer }}
        </div>
       
      </div>
     
    </div>
</div>
