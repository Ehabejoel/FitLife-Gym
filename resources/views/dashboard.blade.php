<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Fitness Dashboard') }}
            </h2>
            <span class="text-sm text-gray-500">{{ now()->format('l, F j, Y') }}</span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(!auth()->user()->hasActiveSubscription())
                <div class="bg-yellow-50 border border-yellow-100 rounded-lg p-4">
                    <div class="flex">
                        <p class="text-sm text-yellow-700">
                            <span class="font-medium">Start your fitness journey today!</span>
                            <a href="{{ route('membership.plans') }}" class="ml-2 font-semibold text-yellow-700 underline hover:text-yellow-800">
                                View plans →
                            </a>
                        </p>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <span class="flex-shrink-0 h-2 w-2 bg-green-400 rounded-full"></span>
                            <span class="text-sm text-gray-600">Active Member</span>
                            <span class="text-sm font-medium text-gray-900">{{ auth()->user()->subscription->plan->name }} Plan</span>
                        </div>
                        <span class="text-xs text-gray-500">Valid until {{ auth()->user()->subscription->expires_at?->format('M d, Y') ?? 'Ongoing' }}</span>
                    </div>
                </div>
            @endif

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <svg class="h-6 w-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Last Check-in</h4>
                            <p class="text-lg font-semibold text-gray-900">2 days ago</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-50 rounded-lg">
                            <svg class="h-6 w-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Classes Booked</h4>
                            <p class="text-lg font-semibold text-gray-900">{{ $classesCount ?? 0 }} upcoming</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-indigo-50 rounded-lg">
                            <svg class="h-6 w-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Workout Streak</h4>
                            <p class="text-lg font-semibold text-gray-900">5 days</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-pink-50 rounded-lg">
                            <svg class="h-6 w-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Fitness Score</h4>
                            <p class="text-lg font-semibold text-gray-900">85/100</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Quick Actions -->
                <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                        <div class="space-y-4">
                            <a href="{{ route('member.classes') }}" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <span class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                                    📅
                                </span>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Book a Class</p>
                                    <p class="text-xs text-gray-500">View schedule and reserve your spot</p>
                                </div>
                                <svg class="ml-auto h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>

                            <a href="{{ route('member.training.sessions') }}" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <span class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-lg bg-purple-100 text-purple-600">
                                    🎯
                                </span>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Personal Training</p>
                                    <p class="text-xs text-gray-500">Schedule a session with a trainer</p>
                                </div>
                                <svg class="ml-auto h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>

                            <a href="{{ route('member.profile') }}" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <span class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-lg bg-green-100 text-green-600">
                                    📊
                                </span>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Track Progress</p>
                                    <p class="text-xs text-gray-500">Update measurements and goals</p>
                                </div>
                                <svg class="ml-auto h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Upcoming Classes</h3>
                        <div class="space-y-4">
                            @forelse($upcomingClasses as $class)
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-lg bg-indigo-100 text-indigo-600">
                                        <span class="text-sm font-medium">{{ $class->start_time->format('D') }}</span>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">{{ $class->class_name }}</p>
                                        <p class="text-xs text-gray-500">
                                            {{ $class->start_time->format('g:i A') }} • 
                                            {{ $class->instructor->name }}
                                        </p>
                                    </div>
                                    <form method="POST" action="{{ route('member.classes.cancel', $class) }}" class="ml-auto">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm" 
                                                onclick="return confirm('Are you sure you want to cancel this class?')">
                                            Cancel
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <div class="text-center py-4 text-gray-500">
                                    <p>No upcoming classes booked</p>
                                    <a href="{{ route('member.classes') }}" class="text-blue-500 hover:underline text-sm">Book a class</a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Announcements -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Announcements</h3>
                    <div class="space-y-4">
                        <div class="p-4 bg-blue-50 rounded-lg border border-blue-100">
                            <span class="text-xs font-medium text-blue-600 bg-blue-100 px-2 py-1 rounded">New</span>
                            <h4 class="mt-2 text-sm font-medium text-gray-900">Holiday Schedule Changes</h4>
                            <p class="mt-1 text-sm text-gray-600">Modified class schedule for the upcoming holiday. Check the updated timetable.</p>
                        </div>

                        <div class="p-4 bg-purple-50 rounded-lg border border-purple-100">
                            <span class="text-xs font-medium text-purple-600 bg-purple-100 px-2 py-1 rounded">Event</span>
                            <h4 class="mt-2 text-sm font-medium text-gray-900">Fitness Challenge</h4>
                            <p class="mt-1 text-sm text-gray-600">Join our monthly fitness challenge and win exciting prizes!</p>
                        </div>

                        <div class="p-4 bg-green-50 rounded-lg border border-green-100">
                            <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded">Update</span>
                            <h4 class="mt-2 text-sm font-medium text-gray-900">New Equipment</h4>
                            <p class="mt-1 text-sm text-gray-600">We've added new equipment to our strength training area.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
