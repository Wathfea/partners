<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Persistence\Repositories\Interfaces\PartnerRepository;
use App\Persistence\Repositories\Interfaces\PropertyRepository;
use App\Services\PartnerService;
use App\Services\PropertyService;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /** @var PartnerRepository */
    private $propertyRepository;
    /** @var PartnerService */
    private $propertyService;

    /**
     * PartnersController constructor.
     * @param PropertyRepository $propertyRepository
     * @param PropertyService $propertyService
     */
    public function __construct(
        PropertyRepository $propertyRepository,
        PropertyService $propertyService
    )
    {
        $this->propertyRepository = $propertyRepository;
        $this->propertyService = $propertyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->get('page') ? $request->get('page') : 1;
        $properties = $this->propertyRepository->getAll($page, 10);

        return view('app.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        try {
            $this->propertyService->create($request->all());

            return redirect()->route('properties.index');
        } catch (\Exception $e) {

            $page = $request->get('page') ? $request->get('page') : 1;
            $properties = $this->propertyRepository->getAll($page, 10);
            $error = 'Can\'t save. Something went wrong.';

            return view('app.properties.index', compact('properties', 'error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $property = $this->propertyRepository->findById($id);

        if ($property) {
            return view('app.properties.show', compact('property'));
        } else {
            $page = $request->get('page') ? $request->get('page') : 1;
            $properties = $this->propertyRepository->getAll($page, 10);
            $error = 'Can\'t find this resource. #ID:' . $id;

            return view('app.properties.index', compact('properties', 'error'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $property = $this->propertyRepository->findById($id);
        if ($property) {
            return view('app.properties.edit', compact('property'));
        } else {
            $page = $request->get('page') ? $request->get('page') : 1;
            $properties = $this->propertyRepository->getAll($page, 10);
            $error = 'Can\'t find this resource. #ID:' . $id;

            return view('app.properties.index', compact('properties', 'error'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $property = $this->propertyService->update($id, $request->all());

            return view('app.properties.show', compact('property'));
        } catch (\Exception $e) {

            $page = $request->get('page') ? $request->get('page') : 1;
            $properties = $this->propertyRepository->getAll($page, 10);
            $error = 'Can\'t update. Something went wrong.';

            return view('app.properties.index', compact('properties', 'error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $this->propertyService->delete($id);

            return redirect()->route('properties.index');
        } catch (\Exception $e) {
            $page = $request->get('page') ? $request->get('page') : 1;
            $properties = $this->propertyRepository->getAll($page, 10);
            $error = 'Can\'t delete. Something went wrong.';

            return view('app.partners.index', compact('properties', 'error'));
        }
    }
}
