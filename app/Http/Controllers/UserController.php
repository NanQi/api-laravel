<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public static $model = User::class;

    /**
     * @OA\Get(
     *     path="/users/{user_id}",
     *     tags={"用户"},
     *     summary="根据ID获取用户信息",
     *     description="返回用户信息",
     *     @OA\Parameter(
     *         name="user_id",
     *         in="path",
     *         description="用户ID",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/User"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pet not found"
     *     ),
     *     security={
     *         {"Authorization": {}}
     *     }
     * )
     */
}
