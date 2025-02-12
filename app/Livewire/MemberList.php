<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;

class MemberList extends Component
{
    public $name, $email, $phone;
    public $members;
    public $edit_member;
    public $error_message;
    public function render()
    {
        return view('livewire.member-list');
    }
    public function mount()
    {
        $this->members = Member::all();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:15',
        ]);

        $member = new Member();
        $member->name = $this->name;
        $member->email = $this->email;
        $member->phone = $this->phone;
        $member->save();

        $this->resetInputFields();
        $this->dispatch('closemodal');
        $this->members = Member::all();
    }

    public function editMember($id)
    {
        $member = Member::find($id);
        if ($member) {
            $this->resetInputFields();
            $this->name = $member->name;
            $this->email = $member->email;
            $this->phone = $member->phone;
            $this->edit_member = $member;
        }
    }

    public function saveUpdate()
    {
        $member = Member::find($this->edit_member->id);
        $member->name = $this->name;
        $member->email = $this->email;
        $member->phone = $this->phone;
        $member->save();

        $this->resetInputFields();
        $this->dispatch('closemodal');
        $this->members = Member::all();
    }

    public function deleteMember($id)
    {
        $member = Member::find($id);
        if ($member) {
            $member->delete();
            session()->flash('message', 'Member successfully deleted!');
            $this->members = Member::all();
        } else {
            $this->error_message = "Member not found.";
        }
    }
}
