@section('meta_title', 'PROFILE')
@section('page_title', 'DATA PROFILE')
@section('page_title_icon')
<i class="metismenu-icon fa fa-users"></i>
@endsection

<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        padding: 20px;
        margin-top: 20px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        width: 100%;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
        color: #fff;
    }

    .profile-heading {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .profile-image {
        max-width: 200px;
        max-height: 200px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-2">
            <div class="card-body">
                <form>
                    <div class="profile-heading">
                        <label for="name">Profile</label>
                    </div>
                    <div class="form-group">
                        <div class="profile-image-container">
                            @if ($user->image)
                            <img src="{{ asset('storage/images/'.$user->image) }}" alt="Avatar" class="img-fluid profile-image">
                            @else
                            <p>No image available</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" value="{{ $user->password }}" readonly>
                    </div>

                    <a href="{{ route('profile.update', ['profile' => $user->id]) }}" class="btn btn-success">Edit Profile</a>
                </form>
            </div>
        </div>
    </div>
</div>
