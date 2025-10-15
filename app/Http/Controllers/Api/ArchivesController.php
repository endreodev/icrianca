<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

use App\Models\Archive as Model;
use Classes\Upload;

class ArchivesController extends Controller
{
    use Upload;

    public $model;

    public function __construct()
    {
        $this->model = new Model;
    }

    static public $extension_accept = [
        'jpg', 'png', 'jpeg', 'gif', 'pdf', 'doc', 'docx'
    ];

    public function get($entity, $entity_id = null)
    {
        $response = [];
        $contents = $this->model::where('entity_id', $entity_id)->where('entity', $entity)->get();

        foreach ($contents as $key => $content) {
            $response[$key]['path']         = $content->getImage();
            $response[$key]['id']           = $content->getId();
            $response[$key]['extension']    = $content->extension;
        }

        return response()->json($response)->setStatusCode(200);
    }
    public function send(Request $request, $entity, $entity_id = null)
    {

        # Init Object Empty
        $response = new \stdClass();

        # Init transaction
        \DB::beginTransaction();
        try {

            if (!$request->hasFile('file')) {
                throw new \Exception('Arquivo não enviado!');
            }

            if (!in_array(strtolower($request->file('file')->extension()), self::$extension_accept)) {
                throw new \Exception('Arquivo não permitido!');
            }

            $size = [640, 480];
            $request->merge([
                'path' => $this->upload($request,  $attr = 'file', $size)
            ]);


            if (($entity_id !== 'created') && $entity_id !== null) {
                $request->merge([
                    'entity_id' => $entity_id
                ]);
            }

            if ($entity) {
                $request->merge([
                    'entity' => $entity
                ]);
            }

            // # Created 
            $created = $this->model::create($request->all());

            // # Result 
            $response->data = $created;


            $response->success = true;
            $response->code = 200;
            \DB::commit();
        } catch (\Exception $e) {

            $response->success = false;
            $response->code = 500;
            $response->message = $e->getMessage();
            \DB::rollback();
        }
        return response()->json($response)->setStatusCode($response->code);
    }

    public function destroy(Request $request, $id)
    {

        # Init Object Empty
        $response = new \stdClass();

        # Init transaction
        \DB::beginTransaction();

        try {
            $content = $this->model::find($id);
            if (!$content) {
                throw new \Exception('Arquivo não encontrado!');
            }

            $content->delete();

            $response->success = true;
            $response->code = 200;
            \DB::commit();
        } catch (\Exception $e) {
            $response->success = false;
            $response->code = 500;
            $response->message = $e->getMessage();
            \DB::rollback();
        }
        return response()->json($response)->setStatusCode($response->code);
    }
}
