<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Persistence\Repositories\Interfaces\PartnerRepository;
use App\Persistence\Repositories\Interfaces\PropertyRepository;
use App\Services\PartnerService;
use App\Services\PropertyService;
use Illuminate\Http\Request;

class PropertyController extends Controller
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
        $partners = $this->propertyRepository->getAll($page, 10);

        return view('app.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.partners.create');
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

            return redirect()->route('partners.index', compact('partners'));
        } catch (\Exception $e) {

            $page = $request->get('page') ? $request->get('page') : 1;
            $partners = $this->propertyRepository->getAll($page, 10);
            $error = 'Can\'t save. Something went wrong.';

            return view('app.partners.index', compact('partners', 'error'));
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
        $partner = $this->propertyRepository->findById($id);

        if ($partner) {
            return view('app.partners.show', compact('partner'));
        } else {
            $page = $request->get('page') ? $request->get('page') : 1;
            $partners = $this->propertyRepository->getAll($page, 10);
            $error = 'Can\'t find this resource. #ID:' . $id;

            return view('app.partners.index', compact('partners', 'error'));
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
        $partner = $this->propertyRepository->findById($id);
        if ($partner) {
            return view('app.partners.edit', compact('partner'));
        } else {
            $page = $request->get('page') ? $request->get('page') : 1;
            $partners = $this->propertyRepository->getAll($page, 10);
            $error = 'Can\'t find this resource. #ID:' . $id;

            return view('app.partners.index', compact('partners', 'error'));
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
            $partner = $this->propertyService->update($id, $request->all());

            return view('app.partners.show', compact('partner'));
        } catch (\Exception $e) {

            $page = $request->get('page') ? $request->get('page') : 1;
            $partners = $this->propertyRepository->getAll($page, 10);
            $error = 'Can\'t update. Something went wrong.';

            return view('app.partners.index', compact('partners', 'error'));
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

            return redirect()->route('partners.index', compact('partners'));
        } catch (\Exception $e) {
            $page = $request->get('page') ? $request->get('page') : 1;
            $partners = $this->propertyRepository->getAll($page, 10);
            $error = 'Can\'t delete. Something went wrong.';

            return view('app.partners.index', compact('partners', 'error'));
        }
    }
}
