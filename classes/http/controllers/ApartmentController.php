<?php


namespace controller;

include_once(MANAGERS."/ProjectsManager.php");
include_once(HTTP."/Request.php");
use http\Request;
use manager\ProjectsManager;

class ApartmentController
{
    public static function getApartments(Request $request){
        $data = $request->getData();
        $area_from = $data["area_from"];
        $area_to = $data["area_to"];
        $floors_from = $data["floors_from"];
        $floors_to = $data["floors_to"];
        $bedrooms_from = $data["bedrooms_from"];
        $bedrooms_to = $data["bedrooms_to"];

        $condition = "area BETWEEN '$area_from' AND '$area_to' AND bedrooms BETWEEN '$bedrooms_from' AND '$bedrooms_to' AND floor BETWEEN '$floors_from' AND '$floors_to'";
        $apartments = ProjectsManager::getApartmentsWhere($condition);
        return json_encode($apartments);
    }
}