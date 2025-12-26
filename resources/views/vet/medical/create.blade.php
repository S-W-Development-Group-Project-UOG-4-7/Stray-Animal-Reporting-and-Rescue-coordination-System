@extends('layouts.app')

@section('page_title', 'Add Medical Record')
@section('page_subtitle', 'Save symptoms, diagnosis, prescriptions & attachments')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-white">Add Medical Record</h1>

        <a href="{{ route('vet.medical.history', $pet->id) }}"
           class="px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 text-white text-sm transition">
            ← Back
        </a>
    </div>

    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 shadow-xl">

        @if ($errors->any())
            <div class="mb-5 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-300 text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ route('vet.medical.store') }}"
              enctype="multipart/form-data"
              class="space-y-6">
            @csrf

            <input type="hidden" name="pet_id" value="{{ $pet->id }}">

            {{-- Symptoms --}}
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">Symptoms</label>
                <textarea name="symptoms"
                          rows="3"
                          class="w-full rounded-xl bg-slate-900 border border-white/10 text-white p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none"
                          placeholder="Enter symptoms...">{{ old('symptoms') }}</textarea>
            </div>

            {{-- Diagnosis --}}
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">Diagnosis</label>
                <textarea name="diagnosis"
                          rows="3"
                          class="w-full rounded-xl bg-slate-900 border border-white/10 text-white p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none"
                          placeholder="Enter diagnosis...">{{ old('diagnosis') }}</textarea>
            </div>

            {{-- Prescription JSON Fields --}}
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">
                    Prescription (Medicine + Dose + Duration)
                </label>

                <div id="prescription-wrapper" class="space-y-3">
                    <div class="grid sm:grid-cols-3 gap-3">
                        <input name="prescription[0][medicine]" placeholder="Medicine"
                               class="w-full rounded-xl bg-slate-900 border border-white/10 text-white p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                        <input name="prescription[0][dose]" placeholder="Dose"
                               class="w-full rounded-xl bg-slate-900 border border-white/10 text-white p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                        <input name="prescription[0][duration]" placeholder="Duration"
                               class="w-full rounded-xl bg-slate-900 border border-white/10 text-white p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                    </div>
                </div>

                <button type="button"
                        onclick="addPrescriptionRow()"
                        class="mt-3 px-4 py-2 rounded-xl bg-sky-500/10 text-sky-400 border border-sky-500/20 hover:bg-sky-500 hover:text-white transition text-sm font-semibold">
                    + Add Another Medicine
                </button>
            </div>

            {{-- Notes --}}
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">Notes</label>
                <textarea name="notes"
                          rows="3"
                          class="w-full rounded-xl bg-slate-900 border border-white/10 text-white p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none"
                          placeholder="Extra notes...">{{ old('notes') }}</textarea>
            </div>

            {{-- Upload --}}
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">
                    Upload Reports / Images
                </label>

                <input type="file"
                       name="files[]"
                       multiple
                       class="block w-full text-sm text-slate-400
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0
                              file:text-sm file:font-semibold
                              file:bg-sky-500/10 file:text-sky-400
                              hover:file:bg-sky-500 hover:file:text-white
                              cursor-pointer">

                <p class="mt-2 text-xs text-slate-500">
                    Supported: JPG, PNG, PDF (max 5MB each)
                </p>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('vet.medical.history', $pet->id) }}"
                   class="px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-sm transition">
                    Cancel
                </a>

                <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-sky-500 hover:bg-sky-400 text-white text-sm font-semibold transition shadow-lg shadow-sky-500/20">
                    Save Record
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let prescriptionIndex = 1;

function addPrescriptionRow() {
    const wrapper = document.getElementById('prescription-wrapper');

    const row = document.createElement('div');
    row.className = "grid sm:grid-cols-3 gap-3";

    row.innerHTML = `
        <input name="prescription[${prescriptionIndex}][medicine]" placeholder="Medicine"
               class="w-full rounded-xl bg-slate-900 border border-white/10 text-white p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none">
        <input name="prescription[${prescriptionIndex}][dose]" placeholder="Dose"
               class="w-full rounded-xl bg-slate-900 border border-white/10 text-white p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none">
        <input name="prescription[${prescriptionIndex}][duration]" placeholder="Duration"
               class="w-full rounded-xl bg-slate-900 border border-white/10 text-white p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none">
    `;

    wrapper.appendChild(row);
    prescriptionIndex++;
}
</script>

@endsection
