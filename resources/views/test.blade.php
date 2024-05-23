<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<form method="POST" action="{{ route('test') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Name : </label>
        <input type="text" name=" name" class="form-control" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label>Email : </label>
        <input type="email" name="email" class="form-control" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label>Password : </label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
        <label>Date of Birthay : </label>
        <input type="date" name="date" class="form-control" placeholder="date">
    </div>
    <span class="form-check">
        <label>Sexe : </label>
        <input type="checkbox" name="sexe" value="male" class="form-check-input">
        <label class="form-check-label">Male</label>
    </span>
    <span class="form-check">
        <input type="radio" name="sexe" value="female" class="form-check-input">
        <label class="form-check-label">Female</label>
    </span>
    <br />
    <br />
    <div class="form-group">
        <label>Pays : </label>
        <select class="form-control" name="pays">
            <option></option>
            <option>Morocco</option>
        </select>
    </div>
    <div class="form-group">
        <label>Image : </label>
        <input type="file" name="image">
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
</form>
