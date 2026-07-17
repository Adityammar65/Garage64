@extends('template.form')
@section('title', 'Informasi Keluhan')

@section('content')
    <div class="mx-auto py-16 px-8">

        <form action="{{ url('/admin/support/reply/'. $service->id_service) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-12">

                <div class="pb-4">

                    <h2 class="text-2xl font-semibold text-white">
                        Informasi Keluhan
                    </h2>

                    <div class="mt-4 ml-4 space-y-2">

                        <p class="text-lg text-white">
                            <span class="font-bold">Pengirim :</span>
                            {{ $service->user->username }}
                        </p>

                        <p class="text-lg text-white">
                            <span class="font-bold">Email :</span>
                            {{ $service->user->email }}
                        </p>

                        <p class="text-lg text-white">
                            <span class="font-bold">Subjek :</span>
                            {{ $service->subjek }}
                        </p>

                        <p class="text-lg text-white">
                            <span class="font-bold">Keluhan :</span>
                            {{ $service->pesan }}
                        </p>

                        <p class="text-lg text-white">
                            <span class="font-bold">Status :</span>

                            @if ($service->status == 'Menunggu')
                                <span class="text-yellow-400">Menunggu</span>
                            @elseif($service->status == 'Diproses')
                                <span class="text-blue-400">Diproses</span>
                            @else
                                <span class="text-green-400">Selesai</span>
                            @endif

                        </p>

                    </div>

                    <h2 class="text-2xl font-semibold text-white mt-8">
                        Balas Keluhan
                    </h2>

                    <div class="mt-8 grid grid-cols-6 gap-6">

                        <div class="col-span-full">

                            <label class="block text-xl font-bold text-white">
                                Status
                            </label>

                            <select name="status" class="mt-2 block w-full rounded-md bg-slate-800 px-3 py-2 text-white">

                                <option value="Menunggu" {{ $service->status == 'Menunggu' ? 'selected' : '' }}>
                                    Menunggu
                                </option>

                                <option value="Diproses" {{ $service->status == 'Diproses' ? 'selected' : '' }}>
                                    Diproses
                                </option>

                                <option value="Selesai" {{ $service->status == 'Selesai' ? 'selected' : '' }}>
                                    Selesai
                                </option>

                            </select>

                        </div>

                        <div class="col-span-full">

                            <label class="block text-xl font-bold text-white">
                                Balasan
                            </label>

                            <textarea name="balasan" rows="6" class="mt-2 block w-full rounded-md bg-white/5 px-3 py-2 text-white"
                                placeholder="Tulis balasan kepada customer...">{{ old('balasan', $service->balasan) }}</textarea>

                        </div>

                    </div>

                </div>

            </div>

            <div class="mt-6 flex justify-end gap-4">

                <a href="{{ url()->previous() }}"
                    class="rounded-md bg-red-500 px-5 py-2 font-bold text-white hover:bg-red-600">
                    Batal
                </a>

                <button type="submit" class="rounded-md bg-green-500 px-5 py-2 font-bold text-white hover:bg-green-600">
                    Simpan Balasan
                </button>

            </div>

        </form>

    </div>
@endsection
