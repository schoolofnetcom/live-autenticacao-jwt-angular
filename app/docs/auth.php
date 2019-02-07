<?php

/**
 * @OA\SecurityScheme(
 *     type="http",
 *     scheme="bearer",
 *     securityScheme="bearerAuth"
 * )
 */


/**
 * @OA\Post(
 *  path="/api/login",
 *  summary="Login user",
 *  operationId="login",
 *  tags={"Auth"},
 *  description="Returns new JWT token",
 *  @OA\RequestBody(
 *      description="Data required",
 *      required=true,
 *      @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              @OA\Property(property="email", type="string"),
 *              @OA\Property(property="password", type="string"),
 *          )
 *      )
 *  ),
 *  @OA\Response(
 *     response=200,
 *     description="Successful operation",
 *     @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              @OA\Property(property="token", type="string")
 *          )
 *     )
 *  )
 * )
 */