<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ isset($member) ? 'Edit' : 'Tambah' }} Member</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <form method="POST" action="{{ isset($member) ? route('members.update', $member) : route('members.store') }}">
                    @csrf
                    @if(isset($member))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label class="block text-gray-700">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $member->name ?? '') }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Tipe Membership</label>
                        <input type="text" name="membership_type" value="{{ old('membership_type', $member->membership_type ?? '') }}" class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Tanggal Mulai</label>
                        <input type="date" name="start_date" value="{{ old('start_date', $member->start_date ?? '') }}" class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Tanggal Akhir</label>
                        <input type="date" name="end_date" value="{{ old('end_date', $member->end_date ?? '') }}" class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Telepon</label>
                        <input type="text" name="phone" value="{{ old('phone', $member->phone ?? '') }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $member->email ?? '') }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
