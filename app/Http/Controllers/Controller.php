<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
abstract class Controller
{
    //
}
=======
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class Controller
{
    

}


// use App\Models\User;
// use Illuminate\Http\Request;
// use App\Services\TwilioSmsSender;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
// use App\Http\Controllers\API\BaseController;
// use App\Models\Security\TwoStepVerification;

// use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/api/auth/register",
 *     summary="Register a new user",
 *     tags={"Authentication"},
 *     @OA\RequestBody(
 *         description="User object that needs to be registered",
 *         required=true,
 *        @OA\JsonContent(
 *            @OA\Property(property="username", type="string", example="username"),
 *           @OA\Property(property="phone_number", type="string", example="phone_number"),
 *          @OA\Property(property="password", type="string", example="password"),
 *        @OA\Property(property="c_password", type="string", example="c_password"),
 * 
 * )
 *   
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User registration successful",
 *        @OA\JsonContent(
 *           @OA\Property(property="username", type="string", example="username"),
 *          @OA\Property(property="phone_number", type="string", example="phone_number"),
 *         @OA\Property(property="token", type="string", example="token"),
 *      @OA\Property(property="token_type", type="string", example="token_type"),
 *    @OA\Property(property="expires_at", type="string", example="expires_at"),
 * 
 *     ),
 *    ),
 * 
 *     @OA\Response(
 *         response="422",
 *         description="Validation error"
 * 
 *     )
 * ),
 * 
 * 
 * 
 * 
 */
 


// class AuthController extends BaseController
// {

//     private $twilioSmsSender;

//     public function __construct(TwilioSmsSender $twilioSmsSender)
//     {
//         $this->twilioSmsSender = $twilioSmsSender;
//     }
//     //

//     public function registerUser(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'username' => ['required', 'string', 'max:255', 'unique:users'],
//             'phone_number' => ['required', 'string', 'max:255', 'unique:users'],
//             'password' => ['required', 'string', 'min:8'],
//             'c_password' => 'required|same:password',
//         ]);

//         if ($validator->fails()) {
//             return $this->sendError('Validation Error.', $validator->errors(), 422);
//         }

//         $user = User::create([
//             'username' => $request->username,
//             'phone_number' => $request->phone_number,
//             'password' => Hash::make($request->password),
//         ]);
//         $user->role = 'admin';
//         $user->save();
//         $success['username'] = $user->username;
//         $success['phone_number'] = $user->phone_number;

//         //two step verification
//         $two_step_verification = TwoStepVerification::create([
//             'user_id' => $user->id,
//             'enabled' => false,
//         ]);
        

//         return $this->sendResponse($success, 'User registered successfully.', 201);
//     }

    //login with twillio otp phone number verification

    // create login annotation
/**
 * @OA\Post(
 *    path="/api/auth/login",
 *   summary="Login",
 *  tags={"Authentication"},
 *  @OA\RequestBody(
 *     required=true,
 *    description="Pass user credentials",
 *  @OA\JsonContent(
 *      required={"username","password"},
 *    @OA\Property(property="username", type="string", format="username", example="username"),
 *  @OA\Property(property="password", type="string", format="password", example="password"),
 * )
 * ),
 * @OA\Response(
 *   response=200,
 * description="Success",
 * @OA\JsonContent(
 * @OA\Property(property="token", type="string", example="token"),
 * @OA\Property(property="username", type="string", example="username"),
 * @OA\Property(property="phone_number", type="string", example="phone_number"),
 * )
 * ),
 * @OA\Response(
 *  response=401,
 * description="Unauthorised",
 * @OA\JsonContent(
 * @OA\Property(property="error", type="string", example="Unauthorised"),
 * )
 * ),
 * @OA\Response(
 * response=422,
 * description="Validation Error",
 * @OA\JsonContent(
 * @OA\Property(property="error", type="string", example="Validation Error"),
 * )
 * ),
 * )
 * 
 */
    // public function login(Request $request)
    // {

    //     $validator = Validator::make($request->all(), [
    //         'username' => ['required', 'string', 'max:255'],
    //         'password' => ['required', 'string'],
    //     ]);

    //     if ($validator->fails()) {
    //         return $this->sendError('Validation Error.', $validator->errors(), 422);
    //     }

    
    //     if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
    //         return $this->sendError('Unauthorised.', ['error' => 'Unauthorised'], 401);
    //     }
    
    //     $user = $request->user();

    //     $two_step_verification_check = TwoStepVerification::where('user_id', $user->id)->first();
    //     if (!$two_step_verification_check->enabled) {
            
    //         $user->otp = null;
    //         $user->save();

    //          // Generate access token for the user
    //         $token = $user->createToken('authToken')->accessToken;

    //         $success['token'] = $token;
    //         $success['username'] = $user->username;
    //         $success['phone_number'] = $user->phone_number;
    //         $success['role'] = $user->role;

    //         return $this->sendResponse($success, 'User logged in successfully.', 200);

    //     }
    
    //     // Generate OTP and send it to the user's phone number
    //     $otp = rand(100000, 999999);
        
    //     $this->twilioSmsSender->sendOTP($user->phone_number, "Your OTP is $otp");
        


    //     // Save the OTP in the database
    //     $user->otp = $otp;
    //     $user->save();

    //     return $this->sendResponse($user, 'OTP sent successfully.', 200);

    // }

//create verify otp annotation
/**
 * @OA\Post(
 *   path="/api/auth/verify-otp",
 * summary="Verify OTP",
 * tags={"Authentication"},
 * @OA\RequestBody(
 *   required=true,
 * description="Pass user credentials",
 * @OA\JsonContent(
 *  required={"otp","phone_number"},
 * @OA\Property(property="otp", type="string", format="otp", example="otp"),
 * @OA\Property(property="phone_number", type="string", format="phone_number", example="phone_number"),
 * )
 * ),
 * @OA\Response(
 * response=200,
 * description="Success",
 * @OA\JsonContent(
 * @OA\Property(property="token", type="string", example="token"),
 * @OA\Property(property="username", type="string", example="username"),
 * @OA\Property(property="phone_number", type="string", example="phone_number"),
 * )
 * ),
 * @OA\Response(
 * response=401,
 * description="Unauthorised",
 * @OA\JsonContent(
 * @OA\Property(property="error", type="string", example="Unauthorised"),
 * )
 * ),
 * @OA\Response(
 * response=422,
 * description="Validation Error",
 * @OA\JsonContent(
 * @OA\Property(property="error", type="string", example="Validation Error"),
 * )
 * ),
 * )
 * 
 */


    // public function verifyOtp(Request $request)
    // {

    //     $validator = Validator::make($request->all(), [
    //         'otp' => ['required', 'string', 'max:255'],
    //         'phone_number' => ['required', 'string', 'max:255'],
    //     ]);

    //     if ($validator->fails()) {
    //         return $this->sendError('Validation Error.', $validator->errors(), 422);
    //     }

    //     $user = User::where('phone_number', $request->phone_number)->first();

    //     if(!$user) {
    //         return $this->sendError('Unauthorised.', ['error' => 'Unauthorised'], 401);
    //     }

    //     if ($user->otp != $request->otp) {
    //         return $this->sendError('Unauthorised.', ['error' => 'Invalid OTP'], 401);
    //     }

    //     // Generate access token for the user
    //     $token = $user->createToken('authToken')->accessToken;

    //     $success['token'] = $token;
    //     $success['username'] = $user->username;
    //     $success['phone_number'] = $user->phone_number;

    //     return $this->sendResponse($success, 'User logged in successfully.', 200);

    // }
   
 //create logout annotation
/**
 * @OA\Post(
 *  path="/api/auth/logout",
 * summary="Logout",
 * tags={"Authentication"},
 * @OA\RequestBody(
 * required=true,
 * description="Pass user credentials",
 * @OA\JsonContent(
 * required={"token"},
 * @OA\Property(property="token", type="string", format="token", example="token"),
 * )
 * ),
 * @OA\Response(
 * response=200,
 * description="Success",
 * @OA\JsonContent(
 * @OA\Property(property="message", type="string", example="Successfully logged out"),
 * )
 * ),
 * @OA\Response(
 * response=401,
 * description="Unauthorised",
 * @OA\JsonContent(
 * @OA\Property(property="error", type="string", example="Unauthorised"),
 * )
 * ),
 * @OA\Response(
 * response=422,
 * description="Validation Error",
 * @OA\JsonContent(
 * @OA\Property(property="error", type="string", example="Validation Error"),
 * )
 * ),
 * )
 * 
 */   
    // public function logout(Request $request)
    // {
    //     // $request->user()->currentAccessToken()->delete();
    //     Auth::logout();
    //     return response()->json([
    //         'message' => 'Successfully logged out'
    //     ]);
    // }

//create send password reset otp annotation
/**
 * @OA\Post(
 * path="/api/auth/send-password-reset-otp",
 * summary="Send Password Reset OTP",
 * tags={"Authentication"},
 * @OA\RequestBody(
 * required=true,
 * description="Pass user credentials",
 * @OA\JsonContent(
 * required={"phone_number"},
 * @OA\Property(property="phone_number", type="string", format="phone_number", example="phone_number"),
 * )
 *  ),
 * @OA\Response(
 * response=200,
 * description="Success",
 * @OA\JsonContent(
 * @OA\Property(property="phone_number", type="string", example="phone_number"),
 * @OA\Property(property="otp", type="string", example="otp"),
 * )
 * ),
 * @OA\Response(
 * response=401,
 * description="Unauthorised",
 * @OA\JsonContent(
 * @OA\Property(property="error", type="string", example="Unauthorised"),
 * )
 * ),
 * @OA\Response(
 * response=422,
 * description="Validation Error",
 * @OA\JsonContent(
 * @OA\Property(property="error", type="string", example="Validation Error"),
 * )
 * ),
 * )
 * 
 */
//     public function sendPasswordResetOTP(Request $request)
//     {

//         $validator = Validator::make($request->all(), [
//             'phone_number' => ['required', 'string', 'max:255'],
//         ]);

//         if ($validator->fails()) {
//             return $this->sendError('Validation Error.', $validator->errors(), 422);
//         }

//         $user = User::where('phone_number', $request->phone_number)->first();

//         if(!$user) {
//             return $this->sendError('Unauthorised.', ['error' => 'Unauthorised'], 401);
//         }

//         // Generate OTP and send it to the user's phone number
//         $otp = rand(100000, 999999);
//         $this->twilioSmsSender->sendOTP($user->phone_number, $otp);

//         // Save the OTP in the database
//         $user->otp = $otp;
//         $user->save();

//         return $this->sendResponse($user, 'OTP sent successfully.', 200);

//     }


// //create verify password reset otp annotation
// /**
//  * @OA\Post(
//  * path="/api/auth/verify-password-reset-otp",
//  * summary="Verify Password Reset OTP",
//  * tags={"Authentication"},
//  * @OA\RequestBody(
//  * required=true,
//  * description="Pass user credentials",
//  * @OA\JsonContent(
//  * required={"otp", "phone_number"},
//  * @OA\Property(property="otp", type="string", format="otp", example="otp"),
//  * @OA\Property(property="phone_number", type="string", format="phone_number", example="phone_number"),
//  * )
//  * ),
//  * @OA\Response(
//  * response=200,
//  * description="Success",
//  * @OA\JsonContent(
//  * @OA\Property(property="phone_number", type="string", example="phone_number"),
//  * @OA\Property(property="otp", type="string", example="otp"),
//  * )
//  * ),
//  * @OA\Response(
//  * response=401,
//  * description="Unauthorised",
//  * @OA\JsonContent(
//  * @OA\Property(property="error", type="string", example="Unauthorised"),
//  * )
//  * ),
//  * @OA\Response(
//  * response=422,
//  * description="Validation Error",
//  * @OA\JsonContent(
//  * @OA\Property(property="error", type="string", example="Validation Error"),
//  * )
//  * ),
//  * )
//  *  
//  */
//     public function verifyPasswordResetOTP(Request $request)
//     {

//         $validator = Validator::make($request->all(), [
//             'otp' => ['required', 'string', 'max:255'],
//             'phone_number' => ['required', 'string', 'max:255'],
//         ]);

//         if ($validator->fails()) {
//             return $this->sendError('Validation Error.', $validator->errors(), 422);
//         }

//         $user = User::where('phone_number', $request->phone_number)->first();

//         if(!$user) {
//             return $this->sendError('Unauthorised.', ['error' => 'Unauthorised'], 401);
//         }

//         if ($user->otp != $request->otp) {
//             return $this->sendError('Unauthorised.', ['error' => 'Invalid OTP'], 401);
//         }
    
//         return $this->sendResponse($user, 'Verification Successful.', 200);
//     }

    //create reset password after otp confirmation annotation
/**
 * @OA\Post(
 * path="/api/auth/reset-password-after-otp-confirmation",
 * summary="Reset Password After OTP Confirmation",
 * tags={"Authentication"},
 * @OA\RequestBody(
 * required=true,
 * description="Pass user credentials",
 * @OA\JsonContent(
 * required={"phone_number", "password", "c_password"},
 * @OA\Property(property="phone_number", type="string", format="phone_number", example="phone_number"),
 * @OA\Property(property="password", type="string", format="password", example="password"),
 * @OA\Property(property="c_password", type="string", format="c_password", example="c_password"),
 * )
 * ),
 * @OA\Response(
 * response=200,
 * description="Success",
 * @OA\JsonContent(
 * @OA\Property(property="phone_number", type="string", example="phone_number"),
 * @OA\Property(property="otp", type="string", example="otp"),
 * )
 * ),
 * @OA\Response(
 * response=401,
 * description="Unauthorised",
 * @OA\JsonContent(
 * @OA\Property(property="error", type="string", example="Unauthorised"),
 * )
 * ),
 * @OA\Response(
 * response=422,
 * description="Validation Error",
 * @OA\JsonContent(
 * @OA\Property(property="error", type="string", example="Validation Error"),
 * )
 * ),
 * )
 * 
 */ 
// public function resetPasswordAfterOtpConfirmation(Request $request)
// {

//     $validator = Validator::make($request->all(), [
//         'phone_number' => ['required', 'string', 'max:255'],
//         'password' => ['required', 'string', 'min:8', 'regex:/^(?=.[A-Z])(?=.\d)(?=.[!@#\$%\^&\])/'],
//         'c_password' => 'required|same:password',
//     ]);

//     if ($validator->fails()) {
//         return $this->sendError('Validation Error.', $validator->errors(), 422);
//     }

//     $user = User::where('phone_number', $request->phone_number)->first();

//     if(!$user) {
//         return $this->sendError('Unauthorised.', ['error' => 'Unauthorised'], 401);
//     }

//     $user->password = Hash::make($request->password);
//     $user->otp = null;
//     $user->save();

//     return $this->sendResponse($user, 'Password reset successfully.', 200);
// }
// }
>>>>>>> origin/main
