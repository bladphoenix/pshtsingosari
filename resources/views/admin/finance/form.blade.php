@php $editing = isset($finance) @endphp
<div class="mb-3">
    <label for="date" class="form-label">Tanggal</label>
    <input type="text" class="form-control  @error('date') is-invalid @enderror" value="{{ old('date', ($editing ? $finance->date : '')) }}"
        id="datepicker" name="date">
</div>
<div class="mb-3">
    <label for="type" class="form-label">Tipe</label>
    <select class="form-control" name="type" style="width: 100%">
        <option value="in">Masuk</option>
        <option value="out">Keluar</option>
    </select>
</div>
<div class="mb-3">
    <label for="total" class="form-label">Jumlah</label>
    <input name="total" type="text" class="form-control @error('total') is-invalid @enderror" id="total"
        value="{{ old('total', ($editing ? $finance->total : '')) }}" required>
</div>
<div class="mb-3">
    <label for="description" class="form-label">Keterangan</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
        required style="height: 100px">{{ old('description', ($editing ? $finance->description : '')) }}</textarea>
</div>
