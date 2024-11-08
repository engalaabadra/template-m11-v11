<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Repositories\Modules\Banner\BannerRepository;
use App\Resources\BannerResource;
class BannerController extends Controller
{
    /**
     * @var BannerRepository
     */
    protected $bannerRepo;
        /**
     * @var Banner
     */
    protected $banner;

    
    /**
     * BannerResourceController constructor.
     *
     * @param BannerRepository $banners
     */
    public function __construct( Banner $banner,BannerRepository $bannerRepo)
    {
        $this->banner = $banner;
        $this->bannerRepo = $bannerRepo;
    }
    /**
     * Display a listing of the resource via (all , pagination).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = $this->bannerRepo->getData($this->banner, $this->banner->eagerLoading);
        $data = BannerResource::collection($banners);
        if (page()) $data = getDataResponse($data);
        return successResponse(0, $data);
    }

}
