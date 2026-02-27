<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    public function index(): View
    {
        $totalSigned = User::count();
        $totalLogged = User::whereNotNull('last_login_at')->count();
        $activeUsers = User::where('is_active', true)->count();

        $users = User::orderByDesc('created_at')->get();

        return view('admin.dashboard', [
            'totalSigned' => $totalSigned,
            'totalLogged' => $totalLogged,
            'activeUsers' => $activeUsers,
            'users' => $users,
        ]);
    }

    public function toggleActive(User $user): RedirectResponse
    {
        if (auth()->id() === $user->id) {
            return back()->with('status', 'You cannot deactivate your own admin account.');
        }

        $user->is_active = ! $user->is_active;
        $user->save();

        return back()->with('status', $user->is_active ? 'User activated.' : 'User deactivated.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if (auth()->id() === $user->id) {
            return back()->with('status', 'You cannot delete your own admin account.');
        }

        $user->delete();

        return back()->with('status', 'User deleted.');
    }
}
