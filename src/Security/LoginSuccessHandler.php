<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

readonly class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{

    public function __construct(
        private JWTTokenManagerInterface $jwtTokenManager,
        private RefreshTokenGenerator $refreshTokenGenerator,
    ) {
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token): JsonResponse
    {
        /** @var User $user */
        $user = $token->getUser();

        $token = $this->jwtTokenManager->create($user);
        $refreshToken = $this->refreshTokenGenerator->generate($user);

        return new JsonResponse([
            'token' => $token,
            'refresh_token' => $refreshToken,
            'user' => [
                'id' => $user->getId()->toRfc4122(),
                'email' => $user->getEmail(),
                'roles' => $user->getRoles(),
            ],
        ]);
    }
}
