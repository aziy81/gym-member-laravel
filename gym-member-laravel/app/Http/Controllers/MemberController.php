<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all(); // Mengambil semua data member
        return view('members.index', compact('members')); // menampilkan data member di view
    }

    public function create()
    {
        return view('members.create'); // Menampilkan form tambah member
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'membership_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        

        Member::create($request->all());

        return redirect()->route('members.index')->with('success', 'Member added successfully.');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'membership_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
