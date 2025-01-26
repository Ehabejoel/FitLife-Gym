<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!auth()->user()->hasActiveSubscription())
                {{-- Show this for users without active membership --}}
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                    <div class="flex">
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">Complete Your Membership</h3>
                            <p class="text-sm text-yellow-700 mt-2">You're registered but haven't activated a membership yet.</p>
                            <div class="mt-4">
                                <a href="{{ route('membership.plans') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700">
                                    View Membership Plans
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- Show this for active members --}}
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
                    <div class="flex">
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Active Membership</h3>
                            <p class="text-sm text-green-700 mt-2">
                                Your {{ auth()->user()->subscription->plan->name }} plan is active
                                @if(auth()->user()->subscription->expires_at)
                                    until {{ auth()->user()->subscription->expires_at->format('M d, Y') }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Welcome back, {{ Auth::user()->name }}! 👋</h3>
                    <p class="mb-6 text-gray-600">Here's your fitness hub - everything you need to manage your gym membership.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-blue-500">
                            <h4 class="font-medium mb-2">Your Membership</h4>
                            <p class="text-sm text-gray-600 mb-3">Manage your gym membership and plans</p>
                            <ul class="space-y-2">
                                <li><a href="{{ route('membership.plans') }}" class="text-blue-600 hover:underline">🏋️‍♂️ View Available Plans</a></li>
                                <li><a href="{{ route('membership.subscriptions') }}" class="text-blue-600 hover:underline">📅 My Current Plan</a></li>
                            </ul>
                        </div>
                        
                        <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-green-500">
                            <h4 class="font-medium mb-2">Personal Area</h4>
                            <p class="text-sm text-gray-600 mb-3">Manage your profile and track progress</p>
                            <ul class="space-y-2">
                                <li><a href="{{ route('member.profile') }}" class="text-blue-600 hover:underline">👤 My Profile & Settings</a></li>
                                <li><a href="{{ route('member.attendance') }}" class="text-blue-600 hover:underline">📊 My Workout History</a></li>
                            </ul>
                        </div>
                        
                        <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-purple-500">
                            <h4 class="font-medium mb-2">Training Schedule</h4>
                            <p class="text-sm text-gray-600 mb-3">View and book your training sessions</p>
                            <ul class="space-y-2">
                                <li><a href="{{ route('member.classes') }}" class="text-blue-600 hover:underline">📅 Class Schedule</a></li>
                                <li><a href="{{ route('member.training.sessions') }}" class="text-blue-600 hover:underline">🎯 Book a Training Session</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
