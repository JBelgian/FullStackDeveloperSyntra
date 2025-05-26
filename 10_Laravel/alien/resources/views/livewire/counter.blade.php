<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md text-center">
        <h1 class="text-3xl font-bold mb-6">Livewire Counter</h1>
        
        <div class="flex items-center justify-center space-x-4">
            <button 
                wire:click="decrement" 
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600"
            >
                -
            </button>
            
            <span class="text-2xl font-bold px-4">{{ $count }}</span>
            
            <button 
                wire:click="increment" 
                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600"
            >
                +
            </button>
        </div>
    </div>
</div>