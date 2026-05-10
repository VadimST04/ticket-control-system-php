<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\User;
use Gesdinet\JWTRefreshTokenBundle\Generator\RefreshTokenGeneratorInterface;
use Gesdinet\JWTRefreshTokenBundle\Model\RefreshTokenManagerInterface;

class RefreshTokenGenerator
{
    private const int REFRESH_TOKEN_TTL = 2592000;

    public function __construct(
        private readonly RefreshTokenGeneratorInterface $refreshTokenGenerator,
        private readonly RefreshTokenManagerInterface $refreshTokenManager,
    ) {
    }

    public function generate(User $user): string
    {
        $refreshToken = $this->refreshTokenGenerator->createForUserWithTtl(
            $user,
            self::REFRESH_TOKEN_TTL,
        );

        $this->refreshTokenManager->save($refreshToken);

        return $refreshToken->getRefreshToken();
    }
}
