<?php

declare(strict_types=1);

namespace Presentation\UserManagement\Controllers;

use Application\Bus\Contracts\CommandBusContract;
use Application\Bus\Contracts\QueryBusContract;
use Application\User\Commands\CreateUserCommand;
use Application\User\Commands\LoginUserCommand;
use Application\User\Commands\LogoutUserCommand;
use Application\User\Contracts\UserServiceContract;
use Application\User\Data\UserData;
use Domain\User\Exceptions\InvalidCredentialsException;
use Presentation\Controller;
use Presentation\UserManagement\Requests\ForgetPasswordFormRequest;
use Presentation\UserManagement\Requests\LoginFormRequest;
use Presentation\UserManagement\Requests\ResetPasswordFormRequest;
use Presentation\UserManagement\Requests\UserFormRequest;

class UserController extends Controller
{
    public function __construct(
        protected CommandBusContract $commandBus,
        protected QueryBusContract $queryBus,
        protected UserServiceContract $userService,
    ) {}

    public function register(UserFormRequest $request): \Illuminate\Http\JsonResponse
    {
        $userData = UserData::from($request->validated());

        $token = $this->commandBus->dispatch(
            new CreateUserCommand($userData),
        );

        return response()->json([
            'status' => 'success',
            'data' => [
                'token' => $token,
            ],
        ]);
    }

    public function login(LoginFormRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $userData = $request->validated();

            $token = $this->commandBus->dispatch(
                new LoginUserCommand($userData['email'], $userData['password']),
            );

            return response()->json([
                'status' => 'success',
                'data' => [
                    'token' => $token,
                ],
            ]);
        } catch (InvalidCredentialsException $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ], 401);
        }
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        $this->commandBus->dispatch(
            new LogoutUserCommand(auth()->user()),
        );

        return response()->json([
            'status' => 'success',
            'message' => 'User logged out successfully',
        ]);
    }

    public function forgetPassword(ForgetPasswordFormRequest $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validated();

        $response = $this->userService->sendResetPasswordEmail($validatedData['email']);

        return $response
            ? response()->json(['status' => 'success', 'message' => 'Reset link sent to your email.'], 200)
            : response()->json(['status' => 'error', 'message' => 'Unable to send reset link.'], 400);
    }

    public function resetPassword(ResetPasswordFormRequest $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validated();

        $response = $this->userService->resetPassword($validatedData);
        
        return $response 
            ? response()->json(['status' => 'success', 'message' => 'Password has been reset.'], 200)
            : response()->json(['status' => 'error', 'message' => 'Failed to reset password.'], 400);
    }
}
