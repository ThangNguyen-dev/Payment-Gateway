<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;
use Symfony\Component\VarDumper\Cloner\Data;

class ApiController extends Controller
{

    public function transferBank(Request $request)
    {
        $bankAccount = (array)($request->input());

        $listAccountBank = Bank::listBanks();
        $money = $bankAccount['money'];
        unset($bankAccount['money']);
        $bankAccountUser = array();
        foreach ($listAccountBank as $bank) {
            if ($bank == $bankAccount) {
                $bankAccountUser = $bankAccount;
            };
        }
        if (empty($bankAccountUser)) {
            return response()->json(
                [
                    "message" => "Bank account not found"
                ],
                404
            );
        }
        $bankAccount['money'] = $money;

        return response()->json(
            [
                'success' => 'Transfer successfully',
                'profile' => $bankAccountUser,
                'balance'=>'5000000 VND',
                'timestamp' => date('d/m/Y H:i:s'),
            ],
            200
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
