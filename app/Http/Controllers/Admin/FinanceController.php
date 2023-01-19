<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Finance::class);
        $get = $request->all();
        $finance = Finance::orderByDesc('created_at');
        if($get) {
            if($get['type'] != 'all') {
                $finance = $finance->whereType($get['type'] === 'in' ? 'in' : 'out');
            }
            if($get['start'] && $get['end']) {
                $finance->whereBetween('date', [Carbon::createFromFormat('d/m/Y', $get['start'])->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $get['end'])->format('Y-m-d')]);
            }
        }
        $finance = $finance->paginate(10);
        return view('admin.finance.index', ['data' => $finance]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Finance::class);
        return view('admin.finance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Finance::class);
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:in,out',
            'date' => 'required|string',
            'total' => 'required|min:0|string',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }
        $data = Finance::create([
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
            'type' => $request->type,
            'total' => intval(str_replace('.', '', $request->total)),
            'description' => $request->description
        ]);
        if($data) {
            return redirect()->route('admin.finance.index')->with('success', 'Berhasil tambah data keuangan!');
        }
        return redirect()->back()->withInput($request->all())->withErrors(['Gagal tambah data!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show(Finance $finance)
    {
        $this->authorize('view', $finance);
        return view('admin.finance.detail', ['finance' => $finance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        $this->authorize('update', $finance);
        return view('admin.finance.edit', ['finance' => $finance]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        $this->authorize('update', $finance);
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:in,out',
            'date' => 'required|string',
            'total' => 'required|min:0|string',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }
        $finance->update([
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
            'type' => $request->type,
            'total' => intval(str_replace('.', '', $request->total)),
            'description' => $request->description
        ]);
        if($finance) {
            return redirect()->route('admin.finance.index')->with('success', 'Berhasil ubah data keuangan!');
        }
        return redirect()->back()->withInput($request->all())->withErrors(['Gagal ubah data!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        $this->authorize('delete', $finance);
        $finance->delete();

        return redirect()->route('admin.finance.index')->with('success', 'Berhasil hapus data keuangan!');
    }
}
