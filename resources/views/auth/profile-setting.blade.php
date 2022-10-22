<x-app-layout title="Seting Profil {{ $user->name }}" active="profil-setting">
    @push('addonStyle')
        <style>
            body {
                background: #f2f0ff !important;
            }
        </style>
    @endpush

    <div class="container d-flex align-items-center justify-content-center my-4" style="min-height: 88.8vh;">

        <form action="{{ route('profile.setting.update') }}" method="POST" enctype="multipart/form-data" class="w-75">
            @csrf
            @method('put')
            <x-admin.alert />
            <input type="hidden" name="id" id="id" value="{{ $user->id }}">

            <div class="text-center position-relative">
                <img src="{{ $user->image == null ? asset('assets/frontend/images/default-avatar.jpg') : asset('storage/' . $user->image) }}"
                    width="100" class="rounded-circle" id="previewImage">
                <div class="form-group position-absolute" style="left: 52%; top: 70%">
                    <input type="file" name="image" id="image" style="display: none;">
                    <label for="image"
                        class="form-label m-0 bg-white shadow-base py-1 px-2 rounded-circle baseColor"><i
                            class="fas fa-pencil-alt"></i></label>
                </div>
            </div>

            <div class="form-group mt-5">
                <label for="email" class="form-label fw-bold">Email Address</label>
                <input type="text" name="email" id="email" class="form-control bg-white rounded-12 py-2 px-3 p"
                    value="{{ $user->email }}" required>
            </div>
            <div class="form-group mt-3">
                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control bg-white rounded-12 py-2 px-3 p"
                    value="{{ $user->name }}" required>
            </div>


            <button type="submit" class="btn bgTheme text-white rounded-12 py-2 w-100 mt-4 fw-bold">Simpan</button>
        </form>
    </div>
    @push('addonScript')
        <script>
            document.querySelector('.navbar-expand-lg').classList.add('scrolled');

            const previewImage = document.querySelector('#previewImage');
            const image = document.querySelector('#image');

            image.addEventListener('change', function() {
                const file = new FileReader();
                file.readAsDataURL(image.files[0]);

                file.onload = function(e) {
                    previewImage.src = e.target.result;
                }
            })
        </script>
    @endpush
</x-app-layout>
