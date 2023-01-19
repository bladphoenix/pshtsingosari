<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialFinance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', SocialFinance::class);
        $get = $request->all();
        $finance = SocialFinance::orderByDesc('created_at');
        if($get) {
            if($get['status'] != 'all') {
                $finance = $finance->whereStatus($get['status'] === 1 ? 1 : 0);
            }
            if($get['start'] && $get['end']) {
                $finance->whereBetween('date', [Carbon::createFromFormat('d/m/Y', $get['start'])->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $get['end'])->format('Y-m-d')]);
            }
        }
        $finance = $finance->paginate(10);
        return view('admin.finance.social.index', ['data' => $finance]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', SocialFinance::class);
        return view('admin.finance.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', SocialFinance::class);
        $validator = Validator::make($request->all(), [
            'status' => 'required|boolean',
            'date' => 'required|string',
            'total' => 'required|min:0|string',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }
        $data = SocialFinance::create([
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
            'status' => $request->status,
            'total' => intval(str_replace('.', '', $request->total)),
            'description' => $request->description
        ]);
        if($data) {
            return redirect()->route('admin.financesocial.index')->with('success', 'Berhasil tambah data keuangan!');
        }
        return redirect()->back()->withInput($request->all())->withErrors(['Gagal tambah data!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialFinance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $finance = SocialFinance::findOrFail($id);
        $this->authorize('view', $finance);
        return view('admin.finance.social.detail', ['finance' => $finance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialFinance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finance = SocialFinance::findOrFail($id);
        $this->authorize('update', $finance);
        return view('admin.finance.social.edit', ['finance' => $finance]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialFinance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $finance = SocialFinance::findOrFail($id);
        $this->authorize('update', $finance);

        $validator = Validator::make($request->all(), [
            'status' => 'required|boolean',
            'date' => 'required|string',
            'total' => 'required|min:0|string',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }
        $finance->update([
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
            'status' => $request->status,
            'total' => intval(str_replace('.', '', $request->total)),
            'description' => $request->description
        ]);
        if($finance) {
            return redirect()->route('admin.financesocial.index')->with('success', 'Berhasil ubah data keuangan!');
        }
        return redirect()->back()->withInput($request->all())->withErrors(['Gagal ubah data!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialFinance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialFinance $finance)
    {
        $this->authorize('delete', $finance);
        $finance->delete();

        return redirect()->route('admin.financesocial.index')->with('success', 'Berhasil hapus data keuangan!');
    }
}
