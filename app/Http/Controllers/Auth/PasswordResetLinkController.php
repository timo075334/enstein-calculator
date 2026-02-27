<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Throwable;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $email = strtolower(trim((string) $request->input('email')));

        try {
            $status = Password::sendResetLink(
                ['email' => $email]
            );

            Log::info('Password reset request processed.', [
                'email' => $email,
                'status' => $status,
            ]);

            if ($status === Password::RESET_LINK_SENT) {
                return back()->with('status', __($status));
            }

            if ($status === Password::RESET_THROTTLED) {
                return back()->withInput(['email' => $email])
                    ->withErrors(['email' => __('Please wait a moment before requesting another reset link.')]);
            }

            return back()->withInput(['email' => $email])
                ->withErrors(['email' => __('We could not send a reset link right now. Please verify the email and try again.')]);
        } catch (Throwable $exception) {
            Log::error('Password reset email send failed.', [
                'email' => $email,
                'message' => $exception->getMessage(),
            ]);

            return back()->with('status', __('If your email exists in our system, we have emailed your password reset link.'));
        }
    }
}
