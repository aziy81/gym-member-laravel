<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Member</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('members.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Tambah Member</a>

            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Tipe Membership</th>
                            <th class="px-4 py-2">Tanggal Mulai</th>
                            <th class="px-4 py-2">Tanggal Berakhir</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Telepon</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                        <tr>
                            <td class="border px-4 py-2">{{ $member->name }}</td>
                            <td class="border px-4 py-2">{{ $member->membership_type }}</td>
                            <td class="border px-4 py-2">{{ $member->start_date }}</td>
                            <td class="border px-4 py-2">{{ $member->end_date }}</td>
                            <td class="border px-4 py-2">{{ $member->email }}</td>
                            <td class="border px-4 py-2">{{ $member->phone }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('members.edit', $member) }}" class="text-blue-500">Edit</a> |
                                <form action="{{ route('members.destroy', $member) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
