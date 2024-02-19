@extends("user.layout")
@section("content")
    <h1 class="text-4xl font-bold mb-10">
        List Pengguna</h1>
    <a href="{{ route("user.create") }}" type="button" class="py-2 px-4 bg-green-600/70 text-white rounded-lg mb-4">Tambah
        Data</a>
    



    @if ($message = Session::get("success"))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="bg-white">
        <nav class="tabs flex flex-col sm:flex-row">
            <button data-target="panel-1"
                class="tab active py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500">
                All
            </button><button data-target="panel-2"
                class="tab ext-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
                Admin Only
            </button><button data-target="panel-3"
                class="tab text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
                User Only
            </button>
        </nav>
    </div>

    <div id="panels">
        <div class="panel-1 active tab-content py-5">
            <div class="rounded-lg overflow-x-hidden overflow-y-scroll max-h-96 no-scrollbar mb-24 w-10/12 md:w-auto">
                <table id="allUserTable" class="w-full min-w-[600px] text-left h-12 text-sm md:text-base">
                    <thead class="bg-[#cdeaff] sticky top-0">
                        <tr>
                            <th class="p-3">No</th>
                            {{-- <th class="p-3">Id Petugas</th> --}}
                            <th class="p-3">Nama Petugas</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Role</th>
                            <th class="p-3">Perusahaan</th>
                            <th class="p-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $user)
                            <tr>
                                <td class="p-3 border-b">{{ $loop->iteration }}</td>
                                {{-- <td class="p-3 border-b">{{ $user->id}}</td> --}}
                                <td class="p-3 border-b">{{ $user->nama }}</td>
                                <td class="p-3 border-b">{{ $user->email }}</td>
                                <td class="p-3 border-b">{{ $user->role }}</td>
                                <td class="p-3 border-b">{{ $user->perusahaan }}</td>
                                <td class="p-3 border-b">
                                    <a href="{{ route("user.edit", $user->id) }}" type="button"
                                        class="btn btn-warning rounded-3 bg-yellow-500/60 text-white">Ubah</a>
                                    <!-- TAMBAHKAN KODE DELETE DIBAWAHBARIS INI -->
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger bg-red-600/60" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal{{ $user->id }}">
                                        Hapus
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="hapusModal{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route("user.delete", $user->id) }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary bg-gray-600"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-primary bg-blue-600/60">Ya</button>
                                                    </div>
                                                </form>
                                            </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-2 tab-content py-5">
            <div class="rounded-lg overflow-x-hidden overflow-y-scroll max-h-96 no-scrollbar mb-24 w-10/12 md:w-auto">
                <table id="adminTable" class="w-full min-w-[600px] text-left h-12 text-sm md:text-base">
                    <thead class="bg-[#cdeaff] sticky top-0">
                        <tr>
                            <th class="p-3">No</th>
                            {{-- <th class="p-3">Id Petugas</th> --}}
                            <th class="p-3">Nama Petugas</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Role</th>
                            <th class="p-3">Perusahaan</th>
                            <th class="p-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $user)
                            <tr>
                                <td class="p-3 border-b">{{ $loop->iteration }}</td>
                                {{-- <td class="p-3 border-b">{{ $user->id}}</td> --}}
                                <td class="p-3 border-b">{{ $user->nama }}</td>
                                <td class="p-3 border-b">{{ $user->email }}</td>
                                <td class="p-3 border-b">{{ $user->role }}</td>
                                <td class="p-3 border-b">{{ $user->perusahaan }}</td>
                                <td class="p-3 border-b">
                                    <a href="{{ route("user.edit", $user->id) }}" type="button"
                                        class="btn btn-warning rounded-3 bg-yellow-500/60 text-white">Ubah</a>
                                    <!-- TAMBAHKAN KODE DELETE DIBAWAHBARIS INI -->
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger bg-red-600/60" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal{{ $user->id }}">
                                        Hapus
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="hapusModal{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route("user.delete", $user->id) }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary bg-gray-600"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-primary bg-blue-600/60">Ya</button>
                                                    </div>
                                                </form>
                                            </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-3 tab-content py-5">
            <div class="rounded-lg overflow-x-hidden overflow-y-scroll max-h-96 no-scrollbar mb-24 w-10/12 md:w-auto">
                <table id="userTable" class="w-full min-w-[600px] text-left h-12 text-sm md:text-base">
                    <thead class="bg-[#cdeaff] sticky top-0">
                        <tr>
                            <th class="p-3">No</th>
                            {{-- <th class="p-3">Id Petugas</th> --}}
                            <th class="p-3">Nama Petugas</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Role</th>
                            <th class="p-3">Perusahaan</th>
                            <th class="p-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="p-3 border-b">{{ $loop->iteration }}</td>
                                {{-- <td class="p-3 border-b">{{ $user->id}}</td> --}}
                                <td class="p-3 border-b">{{ $user->nama }}</td>
                                <td class="p-3 border-b">{{ $user->email }}</td>
                                <td class="p-3 border-b">{{ $user->role }}</td>
                                <td class="p-3 border-b">{{ $user->perusahaan }}</td>
                                <td class="p-3 border-b">
                                    <a href="{{ route("user.edit", $user->id) }}" type="button"
                                        class="btn btn-warning rounded-3 bg-yellow-500/60 text-white">Ubah</a>
                                    <!-- TAMBAHKAN KODE DELETE DIBAWAHBARIS INI -->
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger bg-red-600/60" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal{{ $user->id }}">
                                        Hapus
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="hapusModal{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route("user.delete", $user->id) }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary bg-gray-600"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-primary bg-blue-600/60">Ya</button>
                                                    </div>
                                                </form>
                                            </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#allUserTable').DataTable();
            $('#adminTable').DataTable();
            $('#userTable').DataTable();
        });
    </script>
    <script>
        const tabs = document.querySelectorAll(".tabs");
        const tab = document.querySelectorAll(".tab");
        const panel = document.querySelectorAll(".tab-content");

        function onTabClick(event) {

            // deactivate existing active tabs and panel

            for (let i = 0; i < tab.length; i++) {
                tab[i].classList.remove("active");
            }

            for (let i = 0; i < panel.length; i++) {
                panel[i].classList.remove("active");
            }


            // activate new tabs and panel
            event.target.classList.add('active');
            let classString = event.target.getAttribute('data-target');
            console.log(classString);
            document.getElementById('panels').getElementsByClassName(classString)[0].classList.add("active");
        }

        for (let i = 0; i < tab.length; i++) {
            tab[i].addEventListener('click', onTabClick, false);
        }
    </script>


@stop
