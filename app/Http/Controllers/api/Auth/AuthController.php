<?php

namespace App\Http\Controllers\api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Notifications\SendOtpNotify;
use App\Utils\ImageManager;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $request->validated();
        try{
            $user = User::create([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'phone_number' => $request->post('phone_number'),
                'image' => $request->post('image'),
            ]);

            if (!$user) {
                return responseApi(404, 'User not found');
            }

            if ($request->hasFile('image')) {
                if ($request->hasFile('image')) {
                    ImageManager::UploadImages($request, $user);
                }
            }
            $token = $user->createToken('user_token')->plainTextToken;

            $user->notify(new SendOtpNotify());

            return responseApi(201, 'User registered successfully', ['token'=>$token]);
        } catch (\Exception ) {
            return responseApi(500, 'Internal Server Error');
        }
    }
    public function login(Request $request)
    {
        //
    }
    public function logout()
    {
        $user = auth('sanctum')->user();
        $user->currentAccessToken()->delete();
        return responseApi(200, 'User logged out successfully');
    }
    public function deleteAccount()
    {
        $user = auth('sanctum')->user();
        $user->delete();
        return responseApi(200, 'Delete account successfully');
    }
}
