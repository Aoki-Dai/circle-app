<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // Googleからユーザー情報を取得
            $googleUser = Socialite::driver('google')->user();

            // emailでユーザーを検索、なければ新規作成
            $user = User::firstOrCreate(
                ['email' => $googleUser->email],
                [
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt(Str::random(24)), // ランダムパスワード生成
                    'google_id' => $googleUser->id,
                ]
            );

            // ログイン処理
            Auth::login($user, true);

            // ダッシュボードにリダイレクト
            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            // エラー時の処理
            return redirect()->route('login')
                ->with('error', 'Googleログインに失敗しました。');
        }
    }
}
