<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *    title="Service Rest-Full",
 *    version="1.0.1",
 *    description="Documentación del mantenimiento de archivos.",
 *   @OA\Contact(
 *       email="admin@admin.com"
 *   ),
 *   @OA\License(
 *       name="Apache 2.0",
 *       url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *   )
 * ),
 * @OA\ExternalDocumentation(
 *    description="Mas informacion para configuración",
 *    url="https://styde.net/como-documentar-una-api-en-laravel-usando-swagger",
 * ),
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
