<!-- resources/views/form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="icon" href="{{ asset('img/logo-expo.jpg') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Select Contestant and Enter Score</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('storeScore') }}">
            @csrf
            <div class="mb-3">
                <label for="kontestan_id" class="form-label">Select Contestant</label>
                <select class="form-control" id="kontestan_id" name="kontestan_id" required>
                    @foreach($kontestansToDisplay as $kontestan)
                        <option value="{{ $kontestan->id }}">{{ $kontestan->nama_kontestan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="skor" class="form-label">Score</label>
                <input type="number" class="form-control" id="skor" name="skor" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit Score</button>
        </form>
    </div>
</body>
</html>
