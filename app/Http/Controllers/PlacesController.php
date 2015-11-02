<?php

namespace App\Http\Controllers;

use App\Transformers\CheckinTransformer;
use App\Transformers\PlaceTransformer;
use App\Place;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class PlacesController extends ApiController {

//
//    public function index(Manager $fractal, ProjectTransformer $projectTransformer)
//    {
//        $projects = $this->project->with(['notes.links'])->get();
//        $collection = new Collection($projects, $projectTransformer);
//        $data = $fractal->createData($collection)->toArray();
//        return $this->respondWithCORS($data);
//    }


    public function index(Manager $fractal, PlaceTransformer $placeTransformer)
    {
        $places = Place::take(10)->get();
        $collection = new Collection($places, $placeTransformer);
        $data = $fractal->createData($collection)->toArray();
        return $this->respondWithCORS($data);

        //return $this->respondWithCollection($places, new PlaceTransformer);
    }

    public function show($placeId)
    {
        $place = Place::find($placeId);

        if (! $place) {
            return $this->errorNotFound('Place not found');
        }

        return $this->respondWithItem($place, new PlaceTransformer);
    }

    public function getCheckins($placeId)
    {
        $place = Place::find($placeId);

        if (! $place) {
            return $this->errorNotFound('Place not found');
        }

        return $this->respondWithCollection($place->checkins, new CheckinTransformer);
    }

}