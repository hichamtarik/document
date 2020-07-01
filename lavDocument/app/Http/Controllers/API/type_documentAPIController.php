<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtype_documentAPIRequest;
use App\Http\Requests\API\Updatetype_documentAPIRequest;
use App\Models\type_document;
use App\Repositories\type_documentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class type_documentController
 * @package App\Http\Controllers\API
 */

class type_documentAPIController extends AppBaseController
{
    /** @var  type_documentRepository */
    private $typeDocumentRepository;

    public function __construct(type_documentRepository $typeDocumentRepo)
    {
        $this->typeDocumentRepository = $typeDocumentRepo;
    }

    /**
     * Display a listing of the type_document.
     * GET|HEAD /typeDocuments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $typeDocuments = $this->typeDocumentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($typeDocuments->toArray(), 'Type Documents retrieved successfully');
    }

    /**
     * Store a newly created type_document in storage.
     * POST /typeDocuments
     *
     * @param Createtype_documentAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtype_documentAPIRequest $request)
    {
        $input = $request->all();

        $typeDocument = $this->typeDocumentRepository->create($input);

        return $this->sendResponse($typeDocument->toArray(), 'Type Document saved successfully');
    }

    /**
     * Display the specified type_document.
     * GET|HEAD /typeDocuments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var type_document $typeDocument */
        $typeDocument = $this->typeDocumentRepository->find($id);

        if (empty($typeDocument)) {
            return $this->sendError('Type Document not found');
        }

        return $this->sendResponse($typeDocument->toArray(), 'Type Document retrieved successfully');
    }

    /**
     * Update the specified type_document in storage.
     * PUT/PATCH /typeDocuments/{id}
     *
     * @param int $id
     * @param Updatetype_documentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetype_documentAPIRequest $request)
    {
        $input = $request->all();

        /** @var type_document $typeDocument */
        $typeDocument = $this->typeDocumentRepository->find($id);

        if (empty($typeDocument)) {
            return $this->sendError('Type Document not found');
        }

        $typeDocument = $this->typeDocumentRepository->update($input, $id);

        return $this->sendResponse($typeDocument->toArray(), 'type_document updated successfully');
    }

    /**
     * Remove the specified type_document from storage.
     * DELETE /typeDocuments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var type_document $typeDocument */
        $typeDocument = $this->typeDocumentRepository->find($id);

        if (empty($typeDocument)) {
            return $this->sendError('Type Document not found');
        }

        $typeDocument->delete();

        return $this->sendSuccess('Type Document deleted successfully');
    }
}
