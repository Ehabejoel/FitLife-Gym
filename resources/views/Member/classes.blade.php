<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Class Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Available Classes</h3>
                        <p class="mt-1 text-sm text-gray-600">Book your spot in upcoming fitness classes.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($classes as $class)
                            <div class="bg-white rounded-lg shadow overflow-hidden">
                                <div class="h-48 w-full overflow-hidden">
                                    @if($class->image_url)
                                        <img src="{{ asset($class->image_url) }}" 
                                             alt="{{ $class->class_name }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                            <span class="text-gray-400">No image available</span>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="p-4">
                                    <h4 class="text-lg font-medium text-gray-900">{{ $class->class_name }}</h4>
                                    <div class="mt-2 text-sm text-gray-600">
                                        <p>Instructor: {{ $class->instructor->name }}</p>
                                        <p>Time: {{ $class->start_time->format('M d, Y g:i A') }}</p>
                                        <p>Duration: {{ ($class->end_time->timestamp - $class->start_time->timestamp) / 60 }} minutes</p>
                                        <p>Available Spots: {{ $class->capacity - $class->current_bookings }}</p>
                                    </div>
                                    
                                    <div class="mt-4">
                                        @if($class->hasSpace())
                                            <form action="{{ route('member.classes.book', $class) }}" method="POST">
                                                @csrf
                                                <x-primary-button type="submit" class="w-full justify-center">
                                                    Book Class
                                                </x-primary-button>
                                            </form>
                                        @else
                                            <span class="inline-flex items-center justify-center w-full px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest">
                                                Full
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-8">
                                <p class="text-gray-500">No classes available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
