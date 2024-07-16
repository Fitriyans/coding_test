<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:accounts',
            'password' => 'required',
            'name' => 'required',
            'role' => 'required',
        ]);

        Account::create($request->all());

        return redirect()->route('account.index')
            ->with('success', 'Account created successfully.');
    }

    public function editAccount($username)
    {
        $account = Account::where('username', $username)->firstOrFail();
        return view('accounts.edit', compact('account'));
    }

    public function updateAccount(Request $request, $username)
    {
        $request->validate([
            'password' => 'required',
            'name' => 'required',
            'role' => 'required',
        ]);

        $account = Account::where('username', $username)->firstOrFail();
        $account->update($request->all());

        return redirect()->route('account.index')
            ->with('success', 'Account updated successfully');
    }

    public function deleteAccount($username)
    {
        $account = Account::where('username', $username)->firstOrFail();
        $account->delete();

        return redirect()->route('account.index')
            ->with('success', 'Account deleted successfully');
    }

}
