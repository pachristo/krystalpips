<div class="p-4 bg-white shadow rounded">
    <h2 class="h4 mb-4">Profile</h2>

    <div class="row g-4">
        <!-- Profile Picture -->
        <div class="col-md-3">
            <div class="position-relative">
                <img src="{{ $profile_picture_preview ?: 'https://www.gravatar.com/avatar/?d=mp' }}" alt="Profile Picture" class="img-fluid rounded">
            </div>

            <!-- File Input -->
            <input type="file" wire:model="profile_picture" class="mt-2 form-control">
            @error('profile_picture') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Profile Details -->
        <div class="col-md-9">
            <div class="row g-3">
                <!-- Name -->
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" wire:model="name" class="form-control" id="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

        

                <!-- Telegram Username -->
                <div class="col-md-6">
                    <label for="telegram_username" class="form-label">Telegram</label>
                    <input type="text" wire:model="telegram_username" class="form-control" id="telegram_username">
                    @error('telegram_username') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" wire:model="email" class="form-control" id="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Phone Numbers -->
                <div class="col-lg-6">
                    <label for="phone_numbers" class="form-label">Phone numbers</label>
                    <input type="text" wire:model="phone_numbers" class="form-control">
                    @error('phone_numbers') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- Save Button -->
    <button wire:click="save" class="btn btn-primary mt-4">Save</button>    <a href="{{url('dashboard')}}" class="btn btn-danger mt-4">Dashboard</a>

    @if (session()->has('message'))
        <div class="mt-4 text-success">
            {{ session('message') }}
        </div>
    @endif
</div>
