<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Trainer Dashboard') }}
            </h2>
            <span class="text-sm text-gray-500">{{ now()->format('l, F j, Y') }}</span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <svg class="h-6 w-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Active Clients</h4>
                            <p class="text-lg font-semibold text-gray-900">{{ $activeClientsCount ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-50 rounded-lg">
                            <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Today's Sessions</h4>
                            <p class="text-lg font-semibold text-gray-900">{{ $todaySessionsCount ?? 0 }}</p>
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
                            <h4 class="text-sm font-medium text-gray-500">Weekly Hours</h4>
                            <p class="text-lg font-semibold text-gray-900">{{ $weeklyHours ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-50 rounded-lg">
                            <svg class="h-6 w-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Completion Rate</h4>
                            <p class="text-lg font-semibold text-gray-900">{{ $completionRate ?? 0 }}%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Today's Schedule -->
                <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Today's Schedule</h3>
                        <a href="{{ route('trainer.schedule') }}" class="text-sm text-blue-600 hover:text-blue-800">View Full Schedule</a>
                    </div>
                    <div class="space-y-4">
                        @forelse($todaySessions as $session)
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <div class="flex-shrink-0 w-16 text-center">
                                <span class="block text-sm font-semibold text-gray-900">{{ $session->start_time->format('H:i') }}</span>
                                <span class="block text-xs text-gray-500">{{ $session->duration }} min</span>
                            </div>
                            <div class="ml-4 flex-grow">
                                <p class="text-sm font-medium text-gray-900">{{ $session->client->name }}</p>
                                <p class="text-xs text-gray-500">{{ $session->training_type }}</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg" title="View Details">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="p-2 text-green-600 hover:bg-green-50 rounded-lg" title="Mark Complete">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-4 text-gray-500">
                            <p>No sessions scheduled for today</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Client Updates & Quick Actions -->
                <div class="space-y-6">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('trainer.clients.new') }}" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span class="ml-3 text-sm font-medium text-gray-900">New Client</span>
                            </a>
                            <a href="{{ route('trainer.sessions.create') }}" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="ml-3 text-sm font-medium text-gray-900">Schedule Session</span>
                            </a>
                            <a href="{{ route('trainer.progress.reports') }}" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="ml-3 text-sm font-medium text-gray-900">Progress Reports</span>
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Client Updates</h3>
                        <div class="space-y-4">
                            @forelse($recentUpdates as $update)
                            <div class="border-l-4 border-blue-500 pl-4 py-2">
                                <p class="text-sm font-medium text-gray-900">{{ $update->client->name }}</p>
                                <p class="text-xs text-gray-500">{{ $update->note }}</p>
                                <span class="text-xs text-gray-400">{{ $update->created_at->diffForHumans() }}</span>
                            </div>
                            @empty
                            <p class="text-center text-gray-500">No recent updates</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
