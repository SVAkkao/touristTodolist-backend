<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Projects extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $command = DB::table("project")->get();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $command = DB::table("attractions")->insert([
            "aid" => $request->aid,
            "pname" => $request->pname,
        ]);
        $message = $command ? "Success" : "Error";
        $code = $command ? 200 : 400;
        return response([
            "message" => $message,
            "payload" => $command,
        ], $code)->header("Access-Control-Allow-Origin", "*");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $command = DB::table("project")->where("pid", [$id])->get();
        $message = $command ? "Success" : "Error";
        $code = $command ? 200 : 400;
        return response([
            "message" => $message,
            "payload" => $command,
        ], $code)->header("Access-Control-Allow-Origin", "*");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response([
            "message" => "Method not supported"
        ], 405);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response([
            "message" => "Method not supported"
        ], 405);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $command = DB::table("project")->where("pid", [$id])->delete();
        $message = $command ? "Success" : "Error";
        $code = $command ? 200 : 400;
        return response([
            "message" => $message,
            "payload" => $command,
        ], $code)->header("Access-Control-Allow-Origin", "*");
    }
}
