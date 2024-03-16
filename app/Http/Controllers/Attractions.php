<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Attractions extends Controller
{
    private function api_formation($result, $input = "", $input_message = "") {
        $default_message = $result ? "Success" : "Error";
        return [
            "message" => $input_message ? $input_message : $default_message,
            "input" => $input,
            "result" => $result,
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $command = DB::table("attractions")->get();
        return response([
            "result" => $command
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response([
            "message" => "Method not supported"
        ], 405);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $check = DB::table("attractions")->where("aname", $request->aname)->get();
        if( count($check) > 0 ) {
            return response(
                $this->api_formation(
                    $check,
                    $request->aname, "Data already exist"
                ), 409
            );
        }
        $command = DB::table("attractions")->insertGetId([
            "aname" => $request->aname
        ]);
        $code = $command ? 200 : 400;
        return response( $this->api_formation($command, $request->aname), $code )->header("Access-Control-Allow-Origin", "*");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $command = DB::table("attractions")->where("aid", [$id])->get();
        $code = $command ? 200 : 400;
        return response( $this->api_formation($command, $id), $code)->header("Access-Control-Allow-Origin", "*");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response([
            "message" => "Method not supported"
        ], 405);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response([
            "message" => "Method not supported"
        ], 405);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $command = DB::table("attractions")->where("aid", [$id])->delete();
        $code = $command ? 200 : 400;
        return response( $this->api_formation($command, $id), $code)->header("Access-Control-Allow-Origin", "*");
    }

    public function show_by_name(string $aname)
    {
        $command = DB::table("attractions")->where("aname", [$aname])->get();
        $code = count($command) > 0 ? 200 : 404;
        return response( $this->api_formation($command, $aname), $code)->header("Access-Control-Allow-Origin", "*");
    }
}