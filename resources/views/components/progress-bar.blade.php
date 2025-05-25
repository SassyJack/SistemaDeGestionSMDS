<div class="flex items-center">
    <div class="w-full bg-gray-200 rounded-full h-4 mr-2 overflow-hidden shadow-inner">
        <div class="progress-bar bg-gradient-to-r from-blue-500 to-blue-600 h-4 rounded-full transition-all duration-500 ease-out" 
             style="width: {{ $percent }}%"
             data-percent="{{ $percent }}"></div>
    </div>
    <span class="text-sm font-medium progress-percent">{{ $percent }}%</span>
</div>