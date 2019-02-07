<?php
/**
 * @OA\Get(
 *  path="/api/categories",
 *  summary="Get list of categories",
 *  operationId="listCategories",
 *  tags={"Category"},
 *  description="Returns list of categories",
 *  security={{"bearerAuth":{}}},
 *  @OA\Response(
 *     response=200,
 *     description="Successful operation",
 *     @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="data",
 *                  type="array",
 *                  @OA\Items(
 *                     @OA\Property(property="id", type="integer"),
 *                     @OA\Property(property="name", type="string"),
 *                     @OA\Property(property="created_at", type="string", format="date-time"),
 *                     @OA\Property(property="updated_at", type="string", format="date-time"),
 *                  )
 *              )
 *          )
 *     )
 *  )
 * )
 */

/**
 * @OA\Put(
 *  path="/api/categories/{id}",
 *  summary="Update a category",
 *  operationId="updateCategory",
 *  tags={"Category"},
 *  description="Returns the updated category",
 *  security={{"bearerAuth":{}}},
 *  @OA\Parameter(
 *      name="id",
 *      in="path",
 *      description="ID of category",
 *      required=true,
 *      @OA\Schema(type="integer")
 *  ),
 *  @OA\RequestBody(
 *      description="Data required",
 *      required=true,
 *      @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              @OA\Property(property="name", type="string")
 *          )
 *      )
 *  ),
 *  @OA\Response(
 *     response=200,
 *     description="Successful operation",
 *     @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="data",
 *                  type="array",
 *                  @OA\Items(
 *                     @OA\Property(property="id", type="integer"),
 *                     @OA\Property(property="name", type="string"),
 *                     @OA\Property(property="created_at", type="string", format="date-time"),
 *                     @OA\Property(property="updated_at", type="string", format="date-time"),
 *                  )
 *              )
 *          )
 *     )
 *  )
 * )
 */