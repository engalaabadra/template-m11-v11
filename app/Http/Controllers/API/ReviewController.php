<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\Modules\Review\ReviewRepository;
use App\Models\Review;
use App\Resources\ReviewResource;
use App\Http\Requests\AddReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
     
    /**
     * @var ReviewRepository
     */
    protected $reviewRepo;
        /**
     * @var Review
     */
    protected $review;

    /**
     * ReviewController constructor.
     *
     * @param ReviewRepository $reviews
     */
    public function __construct( Review $review,ReviewRepository $reviewRepo)
    {
        $this->review = $review;
        $this->reviewRepo = $reviewRepo;
    }
    /**
     * Display a listing of the resource (all , pagination).
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $reviews = $this->reviewRepo->getData($this->review,$this->review->eagerLoading);
        $data = ReviewResource::collection($reviews);
        if (page()) $data = getDataResponse($data);
        return successResponse(0,$data);
    }
    /**
     * store.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AddReviewRequest $request){
        $review=$this->reviewRepo->store($request,$this->review,$this->review->eagerLoading);
        if(is_numeric($review)) return clientError(4);// Return 404 not found
        if(is_string($review)) return clientError(0,$review);// Return the error message if data is missing
        return successResponse(1, new ReviewResource($review));
    }
    /**
     * update.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request,$id){
        $review=$this->reviewRepo->update($request,$id,$this->review,$this->review->eagerLoading);
        if(is_numeric($review)) return clientError(4);// Return 404 not found
        if(is_string($review)) return clientError(0,$review);// Return the error message if data is missing
        return  successResponse(1,new ReviewResource($review));
    }
    /**
     * destroy.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $review=$this->reviewRepo->destroy($id,$this->review,$this->review->eagerLoading);
        if(is_numeric($review)) return clientError(4);// Return 404 not found
        if(is_string($review)) return clientError(0,$review);// Return the error message if data is missing
        return  successResponse(2,new ReviewResource($review));
    }
  

}
