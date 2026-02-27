<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                <div class="rounded-md border border-gray-200 bg-white p-4">
                    <p class="text-xs text-gray-500">Total signed</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalSigned }}</p>
                </div>
                <div class="rounded-md border border-gray-200 bg-white p-4">
                    <p class="text-xs text-gray-500">Users who logged in</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalLogged }}</p>
                </div>
                <div class="rounded-md border border-gray-200 bg-white p-4">
                    <p class="text-xs text-gray-500">Active users</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $activeUsers }}</p>
                </div>
            </div>

            <div class="rounded-md border border-gray-200 bg-white p-4">
                <h3 class="text-base font-semibold mb-3">All user accounts</h3>
                <div class="h-80 overflow-y-auto overflow-x-auto">
                    <table class="w-full text-sm min-w-[760px]">
                        <thead>
                            <tr class="text-left border-b">
                                <th class="py-2 pr-3">Name</th>
                                <th class="py-2 pr-3">Email</th>
                                <th class="py-2 pr-3">Status</th>
                                <th class="py-2 pr-3">Last login</th>
                                <th class="py-2 pr-3">Created</th>
                                <th class="py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="border-b align-top">
                                    <td class="py-2 pr-3">{{ $user->name }} @if($user->is_admin)<span class="text-xs text-purple-700">(Admin)</span>@endif</td>
                                    <td class="py-2 pr-3">{{ $user->email }}</td>
                                    <td class="py-2 pr-3">{{ $user->is_active ? 'Active' : 'Deactivated' }}</td>
                                    <td class="py-2 pr-3">{{ $user->last_login_at ? $user->last_login_at->format('Y-m-d H:i') : 'Never' }}</td>
                                    <td class="py-2 pr-3">{{ $user->created_at?->format('Y-m-d') }}</td>
                                    <td class="py-2">
                                        <div class="flex gap-2">
                                            <form method="POST" action="{{ route('admin.users.toggle-active', $user) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="rounded border border-black px-2 py-1 text-xs">
                                                    {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user account?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded border border-red-600 px-2 py-1 text-xs text-red-700">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-3 text-gray-500">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
