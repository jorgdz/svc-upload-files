<?php

namespace App\Http\Controllers\Contracts;

use App\File;
use Illuminate\Http\Request;

interface IFileController
{
    /**
     * @OA\Get(
     *   path="/api/files",
     *   tags={"Archivos"},
     *   security={
     *      {"passport": {}},
     *   },
     *   summary="Listar todos los archivos",
     *   description="Muestra todos archivos existentes paginados en formato JSON",
     *   operationId="getAllFiles",
     *   @OA\Parameter(
     *     name="page",
     *     description="Numero de la paginación",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function index();

    /**
     * @OA\Post(
     *   path="/api/files",
     *   tags={"Archivos"},
     *   security={
     *      {"passport": {}},
     *   },
     *   summary="Crear archivo",
     *   description="Crear un nuevo archivo y lo agregar al storage local.",
     *   operationId="addFile",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="file",
     *           description="Archivo a subirse",
     *           type="file",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(Request $request);

      /**
     * @OA\Get(
     *   path="/api/files/{file}",
     *   tags={"Archivos"},
     *   security={
     *      {"passport": {}},
     *   },
     *   summary="Obtener un archivo",
     *   description="Muestra información específica de un archivo.",
     *   operationId="getFile",
     *   @OA\Parameter(
     *     name="file",
     *     description="Id del archivo",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function show(File $file);

     /**
     * @OA\Post(
     *   path="/api/files/{file}",
     *   tags={"Archivos"},
     *   security={
     *      {"passport": {}},
     *   },
     *   summary="Actualizar un archivo",
     *   description="Actulizar un archivo específico por Id",
     *   operationId="editFile",
     *   @OA\Parameter(
     *     name="file",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
     *     ),
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="file",
     *           description="Archivo a subirse",
     *           type="file",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(Request $request, $id);

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id);
}
