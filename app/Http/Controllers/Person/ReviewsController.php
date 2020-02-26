<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\ReviewsResourceCollection;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function show(Reviews $review):ReviewResource
    {
        return new ReviewResource($review);
    }

    public function index():ReviewsResourceCollection
    {
        return new ReviewsResourceCollection(Reviews::paginate());
    }

}
