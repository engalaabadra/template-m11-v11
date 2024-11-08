<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Repositories\Modules\Board\BoardRepository;
use App\Resources\BoardResource;
class BoardController extends Controller
{
    /**
     * @var BoardRepository
     */
    protected $boardRepo;
        /**
     * @var Board
     */
    protected $board;

    
    /**
     * BoardResourceController constructor.
     *
     * @param BoardRepository $boards
     */
    public function __construct( Board $board,BoardRepository $boardRepo)
    {
        $this->board = $board;
        $this->boardRepo = $boardRepo;
    }
    /**
     * Display a listing of the resource via (all , pagination).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = $this->boardRepo->getData($this->board, $this->board->eagerLoading);
        $data = BoardResource::collection($boards);
        if (page()) $data = getDataResponse($data);
        return successResponse(0, $data);
    }

}
